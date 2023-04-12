<?php
include("connection.php");

if(isset($_POST["login"])) {
    $user = trim($_POST["user"]);
    $password = $_POST["password"];
    $hash_password = password_hash($password , PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
        header("Location:../login.php?Fields=empty");
        exit;
    } else {
        // check database connection and connect
       
      
    }
     $stmt = $db->prepare("SELECT *  FROM  users WHERE :username=$user AND :password=$hash_password ");
    $stmt->bindParam(":username" , $user);
    $stmt->bindParam(":password", $password ) ;
    var_dump($stmt);
    
    while($stmt->fetch(PDO::FETCH_ASSOC)) {
        //start the session
         session_start();
        $_SESSION["logged"] = 1; // login session
        $_SESSION["user"] = $user; // login by username
        $_SESSION["password"] = $hash_password;
        header("Location: dashboard.php");
        exit;
    }
   
   

   }
   //close connection 
   $db = null;


?>