<?php 
class User {
    public $id;
    public $class;
    public $email;
    public $login;
    public $password;

    public function __construct($id, $class, $email, $login, $password) {
        $this->id = $id;
        $this->class = $class;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
    }
}
?>