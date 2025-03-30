Przykład danych z pierwszego formularza: <?php echo $data->email; ?> <br>
Przykład imion gości: <br>
<?php
for ($i = 0; $i < count($guests); $i++) {
    echo $guests[$i]->name . '<br>';
}
?>