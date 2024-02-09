<!DOCTYPE html>
<html>
<head>
  <title>Panel administratora</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Panel administratora</h2>
  <h3>Dodaj nowy produkt</h3>
  <form method="post" action="admin.php">
    <div class="form-group">
      <label for="item_name">Nazwa produktu:</label>
      <input type="text" class="form-control" id="item_name" name="item_name">
    </div>
    <div class="form-group">
      <label for="item_price">Cena:</label>
      <input type="text" class="form-control" id="item_price" name="item_price">
    </div>
    <div class="form-group">
      <label for="item_alt">Opis:</label>
      <textarea class="form-control" id="item_alt" name="item_alt"></textarea>
    </div>
    <div class="form-group">
      <label for="item_category">Kategoria:</label>
      <input type="text" class="form-control" id="item_category" name="item_category">
    </div>
    <div class="form-group">
      <label for="item_url">URL zdjęcia:</label>
      <input type="text" class="form-control" id="item_url" name="item_url">
    </div>
    <button type="submit" class="btn btn-primary">Dodaj produkt</button>
  </form>

  <hr>

  <h3>Zarządzaj produktami</h3>
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nazwa</th>
        <th>Cena</th>
        <th>Opis</th>
        <th>Kategoria</th>
        <th>Akcje</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require '../connect.php';
      $select = "SELECT * FROM items";
      $result = $connection->query($select);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row['item_id'] . "</td>";
          echo "<td>" . $row['item_name'] . "</td>";
          echo "<td>" . $row['item_price'] . "</td>";
          echo "<td>" . $row['item_alt'] . "</td>";
          echo "<td>" . $row['item_category'] . "</td>";
          echo "<td>";
          echo "<a href='edit.php?id=" . $row['item_id'] . "' class='btn btn-primary'>Edytuj</a>";
          echo "<a href='delete.php?id=" . $row['item_id'] . "' class='btn btn-danger ml-2'>Usuń</a>";
          echo "</td>";
          echo "</tr>";
          }
          } else {
          echo "<tr><td colspan='6'>Brak produktów w bazie danych</td></tr>";
          }
          $connection->close();
          ?>
          </tbody>
          
            </table>
