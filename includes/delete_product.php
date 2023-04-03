<?php
$serverHost = "localhost";
$dbName = "products";
$username = "root";
$password = "";

$db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);

if(isset($_POST["deletebtn"])) {
    $id = $_GET["deletebtn"];
    $delete = $db->prepare("DELETE FROM products WHERE id=?");
    $delete->bindParam(":id", $id);
    $delete->execute();
    header("Location:products.php?Product=deleted");
    


}
$db = null;
?>