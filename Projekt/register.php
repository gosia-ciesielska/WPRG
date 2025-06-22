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
            <h3>Register</h3>
            <input type="email" name="email" id="email" value="" placeholder="Email"/>
        </div>
    </div>
    <br/>
    <div class="row gtr-uniform">
        <div class="col-4 col-12-xsmall"></div>
        <div class="col-4 col-12-xsmall">
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
        <div class="col-4 col-12-xsmall">
            <input type="password" name="confirm-pass" id="confirm-pass" value="" placeholder="Confirm password"/>
        </div>
    </div> 
    <br/>
    <div class="row gtr-uniform">
        <div class="col-4 col-12-small"></div>
        <div class="col-1 col-12-medium">
            <ul class="actions">
                <li><input type="submit" name="submit" value="Register" class="button"/></li>
            </ul>
        </div>
    </div> 
</form>
<?php
function password_valid($password, $confirm_password) {
    if ($password != $confirm_password) {
        return false;
    }
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $special_chars = preg_match('@[^\w]@', $password);
    if(!$uppercase || !$lowercase || !$number || !$special_chars || strlen($password) < 8) {
        return false;
    }
    return true;
}

function login_valid($login) {
    return preg_match('/^[A-Za-z][A-Za-z0-9]{4,31}$/', $login);
}

if (isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm-pass']);
    if (!login_valid($login)) {
        header("Location:/wprg/Projekt/register.php");
        exit;
    }
    $user = $data->get_user($login);
    if ($user != false) {
        header("Location:/wprg/Projekt/register.php");
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location:/wprg/Projekt/register.php");
        exit;
    }
    if (!password_valid($password, $confirm_password)) {
        header("Location:/wprg/Projekt/register.php");
        exit;
    }
    $data->add_user('user', $email, $login, $password);
    header("Location:index.php");
}
include "footer.php";
?>