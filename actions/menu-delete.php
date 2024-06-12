<?php

include "../vendor/autoload.php";

use classes\Menu;

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    if (isset($_SESSION['admin'])) {
        $menu = new Menu();
        $item = $menu->show($id);
        if ($item) {
            $menu->delete($id);
            header("location: ../index.php");
        } else {
            echo "This is not a valid";
        }
    } else {
        echo "You are not allowed to delete this";
    }
}
