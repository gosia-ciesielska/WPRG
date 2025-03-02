<?php
    $fruit[] = "apple";
    $fruit[] = "kiwi";
    $fruit[] = "pomegranate";
    $fruit[] = "mango";
    $fruit[] = "strawberry";

    for ($i = 0; $i < sizeof($fruit); $i++) {
        for ($j = strlen($fruit[$i]); $j >= 0; $j--) {
            echo $fruit[$i][$j];
        }
        echo "; Starts with p: ";
        if ($fruit[$i][0] == 'p') {
            echo "yes";
        } else {
            echo "no";
        }
        echo "<br>";
    }
?>
