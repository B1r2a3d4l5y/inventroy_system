<?php
require "database.php";
error_reporting(-1);
ini_set('display_errors', 'On');

if(isset($_POST["login"])){
    $username = trim($_POST["username"] );
    $password = password_hash(trim($_POST["password"]);)

    if(empty($username)|| empty($password)) {
        header("Location:../login.php?Fields=empty");
    } else {
        if(!password_verify('password', $password)) {
            header("Location:../login.php?password=invalid");
        } else {
            $stmt = $conn->prepare("SELECT * FROM users WHERE username=? AND password=?");
            

        }
    }

}

?>