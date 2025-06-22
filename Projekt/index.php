<?php 
include "header.php";

$posts = $data->get_posts(0, 9);

function display_post_short($id, $title, $contents, $image) {
    echo '<article>';
	echo '<a href="#" class="image"><img src="images/'.$image.'" alt="" /></a>';
    echo '<h3>'.$title.'</h3>';
    echo '<p>'.substr($contents, 0, 250).'<p>';
    echo '<ul class="actions"><li><a href="/wprg/Projekt/read.php?id='.$id.'" class="button">Read</a></li></ul>';
    echo '</article>';
}

?>
<div class="posts">
	<?php
    for ($i = 0; $i < sizeof($posts); $i++) {
        $post = $posts[$i];
        display_post_short($post->id, $post->title, $post->contents, $post->image);
    }
	?>
</div>
<?php 
include "footer.php";
?>