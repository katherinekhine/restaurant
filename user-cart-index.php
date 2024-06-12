<?php

use classes\Cart;

include "vendor/autoload.php";
$cart = new Cart();
$items = $cart->userCartAll($_COOKIE['user_id']);

?>

<?php include "components/header.php"; ?>

<table class="table table-sm table-bordered mt-3">
    <thead>
        <tr>
            <th>Menu ID</th>
            <th class="text-center">Image</th>
            <th class="text-center">Price</th>
            <th class="text-center">Qty</th>
            <th class="text-center">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php foreach ($items as $item) : ?>
            <?php $total += $item['total']; ?>
            <tr class="align-middle">
                <td><?= $item['id'] ?></td>
                <td class="text-center"><img src="<?= $item['image'] ?>" alt="" height="100" width="100" style="object-fit: cover;"></td>
                <td class="text-center"><?= $item['price'] ?></td>
                <td class="text-center"><?= $item['qty'] ?></td>
                <td class="text-center"><?= $item['total'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
            <td class="text-center"><?= $total ?></td>
        </tr>
    </tfoot>
</table>

<a href="checkout.php" class="d-block bg-primary text-white btn">Checkout</a>

<?php include "components/footer.php"; ?>