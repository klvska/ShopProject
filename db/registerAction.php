
<?php

require_once "connect.php";

if (isset($_POST['submit'])) {
    $user_nickname = mysqli_real_escape_string($connection, $_POST['nickname']);
    $user_email = mysqli_real_escape_string($connection, $_POST['email']);
    $user_password = mysqli_real_escape_string($connection, $_POST['pswd']);
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

    $query = "INSERT INTO `users`(`user_nickname`,`user_email`, `user_passwordhash`) VALUES ('$user_nickname','$user_email','$user_password_hash')";

    $result = mysqli_query($connection, $query);
    if ($result) {
        echo '<script>alert("Pomyślnie zarejestrowano!")</script>';
        header('Location: ../index.php');
    } else {
        echo '<script>alert("Użytkownik już istnieje, lub błąd serwera")</script>';
    }
}


?>