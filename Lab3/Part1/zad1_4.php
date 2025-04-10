<?php 
    $ip_list = file("ip_addresses.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $user_ip = $_SERVER['REMOTE_ADDR'];
    if (in_array($user_ip, $ip_list)) {
        header("Location: special_page.html");
    } else {
        header("Location: default_page.html");
    }
    exit();
?>