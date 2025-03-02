<?php
    function fibonacci($n){ 
        if ($n == 0) {
            return 0;   
        }  
        else if ($n == 1) {
            return 1;   
        }  
        else {
            return (fibonacci($n-1) + fibonacci($n-2)); 
        }
    } 

    function printFibonacci($n) {
        for ($i = 0; $i < $n; $i++) {
            $arr[$i] = fibonacci($i);
        }
        $count = 1;
        for ($i = 0; $i < sizeof($arr); $i++) {
            if ($i % 2 != 0) {
                echo("Line ");
                echo($count++);
                echo "    |    ";
                echo($arr[$i]);
                echo "<br>"; 
            }
        }
    }

    printFibonacci(20);
?>