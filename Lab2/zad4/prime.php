<!DOCTYPE html>
<html>
    <head>
        <title>Prime number</title>
    </head>
    <body>
        <form method="post">
            <label for="number">Podaj liczbę, aby sprawdzić, czy jest liczbą pierwszą</label><br/>
            <input type="number" name="number" id="number"/><br/>
            <input type="submit" value="Sprawdź"/>
        </form>
        <br/>
        <br/>
        <?php   
        $count = 0;         
        function checkIfPrime($number) {
            global $count;
            if ($number <= 1) {
                return false;
            }
            for ($i = 2; $i*$i < $number; $i++) {
                $count++;
                if ($number % $i == 0) {
                    return false;
                }
            }
            return true;
        }
        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $num = $_POST["number"];
            $isPrime = checkIfPrime($num);
            if ($isPrime) {
                echo "Liczba jest pierwsza";
            } else {
                echo "Liczba nie jest pierwsza";
            }
            echo "<br/>Ilość powtórzeń: ".$count;
        }
        ?>
    </body>
</html>