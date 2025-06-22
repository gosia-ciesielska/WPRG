<?php
include "header.php";
?>
<br/>
<br/>
<br/>
<br/>
<form method="post" action="#">
    <div class="row gtr-uniform">
        <div class="col-4 col-12-xsmall"></div>
        <div class="col-4 col-12-xsmall">
            <h3>Login</h3>
            <input type="text" name="login" id="login" value="" placeholder="Login"/>
        </div>
    </div>
    <br/>
    <div class="row gtr-uniform">
        <div class="col-4 col-12-xsmall"></div>
        <div class="col-4 col-12-xsmall">
            <input type="password" name="password" id="password" value="" placeholder="Password"/>
        </div>
    </div> 
    <br/>
    <div class="row gtr-uniform">
        <div class="col-4 col-12-xsmall"></div>
        <div class="col-1 col-12-xsmall">
            <ul class="actions">
                <li><input type="submit" name="submit" value="Login" class="button"/></li>
            </ul>
        </div>
        <div class="col-2 col-12-xsmall">
            <ul class="actions">
                <li><a href="/wprg/Projekt/register.php" class="button primary">Register</a></li>
            </ul>
        </div>
    </div> 
</form>
<?php
if (isset($_POST['submit'])) {
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $user = $data->get_user($login);
    if ($user == false
    || !$data->verify_password($user, $password)) {
        header("Location:/wprg/Projekt/login.php");
        exit;
    }
    else {
        $_SESSION["login"] = true;
        setcookie("login", $login, time() + (86400 * 30), "/");
        header("Location:index.php");
    }
}
include "footer.php";
?>