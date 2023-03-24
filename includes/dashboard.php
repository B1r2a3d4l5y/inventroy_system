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



 
 
 .logout{
    display:inline-block;
    margin-bottom : 13px;
 }
 .highest_selling {

    display:inline-block;
    margin-top: 50px;
    right :20px;
    width: 100%;
    text-align : center;

    
 }
 .table-header {
    display: inline-block;
    font-size : 35px;
    margin-right : 900px;


 }
 
 
 .sales {
    display: inline-block; 
     
    margin-left : 500px;
    margin-top : -400px;
    margin-right : 60px;
    width : 100%;
    text-align : center;
    white-space: pre-wrap;
 }
 .sales-header {
    display:inline-block;
    margin-top : 150px;
    margin-right : 1200px;
    font-size : 35px;
    white-space : nowrap;
    text-indent : 30px;
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
                 <a class="logout btn btn-danger btn-md " href="logout.php">Logout </a>
            </nav>
            

            </div>
             
                   

          
             <table class=" highest_selling table table-bordered  table-light ">

                   <caption class="table-header">Highest selling products<caption>
                
                <thead>
                 
                   
                    <tr>
                        

                        
                            <th >Title</th>
                            <th >Total Sold</th>
                            <th >Total Quanity</th>   

                    </tr>
                </thead>
                <tbody>
                    <?php
                    mysqli_report( MYSQLI_REPORT_STRICT);
                    ini_set('memory_limit', -1);
                    $serverHost = "localhost";
                    $Username = "root";
                    $dbPassword = "";
                    $dbName = "products";
                    $conn =  new mysqli($serverHost, $Username, $dbPassword, $dbName);

                    $conn->query("DROP TABLE  IF EXISTS highest_selling; ");
 
                    $conn->query("CREATE TABLE IF NOT EXISTS highest_selling(
                        title VARCHAR(30) NOT NULL,
                        total_sold INTEGER NOT NULL,
                        total_quanity INTEGER NOT NULL
                        
                    );");
                  $conn->query("INSERT INTO  highest_selling(title, total_sold, total_quanity) VALUES('buble wrap', 2, 3)");
                  $conn->query("INSERT INTO highest_selling(title, total_sold, total_quanity) VALUES('USB cable', 3, 2 )");
                  $conn->query("INSERT INTO highest_selling(title, total_sold, total_quanity) VALUES('Lord Of the Rings board game', 3, 1) ");

                    $stmt = $conn->prepare ("SELECT  *  FROM  highest_selling");
                    
                    $stmt->execute();
                    $result = $stmt->get_result();
                    
                    while($row = ) {
                        echo "<tr>";
                        echo "<td> $row[title] </td>";
                        echo "<td> $row[total_sold] </td>";
                        echo "<td> $row[total_quanity] </td>"; 
                        echo "</tr>";
                    }
                  
                    ?>
                </tbody>
            </table>

            <table class="sales  table table-bordered  table-light ">
                <caption>Latest Sales</caption>
                <thead>
                    <tr>
                        <th>Product Name </th>
                        <th>Date</th>
                        <th>Total Sales</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     mysqli_report( MYSQLI_REPORT_STRICT);
                      ini_set('memory_limit', -1);
                     
                     
                    
                    $serverHost = "localhost";
                    $Username = "root";
                    $dbPassword = "";
                    $dbName = "products";
                    $conn =  new mysqli($serverHost, $Username, $dbPassword, $dbName);
                    $conn->query("DROP TABLE IF EXISTS  latest_sales");
                    $conn->query("CREATE TABLE IF NOT EXISTS latest_sales(
                        product_name VARCHAR(30) NOT NULL,
                        date DATE NOT NULL,
                        total_sales FLOAT(25) NOT NULL
                    )");
                    $conn->query("INSERT INTO  latest_sales(product_name, date , total_sales) VALUES('USB extension 3.0 cable', '2023-03-05', 270.07)");
                    $conn->query("INSERT INTO latest_sales(product_name , date , total_sales)VALUES('Desk Organiser', '2023-06-10', 150.10)");
                    $conn->query("INSERT INTO latest_sales(product_name, date, total_sales)VALUES('1TB hardrive', '2023-06-11', 160.20)");
                    $conn->query("INSERT INTO latest_sales(product_name, date, total_sales) VALUES('MACOS laptop', '2023-06-20', 205.7)");
                    $stmt->prepare("SELECT * FROM  latest_sales  ");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    
                    foreach($result as $row) {
                        echo "<tr>";
                      echo "<td> $row[title] </td>";
                      echo "<td> $row[date] </td>";
                      echo "<td> $row[total_sales] </td>";
                      echo "</tr>";
                    }


                    ?>
                </tbody>
                  


            
                
            </table>
        </div>
    </div>
    
</body>
</html>
