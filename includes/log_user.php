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

  

  if(isset($_POST["login"]) ) {

    $user = trim($_POST["user"] )  ;
    $password = trim($_POST["password"]) ;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
      header("Location:../login.php?fields=please fill in the fields");
      exit;

    }  else {

      $query = "SELECT * FROM  users WHERE :username=$user AND :password=$password_hash";

      $statement = $db->prepare($query);
      $statement->execute(array(
        ':username' => $user,
        ':password' => $password_hash
      ));
      $num_rows = $statement->rowCount();


      if($num_rows > 0) {
        $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        header("Location:dashboard.php");
        exit;
      } else {
        header("Location:../login.php=failed");
        exit;
      }
      
       
      
      

    }
  



  }
  
  
  } catch(PDOEXception $error) {
    $message = $error->getMessage();
    echo $message;
  }
  
  


  $db = null;