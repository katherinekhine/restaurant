<?php

include "../vendor/autoload.php";

use classes\Menu;

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['admin'])) {
    $id = $_GET['id'];

    $menu = new Menu();
    $menu->delete($id);

    header("location: ../index.php");
} else {
    header("location:../index.php");
}
