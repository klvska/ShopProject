<form method="post" action="admin.php">
  Nazwa produktu: <input type="text" name="item_name"><br>
  Cena: <input type="text" name="item_price"><br>
  Opis: <textarea name="item_alt"></textarea><br>
  Kategoria: <input type="text" name="category"><br>
  URl zdjęcia: <input type="text" name="item_url"><br>
  <input type="submit" value="Dodaj produkt">
</form>

<?php

require 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $item_name = $_POST["item_name"];
  $item_price = $_POST["item_price"];
  $item_alt = $_POST["item_alt"];
  $category = $_POST["category"];
  $item_url = $_POST["item_url"];

  $insert = "INSERT INTO items (item_name, item_url, item_price, item_alt, item_category)
  VALUES ('$item_name', '$item_url', '$item_price', '$item_alt', $category)";

  if ($connection->query($insert) === TRUE) {
    echo "Produkt został dodany do bazy danych";
  } else {
    echo "Błąd: " . $insert . "<br>" . $conn->error;
  }
}
?>