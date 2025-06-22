<?php
include "header.php";

$id = $_GET['id'];
$post = $data->get_post($id);
$prev = $id - 1;
$next = $data->get_post($id + 1);
?>

<section>
    <header class="main">
        <h1><?php echo $post->title?></h1>
        <p><?php echo $post->posted_on?></p>
    </header>

    <span class="image main"><img src=<?php echo "images/".$post->image?> alt="" /></span>

    <p><?php echo $post->contents?></p>

    <div class="row">
		<div class="col-11 col-12-small">
            <ul class="actions">
                <li><a href=<?php echo "/wprg/Projekt/read.php?id=".($id + 1)?> 
                    class=<?php if (!$next) { echo '"button disabled"'; } else { echo '"button"'; } ?>>Newer</a></li>
                <li><a href=<?php echo "/wprg/Projekt/read.php?id=".($id - 1)?> 
                    class=<?php if ($prev <= 0) { echo '"button disabled"'; } else { echo '"button"'; } ?>>Older</a></li>
            </ul>
        </div>
        <div class="col-1 col-12-small">
            <ul class="actions">
                <li><a href=<?php echo "/wprg/Projekt/edit.php?id=".$id?> 
                    class="button primary">Edit</a></li>
            </ul>
        </div>
    </div>
    
</section>

<?php
include "footer.php";
?>