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
    $months = [
        "January"   => "styczeń",
        "February"  => "luty",
        "March"     => "marzec",
        "April"     => "kwiecień",
        "May"       => "maj",
        "June"      => "czerwiec",
        "July"      => "lipiec",
        "August"    => "sierpień",
        "September" => "wrzesień",
        "October"   => "październik",
        "November"  => "listopad",
        "December"  => "grudzień",
    ];
    $day   = $days[date("l")];
    $month = $months[date("F")];
    $date_string = $day . date(", d ") . $month . date(" Y, h:i:s a, O \G\M\T");
    echo "<h2>Dziś jest " . $date_string . "</h2>";
?>
