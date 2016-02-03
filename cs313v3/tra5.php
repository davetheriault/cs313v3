<?php require 'includes/dbScrip3tureConnect.php'; ?>

<?php $title = 'Scripture DB Access' ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s4 m4 l4" style="line-height: 0.1;">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Search</h2>

                <div class="w3-container w3-padding-bottom-16" style="padding-top: 15px; padding-bottom: 15px;">
                    <form id="scriptureSearch" method="get" action="tra5.php" class="w3-container">
                        <h4>Find all entries for a certain book.</h4>
                            
                        <p>
                            <label>Book:</label>
                            <input class="w3-input" type="text" name="book" />
                        </p>
                        <p>
                            <button class="w3-btn w3-blue" type="submit" form="scriptureSearch">Find</button>
                        </p>

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
                        foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
                            echo '<li><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> <br/>"'
                            . $row['content'] . '"</li>';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>