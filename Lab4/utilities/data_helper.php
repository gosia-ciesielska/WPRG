<?php
  function getReservationData(Reservation $data, string $param) {
    if (isset($_COOKIE["reservation_data"])) {
      $data = json_decode($_COOKIE["reservation_data"]);
    } 
    return $data->$param;
  }

  function getGuestData($guests, int $guestIndex, string $param) {
    if (isset($_COOKIE["guest_data"])) {
      $guests = json_decode($_COOKIE["guest_data"]);
    } 
    return $guests[$guestIndex]->$param;
  }
?>