<?php
$serverHost = "localhost";
$dbname = "login";
$dbUsername = "root";
$dbPassword = "";

try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbUsername, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      function test_input($data) {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        return $data;
      }

      if($_SERVER["REQUEST_METHOD" === "POST"]) {
        $username = test_input($_POST["username"]);
        $user_password = test_input($_POST["password"]);
        $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
        if(empty($username) || empty($user_password)) {
          header("Location:users.php?Fields=fieidls are empty please fill them in");
          exit;
        } else {
          $sql = "INSERT INTO users(:username, :password) VALUES(?,?)";
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
