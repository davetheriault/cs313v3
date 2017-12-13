<?php require 'includes/session.php'; ?>
<?php require 'includes/dbConnect.php'; ?>
<?php require 'includes/functions.php'; ?>

<?php

$mid = NULL;

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
    $run = $_POST['runtimeH'] . ':' . $_POST['runtimeS'] . ':00';      // echo '<br>runtime: '.$run;
    $year = $_POST['year'];      //   echo '<br>year: '.$year;
    
    foreach ($db->query('SELECT release_year FROM movie WHERE title = "'.$movtitle.'"') as $chk) {
        if ($chk['release_year'] == $year) {
            $_SESSION['message'] = 'Movie Already in Database. Find it in "Find Movies".';
            redirect_to('addmovie.php');
            exit;
        }
    }

    if (strpos($movtitle, 'The ') == 0) {
        $alpha = str_replace('The ', '', $movtitle);
    } else {
        $alpha = $movtitle;
    }

    $insert = 'INSERT INTO movie (title, mpaa, runtime, release_year, alpha) ';
    $insert .= 'VALUES ("' . $movtitle . '", "' . $mpaa . '", "' . $run . '", "' . $year . '", "' . $alpha . '") ';

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
    if (isset($_SESSION['user_id'])) {

        $stmt = 'SELECT id FROM movie2user WHERE user_id = "' . $_SESSION['user_id'] . '" AND movie_id = "' . $mid . '" ';
        $db->query($stmt);

        if (is_null($query)) {

            $addM = $db->prepare('INSERT INTO movie2user (user_id, movie_id) VALUES ("' . $_SESSION['user_id'] . '", "' . $mid . '")');
            $addM->execute();
        }
    }

    redirect_to('collection.php');
}
?>