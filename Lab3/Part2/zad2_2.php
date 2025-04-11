<?php
    date_default_timezone_set("Europe/Warsaw");
    $today = new DateTime();
    $last_day_of_year = new DateTime(date("Y") . "-12-31");
    $till_end_of_year = $today->diff($last_day_of_year)->days;
    echo "<h2>Do końca roku pozostało " . $till_end_of_year . " dni.</h2>";
?>
