<?php

include "vendor/autoload.php";

use classes\Menu;

$menus = new Menu();
$menus = $menus->all();

?>

<?php
include "components/header.php";
?>

<h1 class="mt-3 ">Menu List</h1>

<a href="menu-create.php" class="my-3 d-inline-block"><i class="bi bi-plus-circle-fill"></i> New Menu</a>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-gap-5">
    <?php foreach ($menus as $menu) : ?>
        <div class="col">
            <div class="card">
                <img src="<?= $menu['image'] ?>" alt="" height="200rem" style="object-fit: cover;">
                <div class="card-body">
                    <p class="card-text">
                        <?= $menu['title'] ?>
                    </p>
                </div>
                <div class="card-footer d-flex flex-wrap justify-content-between align-items-center">
                    <p> $ <?= $menu['price'] ?></p>
                    <p><i class="bi bi-cart-plus-fill"></i></p>
                    <p class="w-100">
                        <a href="menu-show.php?id=<?= $menu['id'] ?>" class="btn btn-link border me-2"><i class="bi bi-eye-fill"></i>Show</a>
                        <a href="menu-edit.php?id=<?= $menu['id'] ?>" class="btn btn-link border me-2"><i class="bi bi-pencil-square"></i>Edit</a>
                    </p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php
include "components/footer.php";
?>