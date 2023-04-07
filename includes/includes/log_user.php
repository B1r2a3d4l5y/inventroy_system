<?php
$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";




if(isset($_POST["login"])) {
    $username = trim($_POST["user"]);
    $password = $_POST["password"];
    $pass_hash = password_hash("password" , PASSWORD_DEFAULT);

    if(empty($username) || empty($password)) {
        header("Location:../login.php?Fields=empty");
        exit;
    } else {
        
        $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword );

       $query = $db->query("SELECT * FROM users WHERE username=? AND password=?" );
        $stmt = $db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        
        while($stmt->fetch(PDO::FETCH_ASSOC)) {
            session_start();
            $_SESSION["logged"] = 1;
            $_SESSION["user"] = $username;
            $_SESSION["password"] = $password;
            header("Location:dashboard.php");
            exit;
        }
    }
}
$db = null;
?>