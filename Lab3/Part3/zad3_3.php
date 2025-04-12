<?php 
    function create_test_dir($name) {
        if (is_dir($name)) {
            return;
        }
        mkdir($name);
        fopen("$name/file1.txt", "w");
        fopen("$name/file2.txt", "w");
        fopen("$name/file3.txt", "w");
        mkdir("$name/nested1");
        fopen("$name/nested1/file1.txt", "w");
        fopen("$name/nested1/file2.txt", "w");
        mkdir("$name/nested2");
        fopen("$name/nested2/file1.txt", "w");
        mkdir("$name/nested2/double_nested");
        fopen("$name/nested2/double_nested/file1.txt", "w");
    }

    function remove_directory($dir): void {
        $directory_iterator = new RecursiveDirectoryIterator($dir, 
        RecursiveDirectoryIterator::SKIP_DOTS);
        $files = new RecursiveIteratorIterator($directory_iterator,
        RecursiveIteratorIterator::CHILD_FIRST);
        foreach($files as $file) {
            if ($file->isDir()){
                rmdir($file->getPathname());
            } else {
                unlink($file->getPathname());
            }
        }
        rmdir($dir);
    }
    
    $test_dir = "test";
    create_test_dir($test_dir);
    remove_directory($test_dir);
?>