<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Login page</title>
</head>

<body>
    <div class=" container  ">
        <div class="row">
            <form class="form col-lg-6 col-md-6 col-sm-12 col-xs-12" action="includes/log_user.php" method="POST">
                <div class="form_group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h1>Login Admin</h1>


                    <label for="username">
                        <input type="text" class="user" name="user" autocomplete="current_user" placeholder="Username">
                    </label>

                    <label for="password">
                        <input type="password" class="password" name="password" id="password" autocomplete="current-password" placeholder="Password ">
                        <span class="eye-icon" id="toggle_password"><i class=" bi bi-eye "></i></span>
                        <button type="submit" class="login btn btn-success btn-mt-4" name="login">Login</button>
                </div>
        </div>


        </form>
    </div>
    </div>


</body>

<script src="JS/show_hide_password.js"></script>

</html>