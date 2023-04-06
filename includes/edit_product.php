<?php
$serverHost = "localhost";
$dbname = "products";
$username = "root";
$password = "";

if(isset($_POST["update"])) {
    $product_price = $_POST["product-price"];

    if(empty($product_price)) {
      header("Location:../edit.html?price=empty");
      exit;

    } else {
        $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
        $query = $db->query("UPDATE TABLE products SET price=?");
        $stmt = $db->prepare($query);
        $stmt->bindParam(":price" , $product_price);
        $stmt->execute();
    }
}
$db = null;