<?php
echo "<ul>";
foreach ($posts as $post) {
    echo '<li>
        <a href="index.php?controller=posts&action=showPost&id=' . $post->id . '">' . $post->title . '</a>
        <a href="index.php?controller=posts&action=deletePost&id=' . $post->id . '">' . "delete" . '</a>
        <a href="index.php?controller=posts&action=updatePost&id=' . $post->id . '">' . "update" . '</a>
    </li>
    ';
}
echo "</ul>";
