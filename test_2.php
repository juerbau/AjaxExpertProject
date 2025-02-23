<?php

function createID(): string
{
    return uniqid();
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

var_dump($myArr);

