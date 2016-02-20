<div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
    <h3 class="w3-red w3-padding w3-margin-0">
    <?php echo 'Results for &quot;' . $_GET['find'] . '&quot;'; ?>
    </h3>
    <div class="w3-container w3-padding">
        <ul class="w3-ul">
            <?php
            foreach ($db->query('SELECT * FROM movie WHERE title LIKE "%' . $_GET['find'] . '%" ORDER BY title') as $info) {
                echo '<li><strong><a href="movieinfo.php?title=' . htmlentities($info['title']) . '">' . $info['title'] . '</a></strong>'
                        . ' <img src="../cs313v3/images/'.$info['mpaa'].'.jpg" alt="'.$info['mpaa'].'"/>'
                        . ' (' . $info['release_year'] . ')'
                        . '<div style="float: right;"><button>Add</button></div>'
                        . '</li>';
            }
            ?>
        </ul>

    </div>

</div>