<?php

use classes\Menu;

include_once "vendor/autoload.php";

$id = $_GET['id'];

$menu = new Menu();
$item = $menu->show($id);

?>

<?php
include "components/header.php";
?>

<?php if (isset($_SESSION['admin'])) : ?>
    <h1 class="mt-4"><?= $item->title ?></h1>

    <img src="<?= $item->image ?>" alt="" height="300rem" class="border border-5">

    <p class="fs-3 fw-bold my-3">$ <?= $item->price ?></p>

    <label for="" class="d-block fw-bold">Detail:</label>
    <p>
        <?= $item->detail ?>
    </p>
    <a href="index.php" class="btn btn-secondary">&lt; &lt; Go Back</a>

<?php else : ?>
    <p class="fs-2 text-center pt-5">
        <i class="bi bi-exclamation-triangle-fill text-danger"></i>
        You are not authorized.
    </p>
<?php endif; ?>

<?php
include "components/footer.php";
?>