<div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
    <h3 class="w3-red w3-padding w3-margin-0">
    <?php echo 'Results for &quot;' . $_GET['find'] . '&quot;'; ?>
    </h3>
    <div class="w3-container w3-padding">
        <ul class="w3-ul">
            <?php
            foreach ($db->query('SELECT * FROM movie WHERE title LIKE "%' . $_GET['find'] . '%" ORDER BY title') as $info) {
                echo '<li><h4><a href="movieinfo.php?title=' . htmlentities($info['title']) . '">' . $info['title'] . '</a></h4>'
                        . '<ul class="w3-ul">'
                        . '<li>MPAA Rating: ' . $info['mpaa'] . '</li>'
                        . '<li>Runtime: ' . $info['runtime'] . '</li>'
                        . '<li>Released: ' . $info['release_year'] . '</li>'
                        . '<li>Genre(s): ';
                foreach (($db->query('SELECT genre_id FROM genre2movie WHERE movie_id = "' . $info['id'] . '"')) as $genres) {
                    foreach (($db->query('SELECT name FROM genre WHERE id = "' . $genres['genre_id'] . '"')) as $genre) {
                        echo '<a href="genre.php?genre=' . htmlentities($genre['name']) . '">' . $genre['name'] . '</a> ';
                    }
                }
                echo '</li></ul></li>';
            }
            ?>
        </ul>

    </div>

</div>