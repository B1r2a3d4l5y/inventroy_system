
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="./CSS/edit.css">
    <title>Edit page</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <form class="editForm col-lg-6 col-md-6 col-sm-12 col-xs-12" action="./includes/edit_product.php?id=$id" method="POST"                       " method="POST">
                <label for="quanity"> Enter new quanity
                    <input type="text" name="quanity" id="quanity"  >

                </label>
                <label for="price"> Enter new price
                    <input type="number" step="1.2" name="product_price" id="price" >">


                </label>
                <label for="id">
                    <input type="hidden"   name="id">
 
                </label>
                <button type="submit" class="update btn btn-primary" name="update">Update</button>
            </form>

        </div>

    </div>

</body>

</html>