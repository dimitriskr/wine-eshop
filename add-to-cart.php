<?php
require_once 'includes/session.php';

$product_id = $_POST['product_id'] ?? NULL;

if ($product_id !== NULL) {
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  }

  $_SESSION['cart'][] = $product_id;
}

