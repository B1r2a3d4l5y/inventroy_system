<?php
$serverHost = "localhost";
$dbname = "login";
$dbUsername = "root";
$dbPassword = "";

try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbUsername, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if(isset($_POST["add_user"])) {
        $username = trim($_POST["username"]);
        $user_password = trim($_POST["userpassword"]);
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);

        if(empty($username) || empty($user_password)) {
          header("Location:users.php?Fields=fieidls are empty please fill them in");
          exit;
        } else {
          $sql = "INSERT INTO users(username, password) VALUES(?,?)";
          $statement = $db->prepare($sql);
          $statement->execute([$username, $user_password]);
          header("Location:users.php?user= user successfully added");
          exit; 

          
        }
      }

} catch(PDOException $exception) {
  $error = $exception->getMessage();
  echo $error;

}
