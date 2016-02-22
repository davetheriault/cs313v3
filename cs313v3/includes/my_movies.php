

<?php

$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST');
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT');
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
$dbName = "dave";

$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);

if (isset($_GET['mov'])) {
    $db->exec('DELETE FROM movie2user WHERE user_id = "'.htmlspecialchars($_GET['user']).'" AND movie_id = "'.htmlspecialchars($_GET['mov']).'"');
}
echo '<ul class="w3-ul">';
foreach ($db->query('SELECT * FROM movie INNER JOIN movie2user ON movie.id=movie2user.movie_id WHERE movie2user.user_id = "' . $_SESSION['user_id'] . '" ORDER BY movie.alpha') as $info) {
    echo '<li><div class="w3-container">'
    . '<div class="w3-half"><strong><a href="movieinfo.php?title=' . htmlentities($info['title']) . '&id=' . htmlentities($info['movie_id']) . '">' . $info['title'] . '</a></strong></div>'
    . '<div class="w3-quarter"><img src="../cs313v3/images/' . $info['mpaa'] . '.jpg" alt="' . $info['mpaa'] . '"/></div>'
    . '<div class="w3-quarter">(' . $info['release_year'] . ')'
    . '<div style="float: right;">'
    . '<button class="delthing w3-red" onclick="confirm_del(' . $_GET['user'] . ', ' . $info['id'] . ', \'' . $info['title'] . '\')" ><i class="fa fa-minus"></i></button>'
    . '</div></div>'
    . '</div></li>';
}
echo '</ul>';
?>
