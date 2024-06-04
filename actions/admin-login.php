<?php

session_start();

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    header('location: ../login.php?empty=1');
} elseif ($email == "admin@example.com" && $password == "password") {
    $_SESSION['admin'] = true;
    $_SESSION['name'] = "Manager";
    header('location: ../index.php');
} else {
    header('location:../login.php?error=1');
}
