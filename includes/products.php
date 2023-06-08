<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/products.css">


    <title>Products page </title>

</head>

<body>
    <div class="container">
        <div class="row">
            <form class="form col-lg-6 col-md-6 col-sm-12 col-xs-12" action="insert_product.php" method="POST">

                <label for="product_name" class="product-name"> Enter Product name
                    <input type="text" class="product" name="product_name">
                </label>

                <label for="quanity_sold"> Enter quanity amount
                    <input type="number" min="1" max="100" class="quanity" name="quanity">
                </label>
                <label for="price" class="price-label"> Enter price
                    <input type="number" class="price" step="1.2" name="productprice">
                </label>
                <button type="submit" class="add btn btn-success btn-md" name="add">Add</button>

                <table class="products-table  table    table-light  table-lg">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quanity</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $serverHost = "localhost";
                        $dbName = "products";
                        $username = "root";
                        $password = "";

                        try {
                            $db = new PDO("mysql:host=$serverHost; dbname=$dbName", $username, $password);
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                            $statement =  "SELECT * FROM products";
                            $result = $db->prepare($statement);
                            $result->execute();



                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";


                                echo " <td> $row[product_name]</td>";
                                echo " <td>$row[quanity]</td>";
                                echo " <td>$row[price]</td>";
                                echo "<td><a class='edit btn btn-primary' href='../edit.php?id=$row[id]'  >Edit</a></td>";

                                echo "<td>
                            <form class='delete_form col-lg-6 col-md-6 col-sm-12' action='delete_product.php' method='POST'>
                            <button type='submit' class='delete btn btn-danger' name='deletebtn' value='$row[id]' >Delete</button>
                            </form>
                            </td>";

                                echo "</tr>";
                            }
                        } catch (PDOException $exception) {
                            $message =  $exception->getMessage();
                            echo $message;
                        }





                        ?>
                    </tbody>
                </table>


            </form>
        </div>
    </div>

</body>

</html>