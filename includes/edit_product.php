<?php
$serverHost = "localhost";
$dbname = "products";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$serverHost; dbname=dbname=$dbname", $username, $password);

if(isset($_POST["update"])) {
  $product_price = $_POST["product-price"];
  if(empty($product_price) ) {
    header("Location:../edit.html?price=empty");
    exit;
  } else {
     $update = $db->prepare("UPDATE TABLE products SET price WHERE price=? ")
    
  }
}
