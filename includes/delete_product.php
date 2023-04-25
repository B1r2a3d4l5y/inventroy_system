<?php
$serverHost = "localhost";
$dbName = "products";
$username = "root";
$password = "";

try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     if(isset($_GET["deletebtn"])) {
    $id = $_GET["deletebtn"];
    $delete = $db->prepare("DELETE FROM products WHERE id=$id");
    $delete->execute();
    header("Location:products.php?product=deleted");
    exit;
    



}
} catch(PDOexception $exception) {
    $message = $exception->getMessage();
    echo $message;

}