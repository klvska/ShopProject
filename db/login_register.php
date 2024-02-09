<!DOCTYPE html>
<head>
<html lang="pl"
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
        integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/login_register.css">
    <title>Anabolic Factory</title>
    <link rel="icon" type="image/gif" href="../img/icons/mario.gif">
</head>
<body>
    
<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true">
    <div class="signup">
        <form method="POST" action="registerAction.php">
            <label for="chk" aria-hidden="true">Zarejestruj</label>
            <input type="text" name="nickname" placeholder="Imię" required="">
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Hasło" required="">
            <button type="submit" name="submit">Zarejestruj</button>
        </form>
    </div>
    <div class="login">
        <form method="POST" action="loginAction.php">
            <label for="chk" aria-hidden="true">Zaloguj</label>
            <input type="email" name="email" placeholder="Email" required="">
            <input type="password" name="pswd" placeholder="Hasło" required="">
            <button>Zaloguj</button>
        </form>
    </div>
</div>
</body>
</html>

