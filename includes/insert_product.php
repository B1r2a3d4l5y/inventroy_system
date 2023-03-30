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

    } else {
        $insert = $db->prepare("INSERT INTO products(product_name , quanity, price) VALUES(:product_price, :quanity, :price) ") ;
        $insert->bind_param(":product_name",$product_name );
        $insert->bind_param(":quanity", $quanity);
        $insert->bind_param(":price", $product_price);
        $insert->execute();
        $insert->close();
        

    }


}
$db = null;
?>