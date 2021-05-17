<?php
require_once 'includes/session.php';
require_once 'includes/checkIfAdmin.php';
require_once 'includes/db-config.php';
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0"
          crossorigin="anonymous">

    <title>Wine products</title>
</head>
<body>
<?php require_once 'includes/navigation.php';?>
<h1>All products</h1>
<p><h4>Here you can select which products you want to purchase</h4></p>
<div class="alert alert-success" id="success-alert">
    <strong>Success!</strong>
    Product is added to your cart.
</div>
<table class="table table-hover" id="products-table">
    <thead>
    <tr>
        <th scope="col">Product ID</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Add to cart</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "select * from products";
    $products = $mysql->query($query);

    foreach ($products as $row) {
      $prod_categs_query = "select pt_category_name from pt_category where pt_category.pt_category_id = " . $row['category'];
      $prod_category = $mysql->query($prod_categs_query)->fetch_array();
      $product_id = $row['product_id'];
      echo "<tr>" . PHP_EOL;
      echo "<th scope='row'>$product_id</th>" . PHP_EOL;
      echo "<td>" . $row['name'] . "</td>" . PHP_EOL;
      echo "<td>" . $row['price'] . "€</td>" . PHP_EOL;
      echo "<td>" . $prod_category[0] . "</td>" . PHP_EOL;
      echo "<td><button type='button' class='btn btn-info' id='button-add-cart' data-prod-id='$product_id'><a href='#'>Add to cart</a></button> </td>" . PHP_EOL;
      echo "</tr>" . PHP_EOL;
    }

    ?>
    </tbody>
</table>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/products.js"></script>
</body>
</html>
