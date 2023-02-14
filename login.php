<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css">


    <title>Login page</title>
</head>
<body>
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <form class="form col-lg-6 col-md-6 col-sm-12 col-xs-12" action="includes/insert_user.php">
                <div class="form_group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <h1>Login User</h1>
                    <label for="username">
                        <input type="text" class="user" name="user" placeholder="Username">
                    </label>
                  
                    <label for="password">
                        <input type="password" class="password" name="password" placeholder="Password" >
                       

                    </label>
                      <label for="remberMe">
                          <input type="checkbox" id="rember" name="rember" > Rember Me

                    </label>
                    <a  class="login btn btn-success" name="login" href="dashboard.php">Login</a>
                </div>

                </div>


                
              

            </form>
        </div>
    </div>
    
</body>
</html>