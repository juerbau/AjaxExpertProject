'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const dropdownFinas = document.getElementById("finas-result");
    const chooseFinas = document.getElementById("finas-choose");
    chooseFinas.focus();

    chooseFinas.addEventListener("input", () => {
        if(chooseFinas.value !== ''){
            dropdownFinas.classList.add("show");

            anfordern(chooseFinas.value);
        }
        else {
            dropdownFinas.classList.remove("show");
        }

    })

    chooseFinas.addEventListener("keyup", (event) => {
        // alert('hi');
        console.log(event);
        let taste = event.key
        if (taste === "Enter") {
            alert("Enter wurde gedrückt!")
        }

    })

});


function anfordern(searchString) {
    var xhr = new XMLHttpRequest();
    console.log(xhr);
    xhr.open("post", "ajax.php", true);
    xhr.onprogress = (e) => {
        console.log(e);
        console.log(`Downloaded ${e.loaded} of ${e.total} bytes`);
    }
    xhr.onload = auswerten;
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("id="+searchString);
    //console.log("a="+searchString);
}

function auswerten(e) {
    console.log(e.target.readyState);
    if(e.target.status === 200){
        console.log(e);
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



