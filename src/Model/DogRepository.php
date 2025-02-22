<?php

namespace App\Model;
use PDO;

class DogRepository
{
    public function __construct(protected PDO $pdo) {}

    public function allDogs():array{
        $select = 'SELECT * from dog';
        $stmt = $this->pdo->prepare($select);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}