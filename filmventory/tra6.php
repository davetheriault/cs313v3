<?php require 'includes/session.php'; ?>
<?php require 'includes/dbConnect.php'; ?>

<?php $title = 'Scripture DB Add' ?>


<?php
if (isset($_POST['book'])) {
    $db->exec('INSERT INTO scripture (book, chapter, verse, content)'
            . 'VALUES ("' . $_POST['book'] . '", "' . $_POST['chapter'] . '", "' . $_POST['verse'] . '", "' . $_POST['content'] . '")');
}
if (isset($_POST['newtopic'])) {
    $db->exec('INSERT INTO topics (name) values ("' . $_POST['newtopic'] . '")');

    $query = 'SELECT id FROM scripture ';
    $query .= 'WHERE book = "' . $_POST['book'] . '" ';
    $query .= 'AND chapter = "' . $_POST['chapter'] . '" ';
    $query .= 'AND verse = "' . $_POST['verse'] . '" ';
    $query .= 'LIMIT 1 ';

    $findSid = $db->prepare($query);
    $findSid->execute();

    $s_id = $findSid->fetch();

    $queri = 'SELECT id FROM topics ';
    $queri .= 'WHERE name = "' . $_POST['newtopic'] . '" ';
    $queri .= 'LIMIT 1 ';

    $findTid = $db->prepare($queri);
    $findTid->execute();

    $t_id = $findTid->fetch();

    $db->exec('INSERT INTO scripture2topic (topic_id, scripture_id) VALUES ('
            . '"' . $t_id['id'] . '", '
            . '"' . $s_id['id'] . '")');
}

if (isset($_POST['topic'])) {
    foreach ($_POST['topic'] as $cipot) {

        $query = 'SELECT id FROM scripture ';
        $query .= 'WHERE book = "' . $_POST['book'] . '" ';
        $query .= 'AND chapter = "' . $_POST['chapter'] . '" ';
        $query .= 'AND verse = "' . $_POST['verse'] . '" ';
        $query .= 'LIMIT 1 ';

        $findSid = $db->prepare($query);
        $findSid->execute();

        $s_id = $findSid->fetch();

        $queri = 'SELECT id FROM topics ';
        $queri .= 'WHERE name = "' . $cipot . '" ';
        $queri .= 'LIMIT 1 ';

        $findTid = $db->prepare($queri);
        $findTid->execute();

        $t_id = $findTid->fetch();

        $db->exec('INSERT INTO scripture2topic (topic_id, scripture_id) VALUES ('
                . '"' . $t_id['id'] . '", '
                . '"' . $s_id['id'] . '")');
    }
}
?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="rel w3-col s12 m4 l4">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Add a Scripture</h2>
                <div class="w3-container w3-padding-bottom-16" style="padding-top: 15px; padding-bottom: 15px;">

                    <form id="addScript" method="post" action="tra6.php">
                        <label>Book:</label>
                        <input class="w3-input" type="text" name="book" required="required" />

                        <label>Chapter:</label>
                        <input type="number" class="w3-input" name="chapter" required="required"/>

                        <label>Verse:</label>
                        <input type="number" class="w3-input" name="verse" required="required"/>

                        <label>Content:</label>
                        <textarea rows="4" cols="70" name="content" class="w3-input" required="required"></textarea>

                        <label>Topics:</label>
                        <ul class="w3-ul">
                            <?php
                            foreach ($db->query('SELECT id, name FROM topics ORDER BY name ASC') as $topic) {
                                echo '<li><input type="checkbox" name="topic[]" value="' . $topic['name'] . '" /> ' . $topic['name'] . '</li>';
                            }
                            ?>
                            <li><input type="checkbox" name="other" id="other" /> 
                                <input type="text" id="newtopic" name="newtopic" placeholder=" New Topic..." disabled=""/></li>
                        </ul>
                        <br/>
                        <input type="submit" form="addScript" value="Add Scripture" class="w3-btn w3-green"/>


                    </form>
                </div>
            </div>
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Search</h2>
                <div class="w3-container w3-padding-bottom-16" style="padding-top: 15px; padding-bottom: 15px;">
                    <p>Find entries by book...</p>
                    <form id="ookbay" method="get" action="tra5.php">
                        <label>Book:</label>
                        <input class="w3-input" type="text" name="book" />
                        
                        <p><input class="w3-btn w3-blue" type="submit" value="Find" form="ookbay" /> </p>
                    </form>
                </div>
            </div>
        </div>
        <div class="rel w3-col s12m8 l8">

            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Scriptures</h2>

                <div class="w3-container w3-padding-bottom-16" style="padding-top: 15px; padding-bottom: 15px;">
                    <ul class="w3-ul">
                        <?php
                        if ($_GET['book'] != '' && $_GET['book'] != NULL) {
                            foreach ($db->query('SELECT book, chapter, verse, content FROM scripture WHERE book LIKE "%' . $_GET['book'] . '%"') as $row) {
                                echo '<li><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> <br/>"'
                                . $row['content'] . '"</li>';
                            }
                        } else {
                            foreach ($db->query('SELECT id, book, chapter, verse, content FROM scripture ORDER BY book') as $row) {
                                echo '<li><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> <br/>"'
                                . $row['content'] . '"'
                                . '<ul class="w3-ul">';
                                foreach ($db->query('SELECT DISTINCT topic_id FROM scripture2topic WHERE scripture_id = "' . $row['id'] . '"') as $tid) {
                                    foreach ($db->query('SELECT name FROM topics WHERE id = "' . $tid['topic_id'] . '" ORDER BY name') as $tpc) {
                                        echo '<li class="w3-blockquote">' . $tpc['name'] . '</li>';
                                    }
                                }
                                echo '</ul>';
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

<script>
    $('#other').change(function () {
        $("#newtopic").prop("disabled", !$(this).is(':checked'));
    });
</script>