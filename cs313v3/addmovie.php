<?php $title = 'Add Movie'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-col l3">&nbsp;</div>
    <div class="w3-col l6">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">

            <h3 class="w3-red w3-padding w3-margin-0">Add Movie</h3>

            <div class="w3-padding" style="font-family: monospace;">
                <form id="addmovie" method="post" action="addmovie.php" class="w3-form" >
                    
                    <input class="w3-input" name="title" id="title" type="text" />
                    <label for="title">Movie Title:</label>
                    
                    <select class="w3-select" name="mpaa" id="mpaa">
                        <option disabled="disabled" selected>Select an option...</option>
                        <option value="G">G <img src="images/G.jpg" /></option>
                        <option value="PG">PG <img src="images/PG.jpg" /></option>
                        <option value="PG-13">PG-13 <img src="images/PG-13.jpg" /></option>
                        <option value="R">R <img src="images/R.jpg" /></option>
                    </select>
                    <label for="mpaa">Rating:</label>
                    
                    <input class="w3-input" type="time" name="runtime" id="runtime" />
                    <label for="runtime">Runtime:</label>
                    
                    <input class="w3-input" type="text" name="year" id="year" />
                    <label for="year">Release Year:</label>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>