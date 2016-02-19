<?php require 'includes/session.php'; ?>
<?php require 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>

<?php

if (isset($_POST['addsubmit'])) {           // echo 'isset submit';
    if (!is_numeric($_POST['year']) || strlen($_POST['year']) != 4) {
        $_SESSION['message'] = 'Release Year must be a four digit year';
        redirect_to('addmovie.php');
        exit;
    }
    if (!preg_match('/^19/', $_POST['year']) && !preg_match('/^20/', $_POST['year'])) {
        $_SESSION['message'] = 'Invalid Release Year';
        redirect_to('addmovie.php');
        exit;
    }

    $movtitle = $_POST['title'];   // echo '<br>title: '.$movtitle;
    $mpaa = $_POST['mpaa'];        // echo '<br>mpaa: '.$mpaa;
    $run = $_POST['runtime'];      // echo '<br>runtime: '.$run;
    $year = $_POST['year'];      //   echo '<br>year: '.$year;

    $insert = 'INSERT INTO movie (title, mpaa, runtime, release_year) ';
    $insert .= 'VALUES ("' . $movtitle . '", "' . $mpaa . '", "' . $run . '", "' . $year . '") ';

    $addMov = $db->prepare($insert);
    $addMov->execute();

    $qmid = 'SELECT id FROM movie WHERE title = "' . $movtitle . '" LIMIT 1';
    $m_id = $db->prepare($qmid);
    $m_id->execute();
    $moid = $m_id->fetch();
    $mid = $moid['id'];        // echo '<br><br>query movie id: '.$moid['id'];

    if (isset($_POST['genre'])) {      // echo '<br><br>isset post[genre]';
        foreach ($_POST['genre'] as $erneg) {
            $qgid = 'SELECT id FROM genre WHERE name = "' . $erneg . '" LIMIT 1';
            $g_id = $db->prepare($qgid);
            $g_id->execute();
            $goid = $g_id->fetch();
            $gid = $goid['id'];        // echo '<br><br>query genre id: '.$goid['id'];

            $check = $db->query('SELECT * FROM genre2movie WHERE genre_id = "' . $gid . '" AND movie_id = "' . $mid . '"');
            $checkG2M = $check->fetchAll(PDO::FETCH_ASSOC);         //   echo '<br';            var_dump($checkG2M);
            if ($checkG2M['movie_id'] != '' && $checkG2M['movie_id'] != NULL) {
                continue;
            } else {
                $db->exec('INSERT INTO genre2movie (genre_id, movie_id) VALUES ("' . $gid . '", "' . $mid . '")');
            }
        }
    }
    if (isset($_SESSION['user_id'])) {         // echo '<br><br>isset session[user_id]';
        
        $exists = NULL;
        $query = 'SELECT user_id FROM movie2user WHERE movie_id = "'.$mid.'"';
        foreach ($db->query($query) as $row) {
            if ($row['user_id'] == $_SESSION['user_id']){
                $exists = TRUE;
            } 
        }
        if ($exists != TRUE) {
            $db->exec('INSERT INTO movie2user (user_id, movie_id) VALUES ("'.$_SESSION['user_id'].'", "'.$mid.'")');
        }
    }
}

redirect_to('collection.php');

?>