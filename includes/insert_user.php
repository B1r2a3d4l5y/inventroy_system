<?php
$serverHost = "localhost";
$dbname = "login";
$dbUsername = "root";
$dbPassword = "";

try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbUsername, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if(isset($_POST["add_user"])) {
        $user = trim($_POST["username"]);
        $userPassword = trim($_POST["userpassword"]);
        $userPassword_hash = password_hash($userPassword);

        if(empty($user) || empty($userPassword)) {
          header("Location:user.php?fields=Please fill them in");
          exit;
        }

      }


}
