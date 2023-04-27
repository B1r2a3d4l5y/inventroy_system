<?php
if(isset($_SESSION["user"])) {
    header("Location:dashboard.php");
    exit;
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
 .dashboard {
    text-decoration : none;
 }
 .products {
    text-decoration: none ;

 }
 .users {
    text-decoration: none;
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
    white-space : nowrap;


 }
 
 
 .sales {
    display: inline-block; 
    margin-left : 500px;
    margin-top : -253px;
    margin-right : 60px;
    width : 100%;
    text-align : center;
    white-space : nowrap;
 }
 .sales-header {
    display:inline-block;
    margin-top : -200px;
    margin-right : 1200px;
    font-size : 35px;
    white-space : nowrap;
    text-align : center ;
    text-indent : 30px;
 }
 .daily_sales {
    display : inline-block ;
    margin-top : 100px;
 }
 .daily {
    display: inline-block;
    margin-top : -200px;
    margin-left : 45px;
    text-align : center;
    text-indent : 20px;
    font-size : 35px;
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
                <a class="dashboard" href="dashboard.php">Dashboard</a>
                <a class="products" href="products.php" >Products</a>
                <a class="users" href="users.php">Users</a>
                 <a class="logout btn btn-danger btn-md " href="logout.php">Logout </a>
            </nav>
            

            </div>
             
                   

          
             <table class=" highest_selling  table table-bordered  table-light ">

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
                    
                    foreach($result as  $row  ) {
                        echo "<tr>";
                        echo "<td> $row[title] </td>";
                        echo "<td> $row[total_sold] </td>";
                        echo "<td> $row[total_quanity] </td>"; 
                        echo "</tr>";
                    }
                  
                    ?>
                </tbody>
            </table>

            <table class="sales  table  table-bordered  table-light ">
                <caption class="sales-header">Latest Sales</caption>
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
                    $stmt = $conn->prepare("SELECT * FROM  latest_sales  ");
                    $stmt->execute();
                    $result = $stmt->get_result();

                   foreach($result  as $row) {
                    echo "<tr>";
                    echo "<td> $row[product_name] </td>";
                    echo "<td> $row[date] </td>";
                    echo "<td> $row[total_sales] </td>";

                        
                    }


                    ?>
                </tbody>
                  

 
            
                
            </table>
            <table class="daily_sales table table-bordered table-light">
                <caption class="daily">Daily Sales</caption>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Product Name</th>
                        <th>Quanity Sold</th>
                        <th>Date</th>
                        <th>Total</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                      $serverHost = "localhost";
                    $Username = "root";
                    $dbPassword = "";
                    $dbName = "products";
                    $conn =  new mysqli($serverHost, $Username, $dbPassword, $dbName);
                    $conn->query("DROP TABLE IF EXISTS daily_sales");
                    $conn->query("CREATE TABLE IF NOT EXISTS daily_sales(
                        id INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
                        product_name VARCHAR(30),
                        quanity_sold INTEGER NOT NULL,
                        date DATE NOT NULL,
                        total FLOAT(30)
                    )");
                    $conn->query("INSERT INTO daily_sales(product_name, quanity_sold , date, total) VALUES('Demo product', 3 , '2023-05-15', 1000.90 )");
                    $conn->query("INSERT INTO daily_sales(product_name, quanity_sold, date, total ) VALUES('wheat ',  4 , '2023-05-16' , 16.01)");
                    $conn->query("INSERT INTO  daily_sales(product_name, quanity_sold, date , total) VALUES('weet-bix cearal' , 5, '2023-05-16', 200.05) ");
                    $conn->query("INSERT INTO daily_sales(product_name, quanity_sold, date, total) VALUES('portable bluetooth speaker', 6, '2023-05-17', 300.05)");
                    $conn->query("INSERT INTO daily_sales(product_name, quanity_sold, date, total) VALUES('Future Life ceareal x3', 4, '2023-05-18', 108.50)");
                    $conn->query("INSERT INTO  daily_sales(product_name, quanity_sold, date, total) VALUES('portable XWS saw', 3, '2023-05-19', 150.00)");
                    $conn->query("INSERT INTO  daily_sales(product_name, quanity_sold, date, total)VALUES('Hasbro Toystory board game toys', 2 , '2023-05-19 ', 50.00)");
                    $conn->query("INSERT INTO daily_sales(product_name, quanity_sold, date, total) VALUES('Hasbro Marvel Legends game toys', 3, '2023-05-20', 45.05)");
                    $conn->query("INSERT INTO daily_sales(product_name, quanity_sold, date, total) VALUES('gardening tools', 2 , '2023-05-21', 25.01 )");
                    $conn->query("INSERT INTO  daily_sales(product_name, quanity_sold, date, total) VALUES('buble-wrap', 5 , '2023-05-22', 100.05)");
                    $stmt = $conn->prepare("SELECT * FROM daily_sales");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    foreach($result as $row) {

                        echo "<tr>";
                        echo "<td> $row[id] </td>";
                        echo "<td> $row[product_name] </td>";
                        echo "<td> $row[quanity_sold] </td>";
                        echo "<td> $row[date] </td>";
                        echo "<td> $row[total] </td>";
                        echo "</tr>";
                    }
                    


                    ?>
                </tbody>

            </table>
        </div>
    </div>
    
</body>
</html>
