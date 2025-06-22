<?php
include "header.php";
ob_start();
$id = $_GET['id'];
$post = $data->get_post($id);
$posts = $data->get_posts();
for ($i = 0; $i < sizeof($posts); $i++) {
    if ($posts[$i]->id == $post->id) {
        $post_id = $i;
    }
}
$next = false;
$prev = false;
if ($post_id - 1 >= 0) {
    $next = $posts[$post_id - 1]->id;
}
if ($post_id + 1 < sizeof($posts)) {
    $prev = $posts[$post_id + 1]->id;
}
?>

<section>
    <header class="main">
        <h1><?php echo $post->title?></h1>
        <p><?php echo $post->posted_on?></p>
    </header>

    <span class="image main"><img src=<?php echo "images/".$post->image?> alt="" /></span>

    <p><?php echo $post->contents?></p>

    <div class="row">
		<div class="col-10 col-12-small">
            <ul class="actions">
                <li><a href=<?php echo "/wprg/Projekt/read.php?id=$next"?> 
                    class=<?php if (!$next) { echo '"button disabled"'; } else { echo '"button"'; } ?>>Newer</a></li>
                <li><a href=<?php echo "/wprg/Projekt/read.php?id=$prev"?> 
                    class=<?php if (!$prev) { echo '"button disabled"'; } else { echo '"button"'; } ?>>Older</a></li>
            </ul>
        </div>
        <?php
        if ($user != false && ($user->class == 'admin' || $user->class == 'author')) {
            echo "<div class='col-2 col-12-small'>";
            echo "<ul class='actions'>";
            echo "<li><a href='/wprg/Projekt/edit.php?id='.$id class='button primary'>Edit</a></li>";
            echo "<li>";
            echo "<form method='post' action='#' onsubmit=\"return confirm('Are you sure you want to delete this post?');\">";
            echo "<input type='submit' name='submit' value='Delete' class='button primary'/>";
            echo "</form>";
            echo "</li>";
            echo "</ul>";
            echo "</div>";
        }
        ?>
    </div>
    
</section>

<?php
if (isset($_POST["submit"])) {
    $data->delete_post($id);
    header("Location: index.php");
    exit;
}
ob_end_flush();
include "footer.php";
?>