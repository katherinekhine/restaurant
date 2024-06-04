<?php

namespace classes;

use classes\Database;

class Menu extends Database
{
    public function store($data = [])
    {
        $query = "INSERT INTO menu (title, price, image, detail) VALUES (:title, :price, :image, :detail)";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':title' => $data['title'],
            ':price' => $data['price'],
            ':image' => $data['image'],
            ':detail' => $data['detail']
        ]);
        return $result->rowCount();
    }

    public function all()
    {
        $query = "SELECT * FROM menu";
        $result = $this->connect()->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    public function show($id)
    {
        $query = "SELECT * FROM menu WHERE id = :id";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':id' => $id
        ]);
        return $result->fetchObject();
    }

    public function update($data)
    {
        if ($data['image']) {
            $query = "UPDATE menu SET title = :title, price = :price, image = :image, detail = :detail WHERE id = :id";
        } else {
            $query = "UPDATE menu SET title = :title, price = :price, detail = :detail WHERE id = :id";
        }
        $result = $this->connect()->prepare($query);
        $result->execute($data);
        return $result->rowCount();
    }
}
