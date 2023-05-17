<?php
$serverHost = "localhost";
$dbName = "products";
$username = "root";
$password = "";
try {
    if(isset($_POST['add'])) {
    $product_name = trim($_POST["product_name"]);
    $quanity =  trim($_POST["quanity"]);
    $product_price =  trim($_POST["productprice"]);

    $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);
    
    if(empty($product_name) || empty($quanity) || empty($product_price)) {
        header("Location:products.php?fields=empty");
        exit;

    }  else {
         if(!preg_match("/[0-9]+/" , $product_price)) {
            header("Location:products?price=is nota number");
            exit;
         } else {
            $sql = "INSERT INTO products(product_name, quanity, price) VALUES(?,?,?) ";
            $statement = $db->prepare($sql);
            $statement->execute([$product_name, $quanity, $product_price]);
            header("Location:products.php?product=product= product suceessfuly inserted");
            exit;
        }
    }
}
} catch(PDOException $exception) {
    $errormessge = $exception->getMessage();
    echo $errormessge;
}


$db = null;
   