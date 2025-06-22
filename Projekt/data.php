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

    public function get_posts($start_index, $limit) {
        $query = "SELECT * FROM post WHERE id >= ".$start_index." ORDER BY posted_on DESC LIMIT ".$limit;
        $result = mysqli_query($this->dblink, $query);
        while ($row = mysqli_fetch_array($result)) {
            $posts[] = new Post($row['id'], htmlspecialchars($row['title']),
            htmlspecialchars($row['contents']), $row['posted_on'], $row['image']);
        }
        return $posts;
    }

    public function get_post($id) {
        $query = "SELECT * FROM post WHERE id = ".$id;
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
} 
?>