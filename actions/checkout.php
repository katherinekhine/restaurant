<?php

include "../vendor/autoload.php";

use classes\Checkout;

$user_id = $_COOKIE['user_id'];
$name = $_POST['name'];
$email = $_POST['email'];

$checkout = new Checkout();
$checkout->store([
    'user_id' => $user_id,
    'name' => $name,
    'email' => $email,
]);


setcookie('user_id', $_COOKIE['user_id'], time() - 1, "/restaurant");

header('location: ../index.php');
