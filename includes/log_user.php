<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require 'database.php';

if(isset($_POST["login"])) {
    $username = trim($_POST["user"]);
    $password = $_POST["password"];
    $pass_hash = password_hash("password" , PASSWORD_DEFAULT);

    if(empty($username) || empty($password)) {
        header("Location:../login.php?Fields=empty");
        exit;
    } else {
    $stmt = $conn->prepare("SELECT * FROM  users WHERE username=? AND password=?");
    if($stmt === FALSE) {
        die("SQL error" );
    } else {

        $stmt->bind_param("ss", $username, $password );
        $stmt->execute();
            while ($stmt->fetch()) {
                session_start();
                $_SESSION["logged"] = 1;
                $_SESSION["user"] = $username;
                $_SESSION["password"] = $password;
                header("Location:dashboard.php");
                exit;
                $stmt->close();


            }
        

    }


    }
} else {
    $conn->close();
}
?>