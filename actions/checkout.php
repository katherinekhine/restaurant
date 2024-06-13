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


header('location: ../index.php');
