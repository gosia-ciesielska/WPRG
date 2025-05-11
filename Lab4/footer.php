<div class="special-buttons">
    <form method="post" action="utilities/data.php">
        <button type="submit" name="load_csv" class="special">Wczytaj</button>
    </form>
    <form method="post" action="#">
        <button type="submit" name="clear_cookies" class="special">Wyczyść ciasteczka</button>
    </form>
    <form method="post" action="#">
        <button type="submit" name="logout" class="special">Wyloguj</button>
    </form>
</div>
<?php 
if (isset($_POST["clear_cookies"])) {
    setcookie("reservation_data", "", time() - 3600, "/");
    setcookie("guest_data", "", time() - 3600, "/");
    header("Location:reservation.php");
}
if (isset($_POST["logout"])) {
    setcookie("username", "", time() - 3600, "/");
    session_unset();
    session_destroy();
    header("Location:login.php");
}
?>
</body>
</html>