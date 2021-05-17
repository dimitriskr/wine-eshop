<?php
require_once 'includes/session.php';
require_once 'includes/db-config.php';
require_once 'includes/checkIfAdmin.php' ?>
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

  <title>Hello, world!</title>
</head>
<body>
<?php require_once 'includes/navigation.php' ?>
<h2>Your cart</h2>
<p><h4>Here you can see your cart and proceed to payment when you're done</h4></p>
<table class="table table-hover">
  <thead>
  <tr>
    <th scope="col">Product ID</th>
    <th scope="col">Name</th>
    <th scope="col">Price</th>
    <th scope="col">Category</th>
    <th scope="col">Quantity</th>
  </tr>
  </thead>
  <tbody>
  <?php
//  @todo $cart = $_SESSION['cart'];
  $cart = [1,7,4,12];

  foreach ($cart as $product_id) {

    $prod_categs_query = "select name, price, category from products where products.product_id=" .$product_id;
    $product = $mysql->query($prod_categs_query)->fetch_assoc();


    $prod_categs_query = "select pt_category_name from pt_category where pt_category.pt_category_id = " . $product['category'];
    $prod_category = $mysql->query($prod_categs_query)->fetch_array();

    echo "<tr>";
    echo "<th scope='row'>$product_id</th>";
    echo "<td>" . $product['name'] . "</td>";
    echo "<td>" . $product['price'] . "€</td>";
    echo "<td>" . $prod_category[0] ."</td>";
    echo "<td>1</td>";
    echo "</tr>";
  }

  ?>
  </tbody>
</table>

<!-- @todo button proceed to payment -->


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
</body>
</html>
