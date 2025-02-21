'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const dropdownFinas = document.getElementById("finas-result");
    const chooseFinas = document.getElementById("finas-choose");

    chooseFinas.addEventListener("input", () => {
        if(chooseFinas.value !== ''){
            dropdownFinas.classList.add("show");

            anfordern(chooseFinas.value);
        }
        else {
            dropdownFinas.classList.remove("show");
        }

    })

    chooseFinas.addEventListener("keydown", (event) => {
        // alert('hi');
        console.log(event);
        let taste = event.key
        if (taste === "Enter") {
            alert("Enter wurde gedrückt!")
        }

    })

});


function anfordern(searchString) {
    var req = new XMLHttpRequest();
    req.open("post", "ajax.php", true);
    req.onreadystatechange = auswerten;
    req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    req.send("id="+searchString);
    //console.log("a="+searchString);
}

function auswerten(e) {
    if(e.target.readyState === 4 && e.target.status === 200){
        let result = e.target.responseText.split(',');
        const dropdownFinas = document.getElementById("finas-result");
        dropdownFinas.textContent="";
        for (const item of result){
            // console.log(item);

            const liElement = document.createElement("li");
            liElement.innerText = item;
            dropdownFinas.appendChild(liElement);
            // liElement.classList.add("list-group-item")
        }
        // console.log(result);
        // document.getElementById("output").innerText = e.target.responseText;
        // console.log(e);
    }
}



