<?php

$route = ($_SERVER['REQUEST_URI']);
// print($route);
// echo "<br>";

if($route === '/server/v2_json/api/dogs') {
    header("Content-type: application/json");
    $arr = array(
        ["id" => 1,
            "name" => "Lassie",
            "gender" => "male",#
            "age" => 3,
            "notes" => "broken leg"
        ],
        ["id" => 2,
            "name" => "Skinny",
            "gender" => "female",#
            "age" => 2,
            "notes" => "very friendly"
        ]);

    $json = json_encode($arr);
    print($json);
}
