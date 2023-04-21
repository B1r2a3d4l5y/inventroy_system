<?php

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
  
  if(isset($_SESSION["user"])) {
    header("Location:dashboard.php");
    exit;
  }
 

if(isset($_POST["login"]) ) {

    $user = trim($_POST["user"] ) ;
    $password = trim($_POST["password"]);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user) || empty($password_hash)) {
      header("Location:../login.php?fields=please fill in the fields");
      exit;

    }  else {

      $query = "SELECT * FROM  users WHERE :username=$user AND :password=$password_hash";

      $statement = $db->prepare($query);
      $statement->bindParam(":username", $user, PDO::PARAM_STR);
      $statement->bindParam(":password", $password_hash, PDO::PARAM_STR);
      $statement->execute();


      while ($statement->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        header("Location:dashboard.php");
        exit;
      }
       
      
      

    }
  



  }
  $db = null;