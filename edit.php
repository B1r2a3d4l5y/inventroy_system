<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <link rel="stylesheet" href="./CSS/edit.css">

    <title>Edit product</title>
</head>

<body>
    <form class="editForm col-lg-6 col-md-6 col-sm-12 col-xs-12" action="./includes/edit_product.php" method="POST">
        <label>
            <input type="hidden" name="id" id="id">
        </label>

        <label for="quanity"> Enter new quanity amount
            <input type="text" name="quanity" id="quanity">
        </label>
        <label for="product_price"> Enter new price
            <input type="number" step="1.2" max="100" name="productprice" id="product_price">
        </label>
        <button type="submit" class="update btn  btn-primary" name="update"   >Update</button>
    </form>

</body>


</html>