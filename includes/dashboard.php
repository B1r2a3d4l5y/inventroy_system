<?php
session_start();
require "database.php";
if(isset($_SESSION['user'])) {
    header("dashboaed.php");

}






?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link real="stylesheet" href="css/dashboard.css">
    

    <title>Dashboard</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="menu col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <a class="logo  nav navbar-brand">Inventroy system</a>
                <p class="welcome">Welcome: <?php echo $_SESSION["user"]?></p>

                <a class=" logout btn btn-danger" role="button" href=" includes/ logout.php" role="button">Logout</a>
            </nav>
            

            </div>
        </div>
    </div>
    
</body>
</html>
