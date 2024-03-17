<form action="index.php?controller=posts&action=processUpdatePost&id=<?php echo $_GET['id'] ?>" method="POST">
    <input type="text" name="title" value="<?php echo $post->title ?>">
    <input type="text" name="content" value="<?php echo $post->content ?>">
    <button>update</button>
</form>