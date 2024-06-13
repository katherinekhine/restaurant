<?php

include "../vendor/autoload.php";

use classes\Cart;

$user_id = $_COOKIE['user_id'];
$menu_id = $_POST['menu_id'];
$cart = new Cart();
$cart->cartDelete($user_id, $menu_id);

header("location: ../index.php");
