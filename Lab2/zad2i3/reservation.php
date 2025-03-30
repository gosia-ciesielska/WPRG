<?php
include_once "header.php";
include_once "reservation_form_data.php";
include_once "guest_form_data.php";
$data = new Reservation();
if ($data->isValid()) {
    if ($data->guestCount == 1) {
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
            include "summary.php";
        }
    }

} else {
    include "reservation_form.php";
}
include_once "footer.php";
?>