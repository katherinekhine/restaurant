<?php

namespace classes;

class Booking extends Database
{
    public function index()
    {
        $query = "SELECT * FROM checkout";
        $result = $this->connect()->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }

    public function show($id)
    {
        $query = "SELECT * FROM checkout WHERE id = :id";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':id' => $id
        ]);
        return $result->fetchObject();
    }

    public function showMenu($id)
    {
        $query = "SELECT carts.*, checkout.* FROM carts LEFT JOIN checkout ON carts.user_id = checkout.user_id Where checkout.id = :id";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':id' => $id
        ]);
        return $result->fetchAll();
    }
}
