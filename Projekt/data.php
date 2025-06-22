<?php
class Data {
    private $dblink;

    public function __construct() {
        if (!$this->dblink = mysqli_connect("192.168.1.2", "root", "zaq1@WSX")) {
            echo "Failed to connect to database.";
            exit;
        }
        if (!mysqli_select_db($this->dblink, "blog")) {
            mysqli_close($this->dblink);
            echo "Failed to connect to database.";
            exit;
        }
    }

    public function get_posts() {
        $query = "SELECT * FROM post ORDER BY posted_on DESC";
        $result = mysqli_query($this->dblink, $query);
        while ($row = mysqli_fetch_array($result)) {
            $posts[] = new Post($row['id'], htmlspecialchars($row['title']),
            htmlspecialchars($row['contents']), $row['posted_on'], $row['image']);
        }
        return $posts;
    }

    public function get_post($id) {
        $query = "SELECT * FROM post WHERE id = $id";
        $result = mysqli_query($this->dblink, $query);
        $row = mysqli_fetch_array($result);
        if ($row == null) {
            return false;
        }
        return new Post($row['id'], htmlspecialchars($row['title']),
            htmlspecialchars($row['contents']), $row['posted_on'], $row['image']);
    }

    public function add_post($title, $contents, $image = null) {
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO post (title, contents, ";
        if ($image == null) {
            $query .= "posted_on) VALUES ('$title','$contents','$date')";
        } else {
            $query .= "image, posted_on) VALUES ('$title','$contents','$image','$date')";
        }
        if (!mysqli_query($this->dblink, $query)) {
            echo "Failed to update database!";
        }
    }

    public function update_post($id, $title, $contents, $image = null) {
        $date = date('Y-m-d H:i:s');
        $query = "UPDATE post SET title = '$title', contents = '$contents', posted_on = '$date'";
        if ($image != null) {
            $query .= ", image = '$image'";
        }
        $query .= " WHERE id = $id";
        if (!mysqli_query($this->dblink, $query)) {
            echo "Failed to update database!";
        }
    }

    public function delete_post($id) {
        $query = "DELETE FROM post WHERE id = $id";
        if (!mysqli_query($this->dblink, $query)) {
            echo "Failed to update database!";
        }
    }

    public function get_user($login) {
        $query = "SELECT * FROM user WHERE login = '$login'";
        $result = mysqli_query($this->dblink, $query);
        $row = mysqli_fetch_array($result);
        if ($row == null) {
            return false;
        }
        return new User($row['id'], htmlspecialchars($row['class']), htmlspecialchars($row['email']),
         htmlspecialchars($row['login']), htmlspecialchars($row['password']));
    }

    public function add_user($class, $email, $login, $password) {
        if ($this -> get_user($login) != false) {
            return false;
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (class, email, login, password) VALUES ('$class', '$email', '$login', '$hash')";
        if (!mysqli_query($this->dblink, $query)) {
            echo "Failed to update database!";
        }
    }

    public function verify_password($user, $password) {
        return password_verify($password, $user->password);
    }
} 
?>