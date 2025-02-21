<?php

try {

    $dsn = "mysql:host=localhost;dbname=product_db;charset=utf8;port=3306";
    $pdo = new PDO($dsn, "product_db_user", "secret", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // echo 'Datenbankverbindung steht...';
    return $pdo;
}
catch(PDOException $e) {
    echo 'Probleme mit der Datenbankverbindung...';
    die();
}
