<?php
require '../connect.php';
?>
<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Edytuj produkt</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $item_name = $_POST["item_name"];
      $item_price = $_POST["item_price"];
      $item_alt = $_POST["item_alt"];
      $item_category = $_POST["item_category"];
      $item_url = $_POST["item_url"];
      $item_id = $_POST["item_id"];
$update = "UPDATE items SET item_name='$item_name', item_price='$item_price', item_alt='$item_alt', item_category='$item_category', item_url='$item_url' WHERE item_id='$item_id'";

if ($connection->query($update) === TRUE) {
  echo "<div class='alert alert-success' role='alert'>Produkt został zaktualizowany</div>";
} else {
  echo "<div class='alert alert-danger' role='alert'>Błąd: " . $update . "<br>" . $conn->error . "</div>";
}

$connection->close();
} else {
$item_id = $_GET['id'];

$select = "SELECT * FROM items WHERE item_id='$item_id'";
$result = $connection->query($select);

if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  $item_name = $row['item_name'];
  $item_price = $row['item_price'];
  $item_alt = $row['item_alt'];
  $item_category = $row['item_category'];
  $item_url = $row['item_url'];
} else {
  echo "<div class='alert alert-danger' role='alert'>Nie znaleziono produktu o takim id</div>";
  exit();
}
}
?>
<h3>Edytuj produkt</h3>
<form method="post" action="">
<input type="hitem_idden" name="item_id" value="<?php echo $item_id; ?>">
<div class="form-group">
  <label for="item_name">Nazwa produktu:</label>
  <input type="text" class="form-control" item_id="item_name" name="item_name" value="<?php echo $item_name; ?>">
</div>
<div class="form-group">
  <label for="item_price">Cena:</label>
  <input type="text" class="form-control" item_id="item_price" name="item_price" value="<?php echo $item_price; ?>">
</div>
<div class="form-group">
  <label for="item_alt">Opis:</label>
  <textarea class="form-control" item_id="item_alt" name="item_alt"><?php echo $item_alt; ?></textarea>
</div>
<div class="form-group">
  <label for="item_category">Kategoria:</label>
  <input type="text" class="form-control" item_id="item_category" name="item_category" value="<?php echo $item_category; ?>">
</div>
<div class="form-group">
  <label for="item_url">URL zdjęcia:</label>
  <input type="text" class="form-control" item_id="item_url" name="item_url" value ="<?php echo $item_url; ?>">

</div>
<form action="edit.php" method="post">
<input type="submit" name="submit" class="btn btn-primary" value="Zapisz zmiany"></input>
</form>
<?php
  if(isset($_POST["submit"])){
    header('Location: admin.php');
  }
?>
</form>
