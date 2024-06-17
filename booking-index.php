<?php

include "vendor/autoload.php";

use classes\Booking;

$booking = new Booking();
$booking = $booking->index();

?>

<?php
include "components/header.php";
?>

<table class="table table-borders mt-5">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Name</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($booking as $book) : ?>
            <tr>
                <td><?= $book['id'] ?></td>
                <td><?= $book['user_id'] ?></td>
                <td><?= $book['name'] ?></td>
                <td><?= $book['email'] ?></td>
                <td><a href="booking-show.php?id=<?= $book['id'] ?>">Show Details</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
include "components/footer.php";
?>