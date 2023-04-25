<?php
$serverHost = "localhost";
$dbname = "products";
$username = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


}

