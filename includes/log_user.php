<?php

 session_start();


 

$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";

try {
  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  

  

  if(isset($_POST["login"]) ) {

    $user = trim($_POST['user'] )  ;
    $password = trim($_POST['password']) ;
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
      header("Location:../login.php?fields=please fill in the fields");
      exit;
  



  }elseif(empty($password) ) {
    header("Location:../login.php?password=Please enter your password");
    exit;
  } elseif(!password_verify($password, $password_hash)){
    header("Location:../login.php?password=Password is incorrect");
    exit;

  } else {
    $statement = $db->prepare("SELECT  *  FROM  `users`  WHERE  `username=:user` AND  `password=:password`  ");
    
    $statement->execute(['username' => $user, 'password'=> $password ]);

      while($statement->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        header("Location:dashboard.php");
        exit;
      }
    }
  }
  
  
  } catch(PDOException $error) {
    $message = $error->getMessage();
    echo $message;
  }

$db = null;
