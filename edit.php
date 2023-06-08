<?php
try {
    $serverHost = "localhost";
    $dbname = "products";
    $username = "root";
    $password = "";


    $db = new PDO("mysql:host=$serverHost; dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // get id in url
    $id = $_GET["id"];

    $query = "SELECT * FROM products WHERE id=:id";

    $statement = $db->prepare($query);

    $statement->execute([":id" => $id]);

} catch (PDOException $error) {
    $errrorMessage = $error->getMessage();
    echo $errrorMessage;
}
?>

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
            <form class="editForm col-lg-6 col-md-6 col-sm-12 col-xs-12 " name="edit" action="./includes/edit_product.php" method="POST">
                <label for="quanity"> Enter new quanity
                    <input type="text" name="quanity" id="quanity">

                </label>
                <label for="price"> Enter new price
                    <input type="number" step="1.2" name="product-price" id="price">


                </label>
                <label for="id">
                    <input type="hidden" name="id" id="id">

                </label>
                <button type="submit" class="update btn btn-primary" name="update">Update</button>
            </form>

        </div>

    </div>

</body>

</html>