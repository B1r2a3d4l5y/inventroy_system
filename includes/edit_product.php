<?php
try {
  $serverHost = "localhost";
  $dbname = "products";
  $username = "root";
  $password = "";


  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  function test_input ($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $product_id = test_input($_POST["id"]);
    $quantity = test_input($_POST["quantity"]);
    $product_price = test_input($_POST["product_price"]);

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

} catch(PDOException $exception) {
  $errorMessage = $exception->getMessage();
  echo $errorMessage;


}
