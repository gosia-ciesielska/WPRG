<?php
    date_default_timezone_set("Europe/Warsaw");
    $days = [
        "Monday"    => "poniedziałek",
        "Tuesday"   => "wtorek",
        "Wednesday" => "środa",
        "Thursday"  => "czwartek",
        "Friday"    => "piątek",
        "Saturday"  => "sobota",
        "Sunday"    => "niedziela",
    ];
    $date_string = "05-07-1992";
    $timestamp = strtotime($date_string);
    $day = date("l", $timestamp);
    $translated_day = $days[$day];
    echo "<h2>$date_string to $translated_day.</h2>";
?>
