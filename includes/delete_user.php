<?php
$serverHost = "localhost";
$dbName = "login";
$dbusername = "root";
$dbpassword = "";

try {
    $connection = new PDO("mysql:host=$serverHost; dbname=$dbName",  $dbusername, $dbpassword);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["delete_user"])) {
        
        $id = $_POST["delete_user"];
        $query = "DELETE  FROM users WHERE uid=? ";
        $delete = $connection->prepare($query);
        $delete->execute([$id]);
        header("Location:users.php?user=User has being deleted");
        exit;
    }

} catch(PDOException $exception) {
    $errorMsg = $exception->getMessage();
    echo $errorMsg;

}
