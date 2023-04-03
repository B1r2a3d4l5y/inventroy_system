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
            $bd = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password)
            $insert = $db->prepare("INSERT INTO products(product_name, quanity,  price)VALUES(:product_name, :quanity, :price)");
            $insert->bindParam(":product_name" , $product_name);
            $insert->bindParam(":quanity" , $quanity);
            $insert->bindParam(":price", $product_price);
            $insert->execute();
            echo '<script language ="javascript" type="text/javascript">alert("Product successfully added/inserted")
            </script>';

            header("Location:products.php");
         }
    }
}
$db = null;
   
?>