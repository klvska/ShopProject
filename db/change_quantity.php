<?php
require "connect.php";
session_start();

if (isset($_GET['id']) && isset($_GET['action'])) {
  $id = $_GET['id'];
  $action = $_GET['action'];

  if (isset($_SESSION['cart_items'][$id])) {
    $item = $_SESSION['cart_items'][$id];

    // Zwiększanie ilości produktów o 1
    if ($action == 'plus') {
      $item['quantity']++;
      $sql ="UPDATE items SET item_quantity = item_quantity - 1 WHERE item_id = $id";
      if ($connection->query($sql) === TRUE) {
        echo "dziala";
      } else {
        echo "nie dziala: " . $sql . "<br>" . $connection->error;
      }
    }

    // Zmniejszanie ilości produktów o 1, zablokowanie możliwości usuwania gdy ilość = 1
    if ($action == 'minus') {
      if ($item['quantity'] == 1|| !is_numeric($item['quantity'])) {
        unset($_SESSION['cart_items'][$id]);
      }else{
      $item['quantity']--;
      $sql ="UPDATE items SET item_quantity = item_quantity + 1 WHERE item_id = $id";
      if ($connection->query($sql) === TRUE) {
        echo "dziala";
      } else {
        echo "kurwa nie dziala: " . $sql . "<br>" . $connection->error;
      }
    }
  }

    // Aktualizowanie koszyka w sesji
    $_SESSION['cart_items'][$id] = $item;
  }
}

header('Location: cart.php');
exit;
?>
