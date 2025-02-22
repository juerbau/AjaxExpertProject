'use strict';

document.addEventListener('DOMContentLoaded', () => {

    const dropdownFinas = document.getElementById("finas-result");
    const chooseFinas = document.getElementById("finas-choose");
    chooseFinas.focus();

    chooseFinas.addEventListener("input", () => {
        if(chooseFinas.value !== ''){
            dropdownFinas.classList.add("show");

            fetchFinas(chooseFinas.value);
        }
        else {
            dropdownFinas.classList.remove("show");
        }

       })
});


async function fetchFinas(searchString) {

    const url = './ajax.php';
    const myHeader = new Headers();
    myHeader.append("Content-type", "application/x-www-form-urlencoded");

    const options = {
        method: "POST",
        headers: myHeader,
        body: "id=" + searchString
    };

    let req = new Request(url, options);

    const response = await fetch(req);
    // console.log(Response.prototype.isPrototypeOf(response));
    const data = await response.text();
    // console.log(data);
    let result = data.split(',');
    const dropdownFinas = document.getElementById("finas-result");
    dropdownFinas.textContent="";
    for (const item of result){
        const liElement = document.createElement("li");
        liElement.innerText = item;
        dropdownFinas.appendChild(liElement);
    }}