<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "login";

$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($conn->connect_error ) {
    die("Connection error".$conn->connect_error);
} else {
    die("connection succesful");
}