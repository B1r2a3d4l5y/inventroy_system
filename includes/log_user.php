<?php

$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";




if(isset($_POST["login"])) {
    $user = trim($_POST["user"]);
    $password = $_POST["password"];
    $hash_password = password_hash($password , PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
        header("Location:../login.php?Fields=empty");
        exit;
    } else {
        // check database connection and connect
        try {
              $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              echo "connection successful";
        } catch(PDOEception $exception)  {
            echo "connnection failed:".$exception->getMessage();
        }
      
    }
    $stmt = $db->prepare("SELECT *  FROM  users WHERE :username=$user AND :password=$hash_password ");
    $stmt->bindParam(":username" , $user);
    $stmt->bindParam(":password", $password ) ;
    
    while($stmt->fetch(PDO::FETCH_ASSOC)) {
        //start the session
        session_start();
        $_SESSION["logged"] = 1; // login session
        $_SESSION["user"] = $user; // login by username
        header("Location:dashboard.php");
        exit;
    }
   

   }
   //close connection 
   $db = null;
