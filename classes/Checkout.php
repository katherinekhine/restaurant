<?php

namespace classes;

class Checkout extends Database
{
    public function store($data = [])
    {
        $query = "INSERT INTO checkout (user_id, name, email) VALUES (:user_id, :name, :email)";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':user_id' => $data['user_id'],
            ':name' => $data['name'],
            ':email' => $data['email']
        ]);
        return $result->rowCount();
    }
}
