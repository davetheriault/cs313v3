

<?php
include 'includes/dbConnect.php';

echo '<div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">'
   . '<h3 class="w3-red w3-padding w3-margin-0">Results for &quot;' . $_GET['find'] . '&quot;</h3>'
   .      '<div class="w3-container w3-padding">'
   .         '<ul class="w3-ul">';

foreach ($db->query('SELECT * FROM movie WHERE title LIKE "%' . htmlspecialchars($_GET['find']) . '%" ORDER BY title') as $info) {
    //$owns = check_ownership($_SESSION['user_id'], $info['id']);
    echo '<li>';
    echo '<strong><a href="movieinfo.php?title=' . htmlentities($info['title']) . '">' . $info['title'] . '</a></strong>'
    . ' <img src="../cs313v3/images/' . $info['mpaa'] . '.jpg" alt="' . $info['mpaa'] . '"/>'
    . ' (' . $info['release_year'] . ')';
    if ($owns === TRUE) {
        echo '<div style="float: right;"><i style="color: lightgray;" class="fa fa-check"></i></div>';
    } else {
        echo '<div style="float: right;">'
        . '<button onclick="showResults(' . $_GET['find'] . ', ' . $info['id'] . ')" class="w3-red"><i class="fa fa-plus"></i></button>'
        . '</div>';
    }
    echo '</li>';
}
echo '</ul></div></div>';

?>