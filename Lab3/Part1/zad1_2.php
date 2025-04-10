<?php
    $filename = "counter.txt";
    if (!file_exists($filename)) {
        file_put_contents($filename, "0");
    }
    $count = file_get_contents($filename);
    if (!ctype_digit($count)) {
        echo "Error! File broken!";
    } else {
        $count = intval($count);
        $count++;
        file_put_contents($filename, $count);
        echo "This page has been visited " . $count . " times.";
    }
?>