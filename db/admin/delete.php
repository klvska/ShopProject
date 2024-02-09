<?php
require '../connect.php';

$item_id = $_GET['id'];

$delete = "DELETE FROM items WHERE item_id='$item_id'";

if ($connection->query($delete) === TRUE) {
  echo "Produkt został usunięty";
} else {
  echo "Błąd: " . $delete . "<br>" . $connection->error;
}

$connection->close();
?>
