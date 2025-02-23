<?php


$method = $_SERVER['REQUEST_METHOD'];
//$method = 'GET';
function createID(): string
{
    return uniqid('', true);
}

$myArr = [
    [
        "id" => createID(),
        "name" => "Skinny",
        "age" => 1,
        "gender" => "Female",
        "notes" => "broken front leg"
    ],
    [
        "id" => createID(),
        "name" => "Charm",
        "age" => 2,
        "gender" => "Female",
        "notes" => "great dog, friendly with others"
    ]
];


if ($method == 'GET') {

    $res = json_encode($myArr);

    header('Content-Type: text/html');
    echo $res;
    print_r($_GET);

//    echo $res;
}




//$get = $_GET;
//$post = $_POST;
//
//if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
//    $myEntireBody = file_get_contents('php://input'); //Be aware that the stream can only be read once
//    // http_response_code(201);
//    print_r($myEntireBody);
//}
//
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $myEntireBody = $_POST;
//    header('Content-type: text/html');
//    //print_r(json_decode($myEntireBody));
//    var_dump($myEntireBody);
//}


//print_r("Methode: " . $method);
//print("");
//print_r($get);
//print_r($post);



