<?php
$serverHost = "localhost";
$dbName = "products";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);

if(isset($_POST["deletebtn"])) {
    $id = $_POST["id"];
    $delete = $db->prepare("DELETE FROM  products WHERE id=$id") ;
    $stmt->execute();
    header("Location:products.php");
   
    


}
$db = null;
?>