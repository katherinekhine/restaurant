<?php
include "components/header.php";
?>

<div class="border p-4 shadow mt-5 w-50 mx-auto">
    <h1 class="text-center mb-5"><i class="bi bi-person-circle"></i>Login</h1>
    <form action="actions/admin-login.php" method="post" class="text-center">
        <?php if (isset($_GET['error'])) : ?>
            <p class="text-danger">Email or Password is wrong</p>
        <?php endif; ?>

        <?php if (isset($_GET['empty'])) : ?>
            <p class="text-danger">Please fill all fields</p>
        <?php endif; ?>

        <input type="email" placeholder="Email" class="form-control mb-3 border-success" name="email">
        <input type="password" placeholder="Password" class="form-control mb-3 border-success" name="password">
        <input type="submit" value="Login" class="btn btn-success">
</div>


<?php
include "components/footer.php";
?>