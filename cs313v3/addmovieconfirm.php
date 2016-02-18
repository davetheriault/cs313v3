<?php require 'includes/session.php'; ?>
<?php require 'includes/dbConnect.php'; ?>

<?php

if (isset($_POST['addsubmit'])) {
    if (!is_numeric($_POST['year']) || strlen($_POST['year']) != 4) {
        $_SESSION['message'] = 'Release Year must be a four digit year';
        redirect_to('addmovie.php');
        exit;
    }
    if (!preg_match('/^(19)/', $_POST['year']) || !preg_match('/^(20)/', $_POST['year'])) {
        $_SESSION['message'] = 'Invalid Release Year';
        redirect_to('addmovie.php');
        exit;
    }
    
    $movtitle = $_POST['title'];
    $mpaa = $_POST['mpaa'];
    $run = $_POST['runtime'];
    $year = $_POST['year'];
    
    $insert  = 'INSERT INTO movie (title, mpaa, runtime, release_year) ';
    $insert .= 'VALUES ("'.$movtitle.'", "'.$mpaa.'", "'.$run.'", "'.$year.'") ';
    
    $addMov = $db->prepare($insert);
    $addMov->execute();
    
    
    
    redirect_to('collection.php');
}


?>