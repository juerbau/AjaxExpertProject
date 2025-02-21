<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=d03f16aa', 'd03f16aa', 'bau171270', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // echo 'Datenbankverbindung steht...';
    return $pdo;
}
catch(PDOException $e) {
    echo 'Probleme mit der Datenbankverbindung...';
    die();
}
