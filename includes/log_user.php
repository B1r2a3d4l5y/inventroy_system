<?php
session_start();
require "database.php";
if(isset($_POST["login"])) {
    $username = trim($_POST["user"]);
    $password = trim($_POST["password"]);

    if(empty($username )|| empty($password)) {
        header("Location:../login.php?fields=empty");
        exit();
    } else {
          $stmt = $conn->prepare("SELECT * FROM users WHERE username=$username AND password=$password");
          if($stmt === false) {
            die("SQL error");
          }
          if($stmt === true) {
             $stmt->bind_param("ss", $username, $password);
             $stmt->execute();
             $stmt->bind_result();
             $stmt->fetch_result();
             
             if($stm->num_rows === 1) {
                while($stmt->fetch_assoc() ) {
                    session_register("user");
                    session_register("password")
                  $_SESSION["user"] = $username;
                    header("Location:../dashboard.php?login=success");
                } 
             } else {
                    echo "Invalid username and password";
                    header("Location:../login.php");
                    $stmt->close();
                }

          }
    }
} else {
    $conn->close();
}
?>