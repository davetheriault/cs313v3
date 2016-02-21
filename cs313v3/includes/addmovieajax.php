<?php
    if (isset($_GET['user'])) {
    $add = $db->prepare('INSERT INTO movie2user (user_id, movie_id) VALUES ("'.$_GET['user'].'", "'.$_GET['mov'].'")');
    $add->execute();
}
?>