<?php
$serverHost = "localhost";
$dbname = "products";
$username = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   if(isset($_POST["update"])) {
    $price = trim($_POST["product-price"]);
    if(empty($price)) {
      header("Location:../edit.html?price= please enter price");
      exit;
    } else {
      $query = "UPDATE products SET price=:price WHERE id=:id ";
      $statement = $db->prepare($query);
      if(!$statement->execute() ) {
        echo "SQL error";
      } else {
        $statement->execute(array(
          'price' => $price
        )); 
        header("Location:products.php?product=edited");
        exit;

      }
    }
     
   }


} catch(PDOException $exception) {
  $errorMessage = $exception->getMessage();
  echo $errorMessage;

}
$db = null;

