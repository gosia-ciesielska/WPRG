<?php
    function isPrime($n) {
        if ($n <= 1) {
            return false;
        }            
        if ($n == 2 || $n == 3) {
            return true;
        }
        if ($n % 2 == 0 || $n % 3 == 0) {
            return false;
        }
        for ($i = 5; $i <= sqrt($n); $i = $i + 6) {
            if ($n % $i == 0 || $n % ($i + 2) == 0) {
                return false;
            }
        }
        return true;
    }

    function echoPrimes($a, $b) {
        if ($a > $b) {
            echo "Incorrect range!";
        }
        for ($i = $a; $i <= $b; $i++) {
            if (isPrime($i)) {
                echo $i;
                echo "<br>";
            }
        }
    }

    echoPrimes(1, 70);
?>