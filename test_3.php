<?php

$method = 'GET';
var_dump($_GET);

if($method == 'GET' && !isset($_GET['id'])) {
    var_dump("\$_GET nicht gesetzt");
}
