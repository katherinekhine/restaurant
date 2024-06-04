<?php

include "../vendor/autoload.php";

use classes\Menu;

$id = $_GET['id'];

$menu = new Menu();
$menu->delete($id);

header("location: ../index.php");
