<?php
class Post {
    public $id;
    public $title;
    public $contents;
    public $image;
    public $posted_on;

    public function __construct($id, $title, $contents, $posted_on, $image = null) {
        $this->id = $id;
        $this->title = $title;
        $this->contents = $contents;
        $this->image = $image;
        $this->posted_on = $posted_on;
    }
}
?>