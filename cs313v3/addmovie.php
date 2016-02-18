<?php $title = 'Add Movie'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-col l3">&nbsp;</div>
    <div class="w3-col l6">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">

            <h3 class="w3-red w3-padding w3-margin-0">Add Movie</h3>

            <div class="w3-padding">
                <form id="addmovie" method="post" action="addmovieconfirm.php" class="w3-form" >
                    <ul class="w3-ul">
                        <li>
                            <label for="title">Movie Title:</label>
                            <input class="w3-input" name="title" id="title" type="text" required />
                        </li>
                        <li>
                            <label for="mpaa">Rating:</label>
                            <select class="w3-select" name="mpaa" id="mpaa" required >
                                <option disabled="disabled" selected>Select an option...</option>
                                <option value="G">G <img src="images/G.jpg" /></option>
                                <option value="PG">PG <img src="images/PG.jpg" /></option>
                                <option value="PG-13">PG-13 <img src="images/PG-13.jpg" /></option>
                                <option value="R">R <img src="images/R.jpg" /></option>
                            </select>
                        </li>
                        <li>
                            <label for="runtime">Runtime:</label>
                            <input class="w3-input" type="time" name="runtime" id="runtime" />
                        </li>
                        <li>
                            <label for="year">Release Year:</label>
                            <input class="w3-input" type="text" name="year" id="year" required />
                        </li>
                        <li>
                            <select class="w3-select" name="genre[]" id="mpaa" required multiple >
                                <option disabled="disabled" selected>Ctrl+click to select multiple genres...</option>
                                
                            </select>
                        </li>
                        <li>
                            <input class="w3-btn w3-padding w3-green" type="submit" value="+Add Movie" form="addmovie" name="addsubmit"/>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>