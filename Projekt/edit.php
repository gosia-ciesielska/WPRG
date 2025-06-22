<?php
include "header.php";
if ($user == false || ($user->class != 'admin' && $user->class != 'author')) {
    header("Location:index.php");
    exit;
}
ob_start();
?>
<br/>
<h3>
    <?php
    if (!isset($_GET['id'])
    || !$data->get_post($_GET['id'])) {
        $is_edit = false;
        echo "New post";
    } else {
        $id = $_GET['id'];
        $post = $data->get_post($id);
        $is_edit = true;
        echo "Edit post";
    }
    ?>
</h3>
<form method="post" action="#" onsubmit="return confirm('Are you sure you want to publish this post?');">
    <div class="row gtr-uniform">
        <div class="col-6 col-12-xsmall">
            <input type="text" name="title" id="title" value="<?php if ($is_edit) echo $post->title?>" placeholder="Title"/>
        </div>
        <!-- Break -->
        <div class="col-12">
            <textarea name="contents" id="contents" placeholder="Write something!" rows="20"><?php if ($is_edit) echo "$post->contents"; ?></textarea>
        </div>
        <div class="col-6 col-12-xsmall">
            <h3>Upload image</h3>
            <input type="file" name="image" id="image">
        </div>
        <!-- Break -->
        <div class="col-12">
            <ul class="actions">
                <li><input type="submit" value="Publish" class="primary" /></li>
            </ul>
        </div>
    </div>
</form>
<?php
if (isset($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $contents = htmlspecialchars($_POST['contents']);
    if ($is_edit) {
        $data->update_post($id, $title, $contents);
    } else {
        $data->add_post($title, $contents);
    }
    header("Location: index.php");
    exit;
}
ob_end_flush();
include "footer.php";
?>