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

    public function oneDog($id):array{
        $stmt = $this->pdo->prepare('SELECT * from dog WHERE id=:id');
        $stmt->bindValue(':id', $id);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();
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

    public function updateDog($id, $updateDog): string{
        $stmt = $this->pdo->prepare('UPDATE `dog` SET `name` = :name,
                 `age` = :age, `gender` = :gender, `notes` = :notes WHERE `id` = :id');
        $stmt->bindValue(':name', $updateDog['name']);
        $stmt->bindValue(':age', $updateDog['age']);
        $stmt->bindValue(':gender', $updateDog['gender']);
        $stmt->bindValue(':notes', $updateDog['notes']);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return "Dog with the ID:{$id} was updated";
    }

    public function delete($id): void {
        $stmt = $this->pdo->prepare('DELETE FROM `dog` WHERE id=:id');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}

