<?php

include "vendor/autoload.php";

use classes\Booking;

$id = $_GET['id'];
$booking = new Booking();
$menu = $booking->showMenu($id);
$customer = $booking->show($id);

?>

<?php
include "components/header.php";
?>

<label for="" class="text-secondary mt-5">Name</label>
<p class="fw-bold"><?= $customer->name ?></p>
<label for="" class="text-secondary">Email</label>
<p class="fw-bold"><?= $customer->email ?></p>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Menu ID</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($menu as $item) : ?>
            <tr>
                <td><?= $item['menu_id'] ?></td>
                <td><?= $item['qty'] ?></td>
                <td><?= $item['price'] ?></td>
                <td><?= $item['total'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include "components/footer.php";
?>