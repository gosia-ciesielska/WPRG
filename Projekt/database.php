<?php
if (!$dblink = mysqli_connect("gosia-mariadb", "root", "zaq1@WSX")) {
    echo "Failed to connect to database.";
    exit;
}
if (!mysqli_select_db($dblink, "blog")) {
    mysqli_close($dblink);
    echo "Failed to connect to database.";
    exit;
}
?>