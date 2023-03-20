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
    <link rel="stylesheet" href="CSS/dashbord.css">
    <style>
        ::before::after {
    margin 0;
    padding: 0;
}

 .logo-box {
     background-color: black;
     width: 100%;
     border: none;
     border-radius: 5px;




 }

 .logo {
     display: inline-block;
     color: red;
     font-size: 70px;
     font-weight: bold;

 }

 .logo:hover {
     color: red
 }

 .menu {
     background-color: blue;
     width: 100%;

 }



 .admin {
    font-size: 35px;
    font-weight:bold;
 }

    </style>

    <title>Dashboard</title>
      
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo-box col-lg-6 col-md-6 colsm-12">
                <a class="logo nav navbar-brand">Inventroy System </a>
            </div>
            <nav class="menu nav navbar">
                <a class="dashboard" href="includes/dashbord.php">Dashboard</a>
                <a class="products" href="products.php" >Products</a>
                <a class="users" href="users.php">Users</a>
                      <p class="admin"><?php echo $_SESSION['user']?></p>
                 <a class="logout btn btn-danger btn-md " href="includes/logout.php">Logout </a>
          
            </nav>
            

            </div>
          
             <table class="table highest_selling">
                <thead>
                    <tr>
                        <th>Highest selling products</th>


                            <td >Title</td>
                            <td >Total Sold</td>
                            <td >Total Quanity</td>   

                    </tr>
                </thead>
                <tbody>
                    <?php
                    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
                    ini_set('memory_limit', -1);
                    $serverHost = "localhost";
                    $Username = "root";
                    $dbPassword = "";
                    $dbName = "products";
                    $conn =  new mysqli($serverHost, $Username, $dbPassword, $dbName);
                    $conn->query("DROP TABLE IF EXISTS  highest_selling;");
                    $conn->query("CREATE TABLE highest_selling(
                        title VARCHAR(30) NOT NULL,
                        total_sold INTEGER NOT NULL,
                        total_quanity INTEGER NOT NULL
                        
                    );");
                  $conn->query("INSERT INTO  highest_selling(title, total_sold, total_quanity) VALUES('buble wrap', 2, 3)");
                  $conn->query("INSERT INTO highest_selling(title, total_sold, total_quanity) VALUES('USB cable', 3, 2 )");
                  $conn->query("INSERT INTO highest_selling(title, total_sold, total_quanity) VALUES('Lord Of the Rings board game', 3, 1) ");

                    $stmt = $conn->prepare ("SELECT * FROM highest_selling LIMIT 5");
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_array();
                    while($row){
                        echo "<tr>";
                        echo "<td>. $row[title] . </td> ";
                        echo "<td>.$row[total_sold] . </td> ";
                        echo "<td>.  $row[total_quanity]. </td> ";
                        echo "</tr>";
                    }


                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>
