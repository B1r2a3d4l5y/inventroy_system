<?php
$serverHost = "localhost";
$dbname = "products";
$username = "root";
$password = "";


$db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["update"])) {

  $product_id = trim($_POST["id"]);
  $quantity = trim($_POST["quantity"]);
  $product_price = trim($_POST["productprice"]);

  if (empty($quantity) || empty($product_price)) {
    header("Location:../edit.php?edit=Please fill in the fields");
    exit;
  }
  $update = "UPDATE products SET quantity=:quantity, price=:price WHERE id=:id";
  $data = [
    ':quantity' => $quantity,
    ':price' => $product_price,
    ':id' => $product_id
  ];
  $statement = $db->prepare($update);
  $statement->execute($data);

  header("Location:products.php?products=product has been successfully updated");
  exit;
}
