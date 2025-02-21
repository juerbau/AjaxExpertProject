<?php

namespace App\Model;
use PDO;

class ProductRepository
{
    public function __construct(protected PDO $pdo) {}

    public function allProducts():array{
        $select = 'SELECT * from product';
        $stmt = $this->pdo->prepare($select);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}