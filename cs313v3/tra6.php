<?php require 'includes/dbConnect.php'; ?>

<?php $title = 'Scripture DB Add' ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="rel w3-col s4 m4 l4">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Add a Scripture</h2>
                <div class="w3-container w3-padding-bottom-16" style="padding-top: 15px; padding-bottom: 15px;">
                    
                    <form id="addScript" method="post" action="tra6.php">
                        <label>Book:</label>
                        <input class="w3-input" type="text" name="book" />
                        
                        <label>Chapter:</label>
                        <input type="number" class="w3-input" name="chapter" />
                        
                        <label>Verse:</label>
                        <input type="number" class="w3-input" name="verse" />
                        
                        <label>Content:</label>
                        <textarea rows="9" cols="70" name="content" class="w3-input"></textarea>
                        
                        <label>Topics:</label>
                        <?php 
                        foreach ($db->query('SELECT name FROM topics ORDER BY name ASC') as $topic) {
                            echo '<input type="checkbox" name="topic" value="'.$topic.'" />'.$topic.'<br/>';
                        }
                        ?>
                        
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
                            foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
                                echo '<li><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> <br/>"'
                                . $row['content'] . '"</li>';
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