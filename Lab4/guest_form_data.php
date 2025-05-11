<?php
class Guest
{
    public $name = '';
    public $surname = '';
    public $phone = '';
    public $email = '';

    public function __construct($index)
    {
        if (isset($_POST["guest_name_$index"])) {
            $this->name = trim($_POST["guest_name_$index"]);
        }
        if (isset($_POST["guest_surname_$index"])) {
            $this->surname = trim($_POST["guest_surname_$index"]);
        }
        if (isset($_POST["guest_phone_$index"])) {
            $this->phone = trim($_POST["guest_phone_$index"]);
        }
        if (isset($_POST["guest_email_$index"])) {
            $this->email = trim($_POST["guest_email_$index"]);
        }
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

    public function isValid(): bool
    {
        return $this->isNameValid() && $this->isSurnameValid();
    }
}
?>