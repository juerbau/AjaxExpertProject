<?php

namespace App\Orders;
use PDO;

class OrderRepository{

    public function __construct(protected PDO $pdo){}

    public function allOrders(): array{
        $selection = "SELECT auftrag.auftragID, edl.edlName, repr.reprMail, status.status FROM auftrag
         LEFT JOIN repr ON auftrag.reprNr = repr.reprID
         LEFT JOIN edl ON auftrag.edlNr = edl.edlID
         LEFT JOIN status ON auftrag.statusNr = status.statusID;";
        $stmt = $this->pdo->prepare($selection);
        $stmt->setFetchMode(PDO::FETCH_CLASS, OrderModel::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function orderByID($id): array{
        $selection = "SELECT auftrag.auftragID, edl.edlName, repr.reprMail, status.status FROM auftrag
         LEFT JOIN repr ON auftrag.reprNr = repr.reprID
         LEFT JOIN edl ON auftrag.edlNr = edl.edlID
         LEFT JOIN status ON auftrag.statusNr = status.statusID
         WHERE auftrag.auftragID = :ID";
        $stmt = $this->pdo->prepare($selection);
        $stmt->bindValue(':ID', $id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, OrderModel::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function allEDL(): array{
        $selection = "SELECT * FROM edl";
        $stmt = $this->pdo->prepare($selection);
        $stmt->setFetchMode(PDO::FETCH_CLASS, EdlModel::class);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}