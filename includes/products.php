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
    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="row">
            <form class="form col-lg-6 col-md-6 col-sm-12 col-xs-12" action="insert_product.php" method="POST">
                <label for="product_name" class="product-name"> Enter Product name
                    <input type="text" class="product" name="product_name">
                </label>
                <label for="quanity_sold" > Enter quanity amount
                    <input type="number" min="1" max="100"  class="quanity" name="quanity" >
                </label>
                <label for="price" >$
                    <input type="text" class="price" name="productprice"  placeholder="Enter price">
                </label>


            </form>
        </div>
    </div>
    
</body>
</html>