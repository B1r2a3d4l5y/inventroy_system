<?php
$serverHost = "localhost";
$dbName = "products";
$username = "root";
$password = "";

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
            header("Location:products?price=isnotanumber");
            exit;
         } else {
            $bd = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);
            $insert = $db->prepare("INSERT INTO products(product_name, quanity,  price)VALUES(:product_name, :quanity, :price)");
            $insert->bindValue(":product_name" , $product_name, PDO::PARAM_STR);
            $insert->bindValue(":quanity" , $quanity, PDO::PARAM_INT);
            $insert->bindValue(":price", $product_price, PDO::PARAM_INT);
            $insert->execute();
            header("Location:products.php?insert=sucessful");
            exit;
         }
    }
}
$db = null;
   