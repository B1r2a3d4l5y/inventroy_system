<?php
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    

    <title>Dashboard</title>
    <style>
        :before::after {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.logo {
    display: inline-block;
    color: red;
    font-size: 50px;
    font-weight: bold;
    margin-left : -105px;
    
}
.welcome {
    display:inline-block;
    font-size : 30px;
    margin-top: 17px;
    margin-left :50px;
}
.logout {
    display: inline-block;
     margin: 20px;
     margin-left : 200px;

}
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <ul class="menu nav">
                <li class="logo"><a class=" logo  nav  navbar-brand"><a>Inventroy system</li>
                <li class="welcome"><p class="welcome ">Welcome: <?php echo $_SESSION['user']?></p></li>
                <li class="logout"><a class="logout btn btn-danger btn-md" href="includes/logout.php" role="button">Logout</a><li>
            </ul>
            

            </div>
        </div>
    </div>
    
</body>
</html>
