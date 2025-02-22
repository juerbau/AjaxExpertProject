// importing modules
import { AjaxLib } from "./api/ajax_lib.js";

// grab our page elements
let para = document.getElementsByTagName('p')[0];
let table = document.getElementById('tableResults');
let getButton = document.getElementById('get');

// define our base URL
const SERVER_URL = 'http://127.0.0.1:3000/api';

// ******* GET REQUEST *******

getButton.addEventListener('click', () => {
    fetchDogs();
    // add dynamic text to the paragraph when a GET request is made
    para.className = "get";
    para.textContent = "GET request was successful";
}); 

let fetchDogs = () => {
    let url = SERVER_URL + '/dogs';
    // instantiate our AjaxLib object
    let xhr = new AjaxLib();
    xhr.get(url, (err, dogs) => {
        // if an error is thrown, all other code will stop
        if(err) throw err;
        // we want to return this data and show it on the webpage
            let tableRows = "";
            for (const dog of dogs) {
                tableRows += `
                    <tr>
                        <td>${dog.id}</td>
                        <td>${dog.name}</td>
                        <td>${dog.age}</td>
                        <td>${dog.gender}</td>
                        <td>${dog.notes}</td>
                    </tr>
                `;
            };
            table.innerHTML = tableRows;
    })
    
}
