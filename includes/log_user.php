<?php
error_reporting(1);
$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";




if(isset($_POST["login"])) {
    $user = trim($_POST["user"]);
    $password = $_POST["password"];
    $password_hash = password_hash($password , PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
        header("Location:../login.php?Fields=empty");
        exit;
    } else {
        // check database connection
        try {
              $db = new PDO("mysql:host=$serverHost; $dbname=$dbname", $dbusername, $dbpassword);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              echo "connection successful";
        } catch(PDOEception $exception)  {
            echo "connnection failed:".$exception->getMessage();
        }
      
    }
    $stmt = $db->prepare("SELECT *  FROM users WHERE $username=$user AND password=$password ");
    $stmt->bindParam(":username", $user, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
    
    while($stmt->fetch(PDO::FETCH_ASSOC)) {
        session_start();
        $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password;
        header("Location:dashboard.php");
        exit;
    }
   

   }
   $db = null;
