<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pwi', 'root', 'bau171270', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
    // echo 'Datenbankverbindung steht...';
    // $pdo->exec('set names utf8');
    return $pdo;
}
catch(PDOException $e) {
    echo 'Probleme mit der Datenbankverbindung...';
    die();
}
