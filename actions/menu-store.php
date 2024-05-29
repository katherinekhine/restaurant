<?php

include "../classes/menu.php";

$title = htmlspecialchars(trim($_POST['title']));
$price = htmlspecialchars(trim($_POST['price']));
$detail = htmlspecialchars(trim($_POST['detail']));
$image = $_FILES['image'];

if (empty($title) || empty($price) || empty($detail) || !is_uploaded_file($image['tmp_name'])) {
    header("location: ../menu-create.php?error=1");
} else {
    $image_path = "photos/" . $image['name'];
    move_uploaded_file($image['tmp_name'], "../$image_path");

    $menu = new Menu;
    $menu->store([
        'title' => $title,
        'price' => $price,
        'detail' => $detail,
        'image' => $image_path
    ]);

    header("location: ../index.php");
}
