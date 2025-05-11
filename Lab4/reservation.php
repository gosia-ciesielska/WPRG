<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:login.php");
    die;
}
include_once "header.php";
include_once "reservation_form_data.php";
include_once "guest_form_data.php";
include_once "utilities/csv_generator.php";
include_once "utilities/data_helper.php";
$data = new Reservation();
if ($data->isValid()) {
    setcookie("reservation_data", json_encode($data), time() + (86400 * 30), "/");
    if ($data->guestCount == 1) {
        writeToCsv("data.csv", $data, []);
        include "summary.php";
    } else {
        $guests = [];
        $invalid_guest = false;
        for ($i = 0; $i < $data->guestCount; $i++) {
            array_push($guests, new Guest($i));
            if (!$guests[$i]->isValid()) {
                $invalid_guest = true;
            }
        }
        if ($invalid_guest) {
            include "guest_form.php";
        } else {
            writeToCsv("data.csv", $data, $guests);
            setcookie("guest_data", json_encode($guests), time() + (86400 * 30), "/");
            include "summary.php";
        }
    }

} else {
    include "reservation_form.php";
}
include_once "footer.php";
?>