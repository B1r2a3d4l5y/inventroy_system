<?php
$serverHost = "localhost";
$dbname = "products";
$username = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(isset($_POST["update"])) {
   $price = trim($_POST["productprice"]);
   $id = trim($_POST["id"]);

    if(empty($price)) {
      header("Location:../edit.html?price= please enter price");
      exit;
    } else {
      
      $query = "UPDATE products SET price=? WHERE id=? ";

      $statement = $db->prepare($query);

      $statement->execute([$price, $id]);

      header("Location:products.php?product=price has being updated");
      exit;
    
      
    }
     
   }


} catch(PDOException $exception) {
  $errorMessage = $exception->getMessage();
  echo $errorMessage;

}
$db = null;


