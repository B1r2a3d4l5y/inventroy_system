<?php
session_start();

$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";

 try {
    $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connection sucessful";
 } catch(PDOException $exception) {
    echo "connection failed".$excption->getMessage();



 }

if(isset($_POST["login"])) {
    
    $user = trim($_POST["user"]);
    $password = trim($_POST["password"]);
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($user) || empty($password)) {
        header("Location:../login.php?fields=empty");
        exit;
    } else {
        $query = $db->query("SELECT * FROM users  WHERE  username=$user AND  password=$hash_password");
        $result= $db->prepare($query);
        $result->execute(array("username"=> $user , "password" =>$hash_password));
        while($result->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["logged"] = 1;
            $_SESSION["user"] = $user;
            header("Location: dashboard.php");
            exit;
        }


     
    }
}
$db = null;
?>