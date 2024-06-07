<?php

if (!isset($_SESSION)) {
    session_start();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- Bootstrap cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- google front -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- google icon cdn link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- remix icon link -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">

    <!-- custom css link -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-warning">
        <div class="container-fluid">
            <a class="navbar-brand fs-4" href="#"><i class="ri-restaurant-2-fill fs-3"></i> The Golden Plate</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 fs-5">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu</a>
                    </li>
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= $_SESSION['name'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="actions/admin-logout.php">Logout</a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container">