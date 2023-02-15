<?php
session_start();
extract($_POST);

if(isset($_SESSION["user"])) {
    $_SESSION["user"] === $user;
    header("Location:../login.php");
    exit;

}

if(isset($_POST["login"])) {
    $user = $_POST["user"];
    $password = $_POST["password"];

    if(empty($username) || empty($password)) {
        header("Location:../login.php?Empty=Please fill iin the fields");
        exit;

    } else {
        if(empty($username)) {
            header("Location:./ogin.php?username=Please fill in your username");
            exit;

        } else {
            if(empty($password)) {
                header("Location:../login.php?Password= Please fill in your password.");
                exit;

            } else {
                if($password !="password") {
                    header("Location:../login.php?incoorectpassword= Your password is incorrect. Please check it");
                    exit;

                } else {
                    if($username === "admin" && $password ==="123456") {
                        $_SESSION["user"] === $user;
                        header("Location:../dashboard.php");
                        exit;

                    }
                }
            }
        }
    }

}