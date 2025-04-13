<?php 
    function writeUrlToFile($file, $sub_page, $description) {
        $url = "http://www.some-restaurant.com/".$sub_page;
        $line = $url." ".$description."\n";
        fwrite($file, $line);
    }

    $file = fopen("urls.txt", "w");
    writeUrlToFile($file, "", "Strona główna");
    writeUrlToFile($file, "about", "O restauracji");
    writeUrlToFile($file, "menu", "Menu restauracji");
    writeUrlToFile($file, "contact", "Kontakt");
    fclose($file);
?>