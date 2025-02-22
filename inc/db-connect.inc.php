<?php

try {

    $dsn = "mysql:host=localhost;dbname=dogs;charset=utf8;port=3306";
    $pdo = new PDO($dsn, "root", "bau171270", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // echo 'Datenbankverbindung steht...';
    return $pdo;
}
catch(PDOException $e) {
    echo 'Probleme mit der Datenbankverbindung...';
    die();
}
