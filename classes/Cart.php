<?php

namespace classes;

use classes\Database;

class Cart extends Database
{
    public function store($data = [])
    {
        $query = "INSERT INTO carts (user_id, menu_id, qty, price, total) VALUES (:user_id, :menu_id, :qty, :price, :total)";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':user_id' => $data['user_id'],
            ':menu_id' => $data['menu_id'],
            ':qty' => $data['menu_qty'],
            ':price' => $data['menu_price'],
            ':total' => $data['menu_qty'] * $data['menu_price']
        ]);
        return $result->rowCount();
    }

    public function checkCart($user_id, $menu_id)
    {
        $query = "SELECT * FROM carts WHERE user_id = :user_id AND menu_id = :menu_id";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':user_id' => $user_id,
            ':menu_id' => $menu_id
        ]);
        return $result->rowCount();
    }
    public function countCart($user_id)
    {
        $data = $this->userCartAll($user_id);
        return count($data);
    }

    public function userCartAll($user_id)
    {
        $query = "SELECT carts.*, menu.image FROM carts LEFT JOIN menu ON carts.menu_id =menu.id WHERE user_id =:user_id";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':user_id' => $user_id
        ]);
        return $result->fetchAll();
    }

    public function cartDelete($user_id, $menu_id)
    {
        $query = "DELETE FROM carts WHERE user_id = :user_id AND menu_id = :menu_id";
        $result = $this->connect()->prepare($query);
        $result->execute([
            ':user_id' => $user_id,
            ':menu_id' => $menu_id
        ]);
        return $result->rowCount();
    }
}
