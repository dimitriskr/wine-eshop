<?php
require_once 'includes/session.php';
require_once 'includes/db-config.php';

$user_id = $_SESSION['id'];
$status = 'submitted';
$products = $_SESSION['cart'];
$order_id = random_int(0, 1000);

foreach ($products as $product) {
  $prod_id = $product['id'];
  $quantity = $product['quantity'];
  $query = "INSERT INTO db.orders (order_id, user_id, status, products, quantity)
VALUES ($order_id, $user_id, $status, $prod_id, $quantity);";
  $mysql->query($query);

}

$_SESSION['cart'] = [];
