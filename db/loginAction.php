<?php

require_once "connect.php";
session_start();

$user_email = mysqli_real_escape_string($connection, $_POST["email"]);
$user_password = mysqli_real_escape_string($connection, $_POST["pswd"]);


$query_login = mysqli_query($connection, "SELECT * FROM users WHERE user_email ='$user_email'");
$query_admin = mysqli_query($connection, "SELECT * FROM users WHERE user_email = '$user_email' AND is_admin=1");

if(mysqli_num_rows($query_admin) > 0){
   header('Location: ./admin/admin.php');
}
else if(mysqli_num_rows($query_login) > 0) {
   $record = mysqli_fetch_assoc($query_login);
   $hash = $record["user_passwordhash"];
   if (password_verify($user_password, $hash)) {
      $query_nickname = mysqli_query($connection, "SELECT user_nickname FROM users WHERE user_email = '$user_email'");
      $user_nickname = mysqli_fetch_assoc($query_nickname);
      $nickname =$user_nickname["user_nickname"];
      $_SESSION["current_user"] = $nickname;
    header('Location: ../index.php');
   }
}
else {
   echo '<script>alert("Użytkownik nie istnieje, lub błędne dane")</script>';
   echo '<h1 style="display: flex; justify-content: center; align-self: center; font-size: 50px;"><a href="login&register.php">powrót</a></h1>';
}

