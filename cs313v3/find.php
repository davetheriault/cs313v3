<?php include 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php //var_dump($_SESSION);    ?>
<?php confirm_logged_in(); ?>


<?php $title = 'Find Movies'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">

        <div class="w3-col s8 m8 l8">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">
                    Find Movies
                </h3>
                <div class="w3-container w3-padding">

                    <form class="w3-form" id="movieSearch" action="find.php" method="get">
                        <div class="w3-row">
                        <input class="w3-col s10 m10 l10 w3-input" type="text" placeholder="Search Database..." name="find"/>
                        <button class="w3-col s2 m2 l2 w3-btn w3-grey" type="submit" form="movieSearch"><i class="fa fa-search"></i></button>   
                        </div>
                    </form>

                    <ul class="w3-ul">

                        <?php /*
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
                          } */
                        ?>
                    </ul>
                </div>

            </div>
        </div>
        <div class="w3-col s4 m4 l4">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">
                    Management
                </h3>
                <div class="w3-container w3-padding mngmnt">
                    <ul class="w3-ul">
                        <li><a href="addmovie.php"><i class="fa fa-plus"></i> Add a Movie</a></li>
                        <li><a href="account.php"><i class="fa fa-cog"></i> Account</a></li>
                        <li><a href="find.php"><i class="fa fa-search"></i> Find Movies</a></li>
                    </ul>
                </div>
            </div> 
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>