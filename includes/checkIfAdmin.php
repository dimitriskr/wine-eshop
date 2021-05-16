<?php
require_once 'config.php';

if (isset($_SESSION) && isset($_SESSION['loggedin']) && $_SESSION['loggedin'] && $_SESSION['username'] && $_SESSION['id']) {
  $user_id = $_SESSION['id'];
  if ($stmt = $mysql->prepare('SELECT is_admin FROM users WHERE user_id = ?')) {
    $stmt->bind_param("s", $user_id);
    if ($stmt->execute()) {
      $stmt->store_result();
      if ($stmt->num_rows === 1) {
        $stmt->bind_result($is_admin);
        if ($stmt->fetch()) {
          $_SESSION['is_admin'] = $is_admin;
        }
      }

    }
  }
}
