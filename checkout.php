<?php
include "vendor/autoload.php";
?>

<?php
include "components/header.php";
?>

<h1 class="my-3 ">Checkout Your Menu</h1>

<form action="actions/checkout.php" method="post">
    <input type="hidden" name="user_id" value="<?= $_COOKIE['user_id'] ?>">
    <input type="text" name="name" placeholder="Your Name" class="form-control mb-3">
    <input type="email" name="email" placeholder="Your Email" class="form-control mb-3">
    <button type="submit" class="btn btn-primary">Checkout</button>
</form>


<?php
include "components/footer.php";
?>