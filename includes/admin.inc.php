<?php
include "./db.inc.php";
include "./function.inc.php";

if (isset($_POST["submit"])) {
    $itemName = $_POST["item_name"];
    $category = $_POST["category"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $imgSrc = $_POST["img_src"];


    createItem($conn, $itemName, $category, $price, $description, $imgSrc);
} else {
    header("Location:../../admin.php");
    exit();
}
