<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";

  
   

    if(isset($_POST["login"])) {
    
    $user = trim($_POST["user"]);
    $password = trim($_POST["password"]);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
      header("Location:../login.php");
      exit;
    } else {
      $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $statement = $db->prepare("SELECT * FROM users WHERE :username=$user AND :password=$password") ;

      $statement->execute(array(':username'=>$user , ':password'=> $password));

      $num_rows = $statement->rowCount();
      
      if($num_rows > 0) {
        $_SESSION["logged "] =1 ;
        $_SESSION["user"] = $user;
        header("Location:dashboard.php");
        exit;

      } else {
        header("Location:../login.php?login=failed");
        exit;
      }

     }
    }

   

$db = null;


