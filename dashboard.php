<?php
session_start();
define(admin,  $_SESSION["user"]) ;
if(isset(!session_is_registered("admin"))) {
    header("Location:login.php");
}  else {
    header('Content-Type:text/html,charset=utf-8');
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link real="stylesheet" href="css/dashboard.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>
    <div class="col-lg-6 col-sm-12 col-xs-12">
        <div class="row">
            <nav class="menu col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <p><b>Welcome <?php echo admin ?></b></p>
                <a class="btn btn-danger" role="button" href=" includes/ logout.php">Logout</a>
            </nav>

            </div>
        </div>
    </div>
    
</body>
</html>
