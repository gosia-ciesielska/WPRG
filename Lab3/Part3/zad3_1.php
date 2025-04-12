<?php
    $directory = "C:/Users/Gosia/Desktop";
    if (!is_dir($directory)
    || !($handle = opendir($directory))) {
        echo "Nie udało się otworzyć katalogu $directory.";
        exit;
    } 
    while ($entry = readdir($handle)) {
        if ($entry == "." || $entry == ".." || $entry[0] == ".") {
            continue;
        }
        $full_path = $directory . DIRECTORY_SEPARATOR . $entry;
        if (is_dir($full_path)) {
            $directories[] = $entry;
        } elseif (is_file($full_path)) {
            $files[] = $entry;
        }
    }
    closedir($handle);

    echo "<h2>Katalogi w $directory</h2>";
    foreach ($directories as $dir) {
        echo "$dir</br>";
    }

    echo "<h2>Pliki w $directory</h2>";
    foreach ($files as $file) {
        echo "$file</br>";
    }
?>
