<?php

include "vendor/autoload.php";

use classes\Cart;
use classes\Menu;

$menus = new Menu();
$menus = $menus->all();

if (!isset($_COOKIE['user_id'])) {
    setcookie('user_id', md5(rand()), time() + (60 * 60 * 24), 'localhost/restaurant');
}

$cart = new Cart();

?>

<?php
include "components/header.php";
?>

<h1 class="mt-3 ">Menu List</h1>
<?php if (isset($_SESSION['admin'])) : ?>

    <a href="menu-create.php" class="my-3 d-inline-block"><i class="bi bi-plus-circle-fill"></i> New Menu</a>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-gap-5 mt-3">
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
                            <a href="menu-show.php?id=<?= $menu['id'] ?>" class="btn btn-link border me-2"><i class="bi bi-eye-fill"></i></a>
                            <a href="menu-edit.php?id=<?= $menu['id'] ?>" class="btn btn-link border me-2"><i class="bi bi-pencil-square"></i></a>
                            <a href="actions/menu-delete.php?id=<?= $menu['id'] ?>" class="btn btn-link border me-2" onclick="return confirm('Are you sure you want to delete')"><i class=" bi bi-trash"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php else : ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-gap-5 mt-3">
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
                        <?php if (isset($_COOKIE['user_id']) && $cart->checkCart($_COOKIE['user_id'], $menu['id'])) : ?>
                            <form action="actions/cart-delete.php" method="post">
                                <input type="hidden" name="user_id" value="<?= $_COOKIE['user_id'] ?>">
                                <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                <button type="submit" class="btn bg-none text-danger"><i class="bi bi-dash-circle-fill"></i></button>
                            </form>
                        <?php else : ?>
                            <form action="actions/cart-store.php" method="post">
                                <input type="hidden" name="menu_id" value="<?= $menu['id'] ?>">
                                <input type="hidden" name="menu_qty" value="1">
                                <input type="hidden" name="menu_price" value="<?= $menu['price'] ?>">
                                <button type="submit" class="btn bg-none"><i class="bi bi-cart-plus-fill"></i></button>
                            </form>
                        <?php endif; ?>
                        <p class="w-100">
                            <a href="menu-show.php?id=<?= $menu['id'] ?>" class="btn btn-link border me-2"><i class="bi bi-eye-fill"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php
include "components/footer.php";
?>