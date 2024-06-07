<?php

include "../vendor/autoload.php";

use classes\Menu;

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin'])) {
    $id = $_GET['id'];
    if (isset($id)) {
        $menu = new Menu();
        $menu->delete($id);
        header("location: ../index.php");
    } else {
        echo "This is not a valid";
    }
} else {
    echo "You are not allowed to delete this";
}
