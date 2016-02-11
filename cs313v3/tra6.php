<?php require 'includes/dbConnect.php'; ?>

<?php $title = 'Scripture DB Add' ?>


<?php 
    if (isset($_POST['book'])){
        $db->exec('INSERT INTO scripture (book, chapter, verse, content)'
                . 'VALUES ("'.$_POST['book'].'", "'.$_POST['chapter'].'", "'.$_POST['verse'].'", "'.$_POST['content'].'")');
    }
    if (isset($_POST['newtopic'])) {
        $db->exec('INSERT INTO topics (name) values ("' . $_POST['newtopic'] . '")');
        
        $s_id = get_scripture_id($_POST['book'], $_POST['chapter'], $_POST['verse']);
        
        $t_id = get_topic_id($$_POST['newtopic']);
        
        $db->exec('INSERT INTO scripture2topic (topic_id, scripture_id) VALUES ('
                    . '"' . $t_id . '", '
                    . '"' . $s_id . '")');
    }
    
    if (isset($_POST['topic'])){
        var_dump($_POST['topic']);
        foreach ($_POST['topic'] as $cipot){
            
            $sid = get_scripture_id($_POST['book'], $_POST['chapter'], $_POST['verse']);
            
            $tid = get_topic_id($cipot);
           
            $db->exec('INSERT INTO scripture2topic (topic_id, scripture_id) VALUES ('
                    . '"' . $tid . '", '
                    . '"' . $sid . '")');
        }
        
    }
    
    
?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="rel w3-col s4 m4 l4">
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
                        <textarea rows="5" cols="70" name="content" class="w3-input" required="required"></textarea>
                        
                        <label>Topics:</label>
                        <ul class="w3-ul">
                        <?php 
                        foreach ($db->query('SELECT id, name FROM topics ORDER BY name ASC') as $topic) {
                            echo '<li><input type="checkbox" name="topic[]" value="'.$topic['name'].'" /> '.$topic['name'].'</li>';
                        }
                        ?>
                            <li><input type="checkbox" name="other" id="other" /> 
                                <input type="text" id="newtopic" name="newtopic" placeholder=" New Topic..." disabled=""/></li>
                        </ul>
                        <input type="submit" form="addScript" value="Add Scripture" class="w3-btn"/>
                        
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="rel w3-col s8 m8 l8">

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
                            foreach ($db->query('SELECT id, book, chapter, verse, content FROM scripture') as $row) {
                                echo '<li><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> <br/>"'
                                        . $row['content'] . '"'
                                        . '<ul class="w3-ul">';
                                foreach ($db->query('SELECT topic_id FROM scripture2topic WHERE scripture_id = "'.$row['id'].'"') as $tid) {
                                    foreach ($db->query('SELECT name FROM topics WHERE id = "'.$tid['topic_id'].'"') as $tpc) {
                                    echo '<li class="w3-blockquote">'.$tpc['name'].'</li>';
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
$('#other').change(function(){
   $("#newtopic").prop("disabled", !$(this).is(':checked'));
});
</script>