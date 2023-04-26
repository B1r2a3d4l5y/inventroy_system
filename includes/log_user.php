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
  



  } else {
    $statement = $db->prepare("SELECT * FROM users WHERE username=:username AND password=:password ");
    $statement->bindValue("username", $user, PDO::PARAM_STR);
    $statement->bindValue("password", $password, PDO::PARAM_STR);
    $statement->execute();


      while($statement->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        header("Location:dashboard.php");
        exit;
      }
  } 
  
  
  } catch(PDOEXception $error) {
    $message = $error->getMessage();
    echo $message;
  }
  
}



  $db = null;