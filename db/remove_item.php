<?php
session_start();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  if (isset($_SESSION['cart_items'][$id])) {
    unset($_SESSION['cart_items'][$id]);
  }
}


header('Location: cart.php');
exit;
?>
