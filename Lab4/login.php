<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Hotel Boba!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
        <link rel="stylesheet" href="style-login.css" />
    </head>
    <body>
        <form class="login-form" action="#" method="post">
            <div class="elem-group">
                <h1>Zaloguj się</h1>
            </div>
            <div class="elem-group">
                <label for="name">Login</label>
                <input type="text" id="username" name="username" placeholder="Login" required>
            </div>
            <div class="elem-group">
                <label for="name">Hasło</label>
                <input type="password" id="password" name="password" placeholder="Hasło" required>
            </div>
            <button type="submit" name="login-button">Zaloguj</button>
        </form>
        <?php 
            if (isset($_POST["login-button"])) {
                if ($_POST["username"] == "User"
                && $_POST["password"] == "Pass") {
                    session_start();
                    $_SESSION["login"] = true;
                    setcookie("username", $_POST["username"], time() + (86400 * 30), "/");
                    header("Location:reservation.php");
                }
            }
        ?>
    </body>
</html>