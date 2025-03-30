<?php
class Reservation
{
    public $guestCount = '';
    public $name = '';
    public $surname = '';
    public $phone = '';
    public $email = '';
    public $checkInDate = '';
    public $checkOutDate = '';
    public $kid = false;
    public $ac = false;
    public $pet = false;
    public $notes = '';

    public function __construct()
    {
        if ($_SERVER["REQUEST_METHOD"] != "POST") {
            return;
        }
        if (isset($_POST['reservation_data'])) {
            $this->fromJson(str_replace("'", "\"", $_POST['reservation_data']));
            return;
        }
        if (isset($_POST["guest_count"])) {
            //this should be validated before intval but oh well
            $this->guestCount = intval($_POST["guest_count"]);
        }
        if (isset($_POST["name"])) {
            $this->name = trim($_POST["name"]);
        }
        if (isset($_POST["surname"])) {
            $this->surname = trim($_POST["surname"]);
        }
        if (isset($_POST["phone"])) {
            $this->phone = trim($_POST["phone"]);
        }
        if (isset($_POST["email"])) {
            $this->email = trim($_POST["email"]);
        }
        if (isset($_POST["checkin_date"])) {
            $this->checkInDate = $_POST["checkin_date"];
        }
        if (isset($_POST["checkout_date"])) {
            $this->checkOutDate = $_POST["checkout_date"];
        }
        $this->kid = isset($_POST["kid"]) && $_POST["kid"] == "1";
        $this->ac = isset($_POST["ac"]) && $_POST["ac"] == "1";
        $this->pet = isset($_POST["pet"]) && $_POST["pet"] == "1";
        if (!empty($_POST["notes"])) {
            $this->notes = $_POST["notes"];
        }
    }

    public function isGuestCountValid(): bool
    {
        return filter_var($this->guestCount, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1, "max_range" => 4]]) !== false;
    }

    public function isNameValid(): bool
    {
        return preg_match("/^[a-zA-Z\s]+$/", $this->name);
    }

    public function isSurnameValid(): bool
    {
        return preg_match("/^[a-zA-Z\s]+$/", $this->surname);
    }

    public function isPhoneValid(): bool
    {
        return preg_match("/^[0-9\s\-\(\)]+$/", $this->phone);
    }

    public function isEmailValid(): bool
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function isCheckInDateValid(): bool
    {
        return DateTime::createFromFormat('Y-m-d', $this->checkInDate) !== false;
    }

    public function isCheckOutDateValid(): bool
    {
        $checkInDate = DateTime::createFromFormat('Y-m-d', $this->checkInDate);
        $checkOutDate = DateTime::createFromFormat('Y-m-d', $this->checkOutDate);
        return $checkOutDate !== false && $checkInDate !== false && $checkOutDate > $checkInDate;
    }

    public function isValid(): bool
    {
        return $this->isGuestCountValid()
            && $this->isNameValid()
            && $this->isSurnameValid()
            && $this->isPhoneValid()
            && $this->isEmailValid()
            && $this->isCheckInDateValid()
            && $this->isCheckOutDateValid();
    }

    public function toJson(): string
    {
        return json_encode(get_object_vars($this));
    }

    public function fromJson(string $json)
    {
        $data = json_decode($json, true);
        if (!is_array($data)) {
            return;
        }
        foreach ($data as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}
?>