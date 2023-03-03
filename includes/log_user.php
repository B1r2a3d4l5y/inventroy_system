<?php
session_start();
session_regenerate_id();
ob_start();
include "database.php";
if(isset($_POST{"login"})){
    $usrname = trim($_POST["user"] ) ;
        $password = trim($_POST["password"]);

        if(empty($usrname)|| empty($password)) {
            die("Fields are empty. Please fill them in") ;
            header("location:../login.php?../login.php?Fields=empty");
        } else {
            if(empty($username)) {
                die("Please enter your username");
                header("location:../login.php?Username = empty");

            } elseif($empty($password)) {
                die("Please enter your password");
                header("location:../login.php?Pasword=empty");

            } else {
                $stmt = $conn->prepare("SELECT * FROM users where username=$username  AND password=$password");
                if($stmt === false ) {
                    die("SQL error");
                } else {
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();
                    $stmt->bind_result("Username, password");
                    $stmt->bind_result();

                    if($stmt->num_rows === 1) {
                        while($stmt->fetch_assoc()) {
                            // register the sessions
                            seession_register("admin");
                            session_register("password");
                            $_SESSION["user"] = $username;
                            header("location:../dashboard.php");
                            
                        }
                    }   else {
                            echo"alert('invalid name and password')";
                            header("location:../login.php");
                            $stmt->close();
                        }  
                    }
                } 
            } 
        } else {
                    $conn->close();
                }
    
?>
