<?php

$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbPassword = "";
$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";

session_start();

try {
  $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // FUNCTION to sanitise data
  function test_input($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
  }

  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = test_input($_POST["user"] );
    $password = test_input($_POST["password"]);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($user) || empty($password)) {
      header("Location:../login.php?Fields=Please fill in the fields");
      exit;
    } else {
      $statement = $db->prepare("SELECT * FROM `users` WHERE  username=:username AND  password=:password ");
      $statement->execute([':username' => $user, ':password' => $password]);

      while ($statement->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION["logged"] = 1;
        $_SESSION["user"] = $user;
        header("Location:dashboard.php");
        exit;
      }
    }
  }
} catch (PDOException $error) {
  $message = $error->getMessage();
  echo $message;
}
