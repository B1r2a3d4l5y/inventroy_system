<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <title>Users</title>
    <style>
        * {
            margin:0;
            padding: 0;
            box-sizing: border-box;
        }
        .add_user {
            display:inline-block;
            position: relative;
            left: 100px;
            bottom: -15px;
        }
        .users-table {
            display:inline-block;
            position: relative;
            top: 70px;
            left: 50px;
            width: 1000%;
            height: auto;


        }
        
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
             <form class="insert_form col-lg-6 col-md-6 col-sm-12 col-xs-12" action="insert_user.php" method="POST" >
               <label for="username"> 
                <input type="text" class="username" name="username" placeholder="Enter username">
               </lablel>
               <label for="password">
                <input type="password"class="userpassword" name="userpassword" placeholder="Enter user password">

               </label> 

               <button class="add_user btn btn-success" name="add_user">Add new user</button>


               <table class="users-table table table-light ">
                <thead>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Action</th>

                </thead>
                <tbody>
                    <?php
                    $serverHost = "localhost";
                    $dbName = "login";
                    $dbUsername ="root";
                    $dbPassword = "";

                    try {
                         $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $dbUsername, $dbPassword);
                         $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                          $sql = "SELECT * FROM users ";
                          $statement = $db->prepare($sql);
                          $statement->execute();

                          while($row = $statement->fetch(PDO::FETCH_ASSOC) ){
                            echo "<tr>";
                            echo "<td> $row[username]</td>";
                            echo "<td> $row[password]</td>";
                            echo "<td><form class='delete_user' action='delete_user.php' method='POST'>
                            <button type='submit' class='delete_user_btn btn btn-danger' name='delete_user' value='$row[uid]'>Delete</button>
                            </form></td>";

                          }




 
                    } catch(PDOException $error) {
                        $errMessage = $error->getMessage();
                        echo $errMessage;

                    }


                    ?>
                </tbody>

               </table>

            </form>

        </div>
           

    </div>
    
</body>
</html>