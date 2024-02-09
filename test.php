<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Koszyk</title>
</head>
<body>

<?php

session_start();
?>
<nav class="navbar navbar-expand-lg sticky-top bg-white">
  <div class="container">
    <a class="navbar-brand" href="../index.php">
        <img class="navbar-logo"src="../img/icons/logo.png" alt="Anabolic Factory">
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
          <a class="nav-link" href="cart.php">
          <img class="cart-icon" src="../img/icons/cart.svg">
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
            <a class="nav-link" href="./db/login&register.php">    
            <img class="login-icon" src="./img/icons/person-circle.svg">
            </a>
          </li>';
         }
?>
      </ul>
    </div>
  </div>
</nav>

<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koszyk</title>
    <!-- Dodanie stylów Bootstrapa -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container my-5">
      <div class="row">
        <div class="col-md-12">
          <h1 class="mb-4">Koszyk</h1>
          <?php if (isset($_SESSION["cart_items"])) : ?>
            <h2>Produkty w koszyku:</h2>
            <ul class="list-group">
              <?php $total_price = 0; ?>
              <?php foreach ($_SESSION["cart_items"] as $key => $item) : ?>
                <?php
                  $id = $key;
                  $name = $item['name'];
                  $quantity = $item['quantity'];
                  $price = $item['price'];
                  $item_price = floatval($price) * intval($quantity);
                  $total_price += $item_price;
                ?>
                <li class="list-group-item">
                  <div class="row">
                    <div class="col-md-8">
                      <h4><?php echo $name; ?></h4>
                      <p>Cena za sztukę: <?php echo $price; ?> zł</p>
                      <form style='display: inline-block' method='post' action='change_quantity.php?id=<?php echo $id; ?>&action=plus'>
                        <button type='submit' class='btn btn-secondary'>+</button>
                      </form>
                      <form style='display: inline-block' method='post' action='change_quantity.php?id=<?php echo $id; ?>&action=minus'>
                        <button type='submit' class='btn btn-secondary'>-</button>
                      </form>
                      <form style='display: inline-block' method='post' action='remove_item.php?id=<?php echo $id; ?>'>
                        <button type='submit' class='btn btn-danger'>Usuń</button>
                      </form>
                    </div>
                    <div class="col-md-4">
                      <p class="text-end">Ilość: <?php echo $quantity; ?></p>
                      <p class="text-end fw-bold"><?php echo $item_price; ?> zł</p>
                    </div>
                  </div>
                </li>
              <?php endforeach; ?>
            </ul>
            <h3 class="my-4">Suma koszyka: <?php echo $total_price; ?> zł</h3>
            <form action='checkout.php' method='post'>
              <button type='submit' class='btn btn-zamow'>Złóż zamówienie</button>
            </form>
          <?php else : ?>
            <h2 class="my-4">Koszyk jest pusty</h2>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- Dodanie skryptów Bootstrapa -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>