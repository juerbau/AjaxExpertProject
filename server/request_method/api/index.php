<?php


$method = $_SERVER['REQUEST_METHOD'];
$get = $_GET;
$post = $_POST;

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $myEntireBody = file_get_contents('php://input'); //Be aware that the stream can only be read once
    // http_response_code(201);
    print_r($myEntireBody);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $myEntireBody = $_POST;
    header('Content-type: text/html');
    //print_r(json_decode($myEntireBody));
    var_dump($myEntireBody);
}


//print_r("Methode: " . $method);
//print("");
//print_r($get);
//print_r($post);



