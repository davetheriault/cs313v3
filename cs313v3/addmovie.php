<?php include 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>

<?php $title = 'Add Movie'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-row">
    <div class="w3col s0 m1 l2">&nbsp;</div>
    <div class="w3-col s12 m10 l8">
        <div class="w3-card-4 w3-white w3-padding-0 w3-margin">

            <h3 class="w3-red w3-padding w3-margin-0">Add Movie</h3>

            <div class="w3-padding">
                <form id="addmovie" method="post" action="addmovieconfirm.php" class="w3-form" >
                    <div class="w3-col s8 m8 l8">
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
                                <input class="w3-btn w3-padding w3-green" type="submit" value="+Add Movie" form="addmovie" name="addsubmit"/>
                            </li>
                        </ul>
                    </div>
                    <div class="w3-col s4 m4 l4">
                        <div class="w3-padding">
                            <select class="w3-select" name="genre[]" id="mpaa" required multiple style="height: 400px;" >
                                <option disabled="disabled" selected>Ctrl+click to select multiple genres...</option>
                                <?php
                                foreach ($db->query('SELECT name FROM genre') as $gnre) {
                                    echo '<option value="' . $gnre['name'] . '">' . $gnre['name'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                   
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>