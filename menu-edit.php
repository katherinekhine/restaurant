<?php

include "vendor/autoload.php";

use classes\Menu;

$id = $_GET['id'];

$result = new Menu();
$menu = $result->show($id);
?>


<?php
include "components/header.php";
?>

<?php if (isset($_SESSION['admin'])) : ?>
    <?php if (isset($menu->id)) : ?>
        <h1 class="mt-3">Update Menu Item</h1>
        <form action="actions/menu-update.php?id=<?= $menu->id ?>" method="post" class="mt-4" enctype="multipart/form-data">

            <?php include "components/error.php"; ?>

            <input type="text" name="title" placeholder="Menu Title" class="form-control mb-3" value="<?= $menu->title ?>">
            <input type="number" name="price" class="form-control mb-3" placeholder="Price" value="<?= $menu->price ?>">
            <textarea name="detail" id="" placeholder="Detail About Item" class="form-control mb-3"><?= $menu->detail ?></textarea>
            <input type="file" name="image" class="form-control mb-3">
            <img src="<?= $menu->image ?>" alt="" height="200rem" class="d-block mb-3">
            <div class="flex mt-4">
                <a href="index.php" class="btn btn-secondary">
                    << Back</a>
                        <button type="submit" class="btn btn-warning">Update Item</button>
            </div>
        </form>

    <?php else : ?>
        <p class="fs-2 text-center mt-5 bg-secondary border-1 shadow
                            ">No Matching article</p>
    <?php endif; ?>

<?php else :  ?>
    <p class="fs-2 text-center pt-5">
        <i class="bi bi-exclamation-triangle-fill text-danger"></i>
        You are not authorized.
    </p>
<?php endif; ?>

<?php
include "components/footer.php";
?>