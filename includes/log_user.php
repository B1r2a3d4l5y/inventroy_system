<?php
session_start();
include "database.php";

if(isset($_SESSION['use'])) {
    header("Location:../login.php");
}
if(isset($_POST["login"])){
    
    $username = $_POST["user"];
    $password = $_POST["password"];

    if(empty($username)|| empty($password)) {
        header("Location:login.php?Empty=Please fill in the fileds");
        echo "<script>alert('fields are empty please fill them in.')</script>";



    } else {
        if($password!='password') {
            header("Location:../login.php?password=incorrect");
            echo "<script>alert('Password is wrong.  Please check it')</script>";
        }
    }

} 
