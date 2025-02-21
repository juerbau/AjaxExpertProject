<?php


$route = ($_SERVER['REQUEST_URI']);
//print($route);
//echo "<br>";

$response = '';

if($route === '/server/v1_text/api/home'){
    header("Content-type: text/html; charset=utf-8");
    $response = "Ich bin die RestAPI auf dem <span style='color: blue;'> <b>home</b></span>";
} elseif ($route === '/server/v1_text/api/index'){
    header("Content-type: text/html; charset=utf-8");
    $response = "Ich bin die RestAPI auf dem <span style='color: red;'> <b>index</b></span>";
} else {
    $response = "weder home noch index";
}

print($response);




