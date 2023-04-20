<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";

try {
  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "connection suceesful";
  
  } catch(PDOEXception $error) {

 $message =  $error->getMessage();
  }
 

if(isset($_POST["login"]) ) {

    $user = trim($_POST["user"] ) ;
    $password = trim($_POST["password"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user) || empty($password_hash)) {
      header("Location:../login.php?fields=empty");
      exit;

    }  else {
      $statement = $db->prepare("SELECT * FROM users WHERE :username=$user AND  :password=$password_hash");
   $statement->bindParam(":username", $user, PDO::PARAM_STR);
   $statement->bindParam(":password" , $password_hash, PDO::PARAM_STR);
   $statement->execute();

      while ($statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        $_SESSION["password"] = $password_hash;
        header("Location:dashboard.php");
        exit;
      }
       
      
      

    }
  



  }
  $db = null;