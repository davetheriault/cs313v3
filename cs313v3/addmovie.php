<?php include 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php confirm_logged_in(); ?>
<?php $title = 'Add Movie'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-row">
    <div class="w3-row">

        <div class="w3-col s12m8 l8">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">Add Movie</h3>
                <div class="w3-container w3-padding">

                    <form id="addmovie" method="post" action="addmovieconfirm.php" class="w3-form" >
                        <div class="w3-col s12 m7 l7">
                            <div class="w3-padding">
                                <ul class="w3-ul">
                                    <li>
                                        <label for="title">Movie Title:</label>
                                        <input class="w3-input" name="title" id="title" type="text" required />
                                    </li>
                                    <li>
                                        <label for="mpaa">MPAA Rating:</label>
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
                                        <div class="w3-input">
                                            <input style="display: inline; width: 40px;" type="number" max="10" min="0" name="runtimeH" id="runtimeH" placeholder="00" oninput="addZero(this)" required/> h
                                            <input style="display: inline; width: 40px;" type="number" max="59" min="0" name="runtimeS" id="runtimeS" placeholder="00" oninput="addZero(this)" required/> m
                                        </div>

                                    </li>
                                    <li>
                                        <label for="year">Release Year:</label>
                                        <input class="w3-input" type="text" name="year" id="year" required />
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="w3-col s12 m5 l5">
                            <div class="w3-padding">
                                <ul class="w3-ul"><li>
                                        <label for="genre">Genre(s):</label>
                                        <select class="w3-select" name="genre[]" id="genre" required multiple style="height: 270px;" >
                                            <option disabled="disabled">Ctrl+click to select multiple genres...</option>
                                            <?php
                                            foreach ($db->query('SELECT name FROM genre') as $gnre) {
                                                echo '<option value="' . $gnre['name'] . '">' . $gnre['name'] . '</option>';
                                            }
                                            ?>
                                        </select></li>
                                </ul>
                            </div>
                        </div>
                        <ul class="w3-ul">
                            <li>
                                <input class="w3-btn w3-padding w3-green" type="submit" value="+Add Movie" form="addmovie" name="addsubmit"/>
                            </li>
                        </ul>


                    </form>

                </div>
            </div>
        </div>

        <div class="w3-col s12 m4 l4">
            <?php require 'includes/management.php'; ?>
            <a href="find.php" style="text-decoration: none;">
                <div class="w3-container w3-card-4 w3-deep-orange w3-hover-green w3-padding w3-margin" style="border-radius: 10px; text-align: center;">
                    <h3><i class="fa fa-plus"></i> Add From Database</h3>
                </div>
            </a>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>

<script>
    function addZero(input) {
        if (input.value < 10) {
            input.value = "0" + input.value;
        }
    }
    </script>