function AjaxLib() {
    
    // set up our AJAX object / engine
    this.xhr = new XMLHttpRequest();

    // ***** GET REQUEST *****
    this.get = (url, callback) => {
        // configure our AJAX request
        this.xhr.open("GET", url);
        // define our AJAX callback
        this.xhr.onload = () => {
            if(this.xhr.status === 200) {
                let data = this.xhr.response; 
                let dogs = JSON.parse(data);
                callback(null, dogs);
            } else {
                callback('Error as occured with a GET request');
            }
        }
        this.xhr.send();      

    }

    // ***** POST REQUEST *****
    this.post = (url, dog, callback) => {

        this.xhr.open("POST", url);
        this.xhr.setRequestHeader('Content-Type', 'application/json');
        this.xhr.onload = () => {
            let data = this.xhr.response; 
            let postRequestData = JSON.parse(data);
            callback(postRequestData);
        }
        // lets send raw JSON data to the server 
        this.xhr.send(JSON.stringify(dog));
    }









}


export { AjaxLib };