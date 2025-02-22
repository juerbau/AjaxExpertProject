<?php



$str = '{"name":"Woofy","age":4,"gender":"Male","notes":"barks a lot"}';

$data = json_decode($str, true);
var_dump($data);

var_dump(json_encode($data));
