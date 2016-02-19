<?php require 'includes/session.php'; ?>
<?php require 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php if (!isset($_GET['title'])) {
    redirect_to('collection.php');
}
?>
<?php $title = $_GET['title'] . ' Info'; ?>
<?php include 'includes/header.php'; ?>

<?php
$movieQuery = $db->prepare('SELECT * FROM movies WHERE title = "' . $_GET['title'] . '" LIMIT 1');
$movieQuery->execute();
$info0 = $movieQuery->fetchAll(PDO::FETCH_ASSOC);
$info = $info0[0];
?>

<main class="w3-container">
    <div class="w3-row">

        <div class="w3-col s8 m8 l8">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0"><?php echo $_GET['title']; ?></h3>
                <div class="w3-container w3-padding">
                    <ul class="w3-ul">

                        <?php
                        echo '<li><h4>' . $info['title'] . '</h4>'
                        . '<ul class="w3-ul"><li>MPAA Rating: ' . $info['mpaa'] . '</li>'
                        . '<li>Runtime: ' . $info['runtime'] . '</li>'
                        . '<li>Released: ' . $info['release_year'] . '</li>'
                        . '<li>Genre(s): ';
                        foreach (($db->query('SELECT genre_id FROM genre2movie WHERE movie_id = "' . $info['id'] . '"')) as $genres) {
                            foreach (($db->query('SELECT name FROM genre WHERE id = "' . $genres['genre_id'] . '"')) as $genre) {
                                echo '<a href="genre.php?genre=' . htmlentities($genre['name']) . '">' . $genre['name'] . '</a> ';
                            }
                        }
                        echo '</li></ul></li>';
                        ?>
                    </ul>
                </div>

            </div>
        </div>
        <div class="w3-col s4 m4 l4">
            <?php require 'includes/management.php'; ?>
        </div>        
    </div>

</main>

<?php include 'includes/footer.php'; ?>