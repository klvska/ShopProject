<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Anabolic Factory</title>
    <link rel="icon" type="image/gif" href="./img/icons/mario.gif">
</head>
<body>
<?php
          session_start();
          require_once "./db/connect.php";
?>

<nav class="navbar navbar-expand-lg sticky-top bg-white">
  <div class="container">
    <a class="navbar-brand" href="index.php">
        <img class="navbar-logo"src="./img/icons/logo.png" alt="Anabolic Factory">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav m-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#newest">
            Nowości
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            Dostawa i płatność
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            Kontakt
          </a>
        </li>
<?php
      if (isset($_SESSION["current_user"])){
          echo '<li class="nav-item">
          <a class="nav-link" href="./db/cart.php">
          <img class="cart-icon" src="./img/icons/cart.svg">
          </a>
        </li>
        <li class="nav-item">
           </li>';
}
        
?>
<?php

          if (isset($_SESSION["current_user"])){
            echo '<li class="nav-item text-center">
            Witaj '.$_SESSION["current_user"] . '<br>'. ' <small><a href="./db/logout.php">wyloguj</a></small>
          </li>';
         } else {
            echo '<li class="nav-item text-center">
            <a class="nav-link" href="./db/login_register.php">    
            <img class="login-icon" src="./img/icons/person-circle.svg">
            </a>
          </li>';
         }
         if (isset($_POST["add_to_cart"]) && isset($_SESSION["current_user"])) {
            $item_id = $_POST["item_id"];
            $item_name = $_POST["item_name"];
            $item_price = $_POST["item_price"];
            $item_quantity = $_POST["item_quantity"];
          
            // Dodaj przedmiot do koszyka
            if (!isset($_SESSION["cart_items"])) {
              $_SESSION["cart_items"] = array();
            }
          // Jeśli produkt jest juz w koszyku to zwiększ ilosc o podaną ilosc
            if (isset($_SESSION["cart_items"][$item_id])) {
              $_SESSION["cart_items"][$item_id]["quantity"] += $item_quantity;
            } else { //jezeli nie ma produktu to go dodaj
              $_SESSION["cart_items"][$item_id] = array(
                "id" => $item_id,
                "name" => $item_name,
                "price" => $item_price,
                "quantity" => $item_quantity
              );
            }
          
            header("Location: ./db/cart.php");
            exit;
          } else if(!isset($_SESSION["current_user"])){
            echo '<script>alert("Pamiętaj, że musisz być zalogowanym, żeby dodać jakiś produkt do koszyka")</script>';
          }
?>
      </ul>
    </div>
  </div>
</nav>

<section class="main">
    <div class="container py-5">
        <div class="row py-4">
            <div class="col-lg-5 pt-5 text-center">
                <h1 class="pt-5">Legalize Anabolic Steroids!</h1>
                <a href="https://windnoise.shop/products/legalize-anabolic-steroids-tee"><button class="anabolic-steroids mt-3">anabolic steroids</button></a>
            </div>
        </div>
    </div>
</section>
<!-- --------------------------- -->
<section class="options">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 m-auto">
        <div class="row text-center">
          <div class="col-lg-4">
              <a href="#whey"><img class="supp" src="./img/icons/whey.png" alt="białka"><br></a>
              <h6>BIAŁKO</h6>
          </div>
          <div class="col-lg-4">
              <a href="#creatine"><img class="supp" src="./img/icons/creatine.png" alt="białka"><br></a>
              <h6>KREATYNA</h6>
          </div>
          <div class="col-lg-4">
              <a href="#others"><img class="supp" src="./img/icons/others.png" alt="białka"><br></a>
              <h6>INNE</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- --------------------------- -->
<section class="promos">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 m-auto text-center">
        <h2 id="promos" class="responsive-font-example">Promki</h2>
      </div>
    </div>
    <div class="row">
    <?php
$promos_query = mysqli_query($connection, "SELECT * FROM items WHERE item_id <= 4");

while($result = mysqli_fetch_array($promos_query))
{
  $item_id = $result["item_id"];
  $item_name = $result["item_name"];
  $item_url = $result["item_url"];
  $item_price = $result["item_price"];
  $item_old_price = $result["item_old_price"];
  $item_alt = $result["item_alt"];

    echo "
    <div class=\"col-lg-3 text-center\">
    <div class=\"card border-0 bg-light mb-2\">
      <div class=\"card-body\">
        <img src=\"$item_url\" class=\"img-fluid\" alt=\"$item_alt\">
        <div class=\"cart\">
          <form method=\"post\">
            <button type=\"submit\" class=\"cart-btn\" name=\"add_to_cart\"><i class=\"bi bi-cart-plus\"></i></button>
            <input type=\"hidden\" name=\"item_name\" value=\"$item_name\">
            <input type=\"hidden\" name=\"item_price\" value=\"$item_price\">
            <input type=\"hidden\" name=\"item_id\" value=\"$item_id\">
            <input class=\"quantity\" type=\"number\" name=\"item_quantity\" min=\"1\" max=\"10\" value=\"1\">
          </form>
        </div>
      </div>
    </div>
    <h6>$item_name</h6>
    <p><s>$item_old_price</s>$item_price<br></p>
    </div>
  ";
}
?>
</div>
</section>
<!-- --------------------------- -->
<section class="newests">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 m-auto text-center">
        <h2 id="newest" class="responsive-font-example">Nowości</h2>
      </div>
    </div>
    <div class="row">
    <?php

$newests_query = mysqli_query($connection, "SELECT * FROM items WHERE item_id > 4 LIMIT 4");

while($result = mysqli_fetch_array($newests_query))
{
  $item_id = $result["item_id"];
  $item_name = $result["item_name"];
  $item_url = $result["item_url"];
  $item_price = $result["item_price"];
  $item_alt = $result["item_alt"];

    echo "
    <div class=\"col-lg-3 text-center\">
    <div class=\"card border-0 bg-light mb-2\">
      <div class=\"card-body\">
        <img src=\"$item_url\" class=\"img-fluid\" alt=\"$item_alt\">
        <div class=\"cart\">
          <form method=\"post\">
            <button type=\"submit\" class=\"cart-btn\" name=\"add_to_cart\"><i class=\"bi bi-cart-plus\"></i></button>
            <input type=\"hidden\" name=\"item_name\" value=\"$item_name\">
            <input type=\"hidden\" name=\"item_price\" value=\"$item_price\">
            <input type=\"hidden\" name=\"item_id\" value=\"$item_id\">
            <input class=\"quantity\" type=\"number\" name=\"item_quantity\" min=\"1\" max=\"10\" value=\"1\">
          </form>
        </div>
      </div>
    </div>
    <h6>$item_name</h6>
    <p>$item_price<br></p>
    <small style=\"color: purple;\">nowość!</small></p>
    </div>
    
  ";
}
?>
</div>
</section>
<!-- --------------------------- -->
<section class="whey">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 m-auto text-center">
        <h2 id="whey" class="responsive-font-example">Białko</h2>
      </div>
    </div>
    <div class="row">
    <?php

$whey_query = mysqli_query($connection, "SELECT * FROM items WHERE item_id > 8 LIMIT 4");

while($result = mysqli_fetch_array($whey_query))
{
  $item_id = $result["item_id"];
  $item_name = $result["item_name"];
  $item_url = $result["item_url"];
  $item_price = $result["item_price"];
  $item_alt = $result["item_alt"];

    echo "
    <div class=\"col-lg-3 text-center\">
    <div class=\"card border-0 bg-light mb-2\">
      <div class=\"card-body\">
        <img src=\"$item_url\" class=\"img-fluid\" alt=\"$item_alt\">
        <div class=\"cart\">
          <form method=\"post\">
            <button type=\"submit\" class=\"cart-btn\" name=\"add_to_cart\"><i class=\"bi bi-cart-plus\"></i></button>
            <input type=\"hidden\" name=\"item_name\" value=\"$item_name\">
            <input type=\"hidden\" name=\"item_price\" value=\"$item_price\">
            <input type=\"hidden\" name=\"item_id\" value=\"$item_id\">
            <input class=\"quantity\" type=\"number\" name=\"item_quantity\" min=\"1\" max=\"10\" value=\"1\">
          </form>
        </div>
      </div>
    </div>
    <h6>$item_name</h6>
    <p>$item_price<br></p>
    </div>
  ";
}
?>
</div>
</section>
<!-- --------------------------- -->
<section class="creatine">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 m-auto text-center">
        <h2 id="creatine" class="responsive-font-example">Kreatyna</h2>
      </div>
    </div>
    <div class="row">
    <?php

$creatine_query = mysqli_query($connection, "SELECT * FROM items WHERE item_id > 12 LIMIT 4");

while($result = mysqli_fetch_array($creatine_query))
{
  $item_id = $result["item_id"];
  $item_name = $result["item_name"];
  $item_url = $result["item_url"];
  $item_price = $result["item_price"];
  $item_alt = $result["item_alt"];

    echo "
    <div class=\"col-lg-3 text-center\">
    <div class=\"card border-0 bg-light mb-2\">
      <div class=\"card-body\">
        <img src=\"$item_url\" class=\"img-fluid\" alt=\"$item_alt\">
        <div class=\"cart\">
          <form method=\"post\">
            <button type=\"submit\" class=\"cart-btn\" name=\"add_to_cart\"><i class=\"bi bi-cart-plus\"></i></button>
            <input type=\"hidden\" name=\"item_name\" value=\"$item_name\">
            <input type=\"hidden\" name=\"item_price\" value=\"$item_price\">
            <input type=\"hidden\" name=\"item_id\" value=\"$item_id\">
            <input class=\"quantity\" type=\"number\" name=\"item_quantity\" min=\"1\" max=\"10\" value=\"1\">
          </form>
        </div>
      </div>
    </div>
    <h6>$item_name</h6>
    <p>$item_price<br></p>
    </div>
  ";
}
?>
</div>
</section>
<!-- --------------------------- -->
<section class="others">
  <div class="container py-5">
    <div class="row py-5">
      <div class="col-lg-5 m-auto text-center">
        <h2 id="others" class="responsive-font-example">Inne Suplementy</h2>
      </div>
    </div>
    <div class="row">
    <?php

$others_query = mysqli_query($connection, "SELECT * FROM items WHERE item_id > 16 LIMIT 4");

while ($result = mysqli_fetch_array($others_query)) {
  $item_id = $result["item_id"];
  $item_name = $result["item_name"];
  $item_url = $result["item_url"];
  $item_price = $result["item_price"];
  $item_alt = $result["item_alt"];

  echo "
    <div class=\"col-lg-3 text-center\">
    <div class=\"card border-0 bg-light mb-2\">
      <div class=\"card-body\">
        <img src=\"$item_url\" class=\"img-fluid\" alt=\"$item_alt\">
        <div class=\"cart\">
          <form method=\"post\">
            <button type=\"submit\" class=\"cart-btn\" name=\"add_to_cart\"><i class=\"bi bi-cart-plus\"></i></button>
            <input type=\"hidden\" name=\"item_name\" value=\"$item_name\">
            <input type=\"hidden\" name=\"item_price\" value=\"$item_price\">
            <input type=\"hidden\" name=\"item_id\" value=\"$item_id\">
            <input class=\"quantity\" type=\"number\" name=\"item_quantity\" min=\"1\" max=\"10\" value=\"1\">
          </form>
        </div>
      </div>
    </div>
    <h6>$item_name</h6>
    <p>$item_price<br></p>
    </div>
  ";
}

?>
</div>
</section> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>


