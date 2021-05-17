<?php
require_once 'includes/session.php';

$product_id = $_POST['product_id'] ?? NULL;

if ($product_id !== NULL) {
  if (isset($_SESSION['cart'][$product_id])) {
    if (isset($_SESSION['cart'][$product_id]['quantity'])) {
      $quantity = $_SESSION['cart'][$product_id]['quantity'];
    }
    else {
      $quantity = 1;
    }
    unset($_SESSION['cart'][$product_id]);
    $_SESSION['cart'][$product_id] = [
      'id' => $product_id,
      'quantity' => $quantity + 1
    ];
  }
  else {
    $_SESSION['cart'][$product_id] = [
      'id' => $product_id,
      'quantity' => 1
    ];
  }
}

