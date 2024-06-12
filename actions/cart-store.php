<?php

include "../vendor/autoload.php";

use classes\Cart;

$user_id = $_COOKIE['user_id'];
$menu_id = $_POST['menu_id'];
$menu_qty = $_POST['menu_qty'];
$menu_price = $_POST['menu_price'];

$cart = new Cart();
if (!$cart->checkCart($user_id, $menu_id)) {
    $cart->store([
        'user_id' => $_COOKIE['user_id'],
        'menu_id' => $menu_id,
        'menu_qty' => $menu_qty,
        'menu_price' => $menu_price,
    ]);
}
header('location: ../index.php');
