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

    <title>Cart</title>
</head>
<body>
<?php require_once 'includes/navigation.php' ?>
<h2>Your cart</h2>
<p><h4>Here you can see your cart and proceed to payment when you're
    done</h4></p>
<?php
$cart = $_SESSION['cart'];


if (count($cart) > 0) {
  ?>
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

        foreach ($cart as $cart_item) {

          $prod_categs_query = "select name, price, category from products where products.product_id=" . $cart_item['id'];
          $product = $mysql->query($prod_categs_query)->fetch_assoc();


          $prod_categs_query = "select pt_category_name from pt_category where pt_category.pt_category_id = " . $product['category'];
          $prod_category = $mysql->query($prod_categs_query)->fetch_array();

          echo "<tr>";
          echo "<th scope='row'>" . $cart_item['id'] ."</th>";
          echo "<td>" . $product['name'] . "</td>";
          echo "<td>" . $product['price'] . "€</td>";
          echo "<td>" . $prod_category[0] . "</td>";
          echo "<td>" . $cart_item['quantity'] ."</td>";
          echo "</tr>";
        }

        ?>
        </tbody>
    </table>
  <?php

}
else {
  echo '<div class="alert alert-danger">You have not added any products to your cart yet!</div>';

}

?>
<div class="text-center">
    <button type="button" class="btn btn-outline-primary btn-lg"><a
                href="https://stripe-payments-demo.appspot.com">Pay with
            card</a></button>
    <button type="button" class="btn btn-outline-secondary btn-lg"><a
                href="https://www.paypal.com/uk/home">Pay with Paypal</a>
    </button>
    <button type="button" class="btn btn-outline-warning btn-lg"><a
                href="https://stripe-payments-demo.appspot.com">Pay with
            cash</a></button>
    <p>When you click on a button, your order is submitted and you redirect to
        the payment way</p>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
</body>
</html>
