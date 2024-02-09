<?php

session_start();
unset($_SESSION["current_user"]);
unset($_SESSION["cart_items"]);
header('Location: ../index.php');
?>