<?php

print("This ist the start.php file");
echo "<br>";
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
// $path = $_SERVER["REQUEST_URI"];
// $path = parse_url($_SERVER["REQUEST_URI"]);
var_dump($path);
echo "<br>";
//var_dump($_SERVER);

?>

<a href="./route/index">Link zu anderer Seite</a>
