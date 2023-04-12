<?php
$serverHost = "localhost";
$dbname = "login";
$dbusername = "root";
$dbpassword = "";

 try {
              $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $dbusername, $dbpassword);
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              echo "connection successful";
        } catch(PDOEception $exception)  {
            echo "connnection failed:".$exception->getMessage();
        }
