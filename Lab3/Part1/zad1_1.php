<?php 
    $lines = file("text.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    for ($i = sizeof($lines) - 1; $i >= 0; $i--) {
        $reversed[sizeof($lines) - 1 - $i] = $lines[$i];
    }
    $file = fopen("text.txt", "w");
    for ($i = 0; $i < sizeof($reversed); $i++) {
        $line = $reversed[$i];
        if ($i < sizeof($reversed) - 1) {
            $line .= "\n";
        }
        fwrite($file, $line);
    }
    fclose($file);
?>