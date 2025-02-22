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

    public function addDog($newDog): string {
        $add = 'insert into dog (name, age, gender, notes) values (:name, :age, :gender, :notes)';
        $stmt = $this->pdo->prepare($add);
        $stmt->bindValue(':name', $newDog['name']);
        $stmt->bindValue(':age', $newDog['age']);
        $stmt->bindValue(':gender', $newDog['gender']);
        $stmt->bindValue(':notes', $newDog['notes']);
        $stmt->execute();
        return "new Dog was added";
    }

    public function delete($id): void {
        $stmt = $this->pdo->prepare('DELETE FROM `dog` WHERE id=:id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}

