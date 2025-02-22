<?php

$content = file_get_contents("./data.json");
//var_dump($content);

$data = json_decode($content);
var_dump($data);

//foreach ($data as $object){
//    foreach($object as $key => $item){
//        var_dump($key . ", " . $item);
//    };
//}

$str = json_encode($data);
var_dump($str);


