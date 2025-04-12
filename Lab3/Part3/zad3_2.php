<?php
    function get_directory_size($dir) {
        $dir_realpath = realpath($dir);
        if($dir_realpath == false || $dir_realpath ==' ' || !is_dir($dir_realpath)) {
            return false;
        }
        $directory_iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS));
        $size = 0;
        foreach ($directory_iterator as $file) {
            $size += filesize($file);
        }
        return [$dir_realpath, $size];
    }
    $total_size = get_directory_size("../");
    if ($total_size != false) {        
        $dir_realpath = $total_size[0];
        $dir_size = $total_size[1];
        echo "$dir_realpath: $dir_size B";
    } else {
        echo "Podany katalog nie istnieje!";
    }
?>
