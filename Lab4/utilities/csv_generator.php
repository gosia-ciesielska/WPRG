<?php 
function writeToCsv($filename, $reservation, $guests) {
    if (!file_exists($filename)) {
        $file = fopen($filename, "a");
        $header = ["Liczba gości", "Dane gości", "Numer telefonu", "E-mail", "Data zameldowania", "Data wymeldowania", "Łóżko dla dziecka", "Klimatyzacja", "Pobyt ze zwierzęciem", "Notatki"];
        fputcsv($file, $header, ";");
        fclose($file);
    }
    $guest_data = "$reservation->name $reservation->surname";
    if ($reservation->guestCount > 1) {
        $guest_data = "Gość 1: $guest_data;";
        for($i = 1; $i < sizeof($guests); $i++) {
            $guest_data .= "Gość " . ($i + 1) . ": " . $guests[$i]->name . " " . $guests[$i]->surname . ";";
        }
    }
    $row = [$reservation->guestCount, $guest_data, $reservation->phone, $reservation->email,
     $reservation->checkInDate, $reservation->checkOutDate, 
     parseOption($reservation->kid), parseOption($reservation->ac), parseOption($reservation->pet),
     $reservation->notes];

    $file = fopen($filename, "a");
    fputcsv($file, $row, ";");
    fclose($file);
}

function parseOption($option) {
    if ($option) {
        return "Tak";
    }
    return "Nie";
}
?>