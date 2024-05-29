<?php

include "../libs/database.php";

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
}
