<?php

include "../vendor/autoload.php";

use classes\Menu;

$id = $_GET['id'];
$title = htmlspecialchars(trim($_POST['title']));
$price = htmlspecialchars(trim($_POST['price']));
$detail = htmlspecialchars(trim($_POST['detail']));
$image = $_FILES['image'];

if (empty($title) || empty($price) || empty($detail)) {
    header("location:../menu-edit.php?id=$id&error=1");
} else {
    $menu = new Menu();

    if (is_uploaded_file($image['tmp_name'])) {
        $image_path = "photos/" . $image['name'];
        move_uploaded_file($image['tmp_name'], '../' . $image_path);
        $menu->update([
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'detail' => $detail,
            'image' => $image_path,
        ]);
    } else {
        $menu->update([
            'id' => $id,
            'title' => $title,
            'price' => $price,
            'detail' => $detail,
        ]);
    }

    header('location: ../index.php');
}
