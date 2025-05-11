<!DOCTYPE html>
<html>
    <head>
        <title>Dane</title>
    </head>
    <body>
    <?php
    if (!isset($_SESSION["login"])) {
        header("Location:login.php");
        die;
    }
    if (isset($_POST['load_csv'])) {
        $csv_file = 'data.csv';
        if (!file_exists($csv_file)) {
            echo "Nie znaleziono pliku!";
            exit;
        } 
        echo "<table border='1' cellpadding='5' cellspacing='0'>";  
        if (($handle = fopen($csv_file, "r")) != false) {
            while (($data = fgetcsv($handle, 1000, ";")) != false) {
                echo "<tr>";
                foreach ($data as $cell) {
                    echo "<td>" . htmlspecialchars($cell) . "</td>";
                }
                echo "</tr>";
            }
            fclose($handle);
        }
        echo "</table>";
    }
    ?>

    </body>
</html>
