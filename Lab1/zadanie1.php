<?php
    $fruit[] = "apple";
    $fruit[] = "kiwi";
    $fruit[] = "pomegranate";
    $fruit[] = "mango";
    $fruit[] = "strawberry";

    for ($i = 0; $i < sizeof($fruit); $i++) {
        for ($j = strlen($fruit[$i]); $j >= 0; $j--) {
            $word = $fruit[$i];
            echo substr($word, $j, 1);
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
