<?php
$serverHost = "localhost";
$dbName = "products";
$Username = "root";
$password = "";
try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $Username, $password 
);
$b->setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
 } catch(PDOException $e) {
    echo "connection failed";
    $e->getMessage(); 
 }
 $db = null;


?>