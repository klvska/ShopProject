<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'anabolicfactory';

$connection = new mysqli(
    $host,
    $user,
    $password,
    $database
)
or die ("Odpowiedź: Błąd połączenia z serwerem $host");
mysqli_select_db($connection, $database) or die("Trwa konserwacja bazy danych… Odśwież stronę za kilka sekund.");


?>