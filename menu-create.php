<?php
include "components/header.php";
?>

<h1 class="mt-3">ADD New Menu Item</h1>
<form action="actions/menu-store.php" method="post" class="mt-4" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Menu Title" class="form-control mb-3">
    <input type="number" name="price" class="form-control mb-3" placeholder="Price">
    <textarea name="detail" id="" placeholder="Detail About Item" class="form-control mb-3"></textarea>
    <input type="file" name="image" class="form-control mb-3">
    <div class="flex mt-4">
        <a href="index.php" class="btn btn-secondary">
            << Back</a>
                <button type="submit" class="btn btn-primary">ADD New Item</button>
    </div>
</form>

<?php
include "components/footer.php";
?>