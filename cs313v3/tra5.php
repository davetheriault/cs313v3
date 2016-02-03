<?php require 'includes/dbScriptureConnect.php'; ?>

<?php $title = 'Scripture DB Access' ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s0 m0 l1" style="line-height: 0.1;">&nbsp;</div>
        <div class="rel w3-col s12 m12 l10">

            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h2 class="w3-red w3-padding w3-margin-0">Scriptures</h2>

                <div class="w3-container w3-padding-bottom-8">
                    <?php
                    foreach ($db->query('SELECT book, chapter, verse, content FROM scripture') as $row) {
                        echo '<div class="block"><strong>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "'
                        . $row['content'] . '"</div>';
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>