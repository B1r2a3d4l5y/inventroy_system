<?php
$serverHost = "localhost";
$dbUsername = "root";
$dbPassword ="";
$dbName = "login";

$conn = new mysqli($serverHost, $dbUsername, $dbPassword, $dbName );
if($conn->connect_error) {
    echo "connection error". $conn->connect_error;
} else {
    echo "connection successful";
}
?>