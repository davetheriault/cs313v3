

<?php

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$dbName = "dave";

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

function check_ownership($userid, $movieid) {
    $query = 'SELECT user_id FROM movie2user WHERE movie_id = "' . htmlspecialchars($movieid) . '"';
    foreach ($db->query($query) as $row) {
        if ($row['user_id'] == $userid) {
            return TRUE;
        } 
    }
    return FALSE;
}

echo '<div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">'
 . '<h3 class="w3-red w3-padding w3-margin-0">Results for &quot;' . $_GET['find'] . '&quot;</h3>'
 . '<div class="w3-container w3-padding">'
 . '<ul class="w3-ul">';

foreach ($db->query('SELECT * FROM movie WHERE title LIKE "%' . htmlspecialchars($_GET['find']) . '%" ORDER BY title') as $info) {
    $owns = FALSE;
    $query = 'SELECT user_id FROM movie2user WHERE movie_id = "' . $info['id'] . '"';
    foreach ($db->query($query) as $row) {
        if ($row['user_id'] == $_GET['user']) {
            $owns = TRUE;
        }
    }
    echo '<li>';
    echo '<strong><a href="movieinfo.php?title=' . htmlentities($info['title']) . '">' . $info['title'] . '</a></strong>'
    . ' <img src="../cs313v3/images/' . $info['mpaa'] . '.jpg" alt="' . $info['mpaa'] . '"/>'
    . ' (' . $info['release_year'] . ')';
    if ($owns === TRUE) {
        echo '<div style="float: right;"><i style="color: lightgray;" class="fa fa-check"></i></div>';
    } else {
        echo '<div style="float: right;">'
        . '<button onclick="showResults(' . $_GET['find'] . ', ' . $info['id'] . ')" class="w3-green"><i class="fa fa-plus"></i></button>'
        . '</div>';
    }
    echo '</li>';
}
echo '</ul></div></div>';
?>