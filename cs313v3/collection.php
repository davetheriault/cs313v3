<?php include 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php //var_dump($_SESSION);   ?>
<?php confirm_logged_in(); ?>


<?php $title = 'Welcome ' . $_SESSION['username'] . '!'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s2 m2 l2">&nbsp;</div>
        <div class="w3-col s8 m8 l8">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0"><span style="text-transform: uppercase;"><?php echo $_SESSION['username']; ?></span>&apos;s Movie Collection</h3>
                <div class="w3-container w3-padding">
                    <ul class="w3-ul">
                       
                        <?php 
                        foreach (($db->query('SELECT movie_id FROM movie2user WHERE user_id = "' . $_SESSION['user_id'] . '"')) as $movie) {
                            foreach (($db->query('SELECT * FROM movie WHERE id = "' . $movie['movie_id'] . '" ORDER BY title ASC')) as $info) {
                                echo '<li><h4><a href="movieinfo.php?title='. htmlentities($info['title']). '">'.$info['title'].'</a></h4><ul class="w3-ul"><li>MPAA Rating: '.$info['mpaa'].'</li>'
                                        . '<li>Runtime: '.$info['runtime'].'</li>'
                                        . '<li>Released: '.$info['release_year'].'</li>'
                                        . '<li>Genre(s): ';
                                foreach (($db->query('SELECT genre_id FROM genre2movie WHERE movie_id = "'.$info['id'].'"')) as $genres) {
                                    foreach (($db->query('SELECT name FROM genre WHERE id = "'.$genres['genre_id'].'"')) as $genre) {
                                        echo '<a href="genre.php?genre='.  htmlentities($genre['name']) .'">'.$genre['name'].'</a> ';
                                    }        
                                }
                                echo '</li></ul></li>';
                            }
                        }
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>