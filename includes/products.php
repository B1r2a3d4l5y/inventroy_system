<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" href="../CSS/products.css">


    <title>Products page </title>
</head>
<body>
    <div class="container">
        <div class="row">
            <form class="form col-lg-6 col-md-6 col-sm-12 col-xs-12" action="insert_product.php" method="POST">
                <label for="id">
                    <input typ="hidden" class="id" name="id">

                </label>

                <label for="product_name" class="product-name"> Enter Product name
                    <input type="text" class="product" name="product_name">
                </label>
                <label for="quanity_sold" > Enter quanity amount
                    <input type="number" min="1" max="100"  class="quanity" name="quanity" >
                </label>
                <label for="price" class="price-label" > Enter price
                    <input type="number"  class="price" step="1.5" name="productprice" onchange=>
                </label>
                <button type="submit" class="add btn btn-success btn-md" name="add">Add</button>

                <table class="products-table  table  table-light ">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quanity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serverHost = "localhost";
                        $dbName = "products";
                        $username = "root";
                        $password = "";

                        $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);

                        $stmt = ("SELECT * FROM products");
                        $result = $db->prepare($stmt);
                        $result->execute();
                        
                    

                        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>  $row[product_name] <td>";
                            echo "<td>  $row[quanity] </td>";
                            echo "<td>  $row[price] </td>";
                            echo "<td><a class='delete btn  btn-danger' role='button' href='delete_product.php?delete&id=$row[id]' name='deletebtn'>Delete</a></td>";
                            echo "</tr>";

                        }


                        
                        ?>
                    </tbody>
                </table>


            </form>
        </div>
    </div>
    
</body>
</html>