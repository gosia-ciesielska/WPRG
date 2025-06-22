<?php
include "header.php";
setcookie("login", "", time() - 3600, "/");
session_unset();
header("Location:index.php");
?>