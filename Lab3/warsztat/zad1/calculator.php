<!DOCTYPE html>
<html>
    <head>
        <title>Calculator</title>
    </head>
    <body>
        <form method="post">
            <label for="numberA">Liczba A</label><br/>
            <input type="number" name="numberA" id="numberA" value="0"/><br/>
            <label for="numberB">Liczba B</label><br/>
            <input type="number" name="numberB" id="numberB" value="0"/><br/>
            <select id="operation" name="operation">
                <option value="add" selected>+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select><br/>
            <input type="submit" value="Oblicz"/>
        </form>
        <br/>
        <br/>

        <?php 
        include("operations.php");

        if($_SERVER['REQUEST_METHOD'] == "POST") {
            $numA = floatval($_POST["numberA"]);
            $numB = floatval($_POST["numberB"]);
            $operation = $_POST["operation"];
            echo("WYNIK: ");
            switch ($operation) {
                case "add":
                    echo("$numA + $numB = " . add($numA, $numB));
                    break;
                case "subtract":
                    echo("$numA - $numB = " . subtract($numA, $numB));
                    break;
                case "multiply":
                    echo("$numA * $numB = " . multiply($numA, $numB));
                    break;
                case "divide":
                    $result = divide($numA, $numB);
                    echo("$numA / $numB = $result");
                    break;
            }
        }
        ?>
    </body>
</html>