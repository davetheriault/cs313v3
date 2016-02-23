<?php include 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php //var_dump($_SESSION);     ?>
<?php confirm_logged_in(); ?>


<?php $title = 'Find Movies'; ?>
<?php include 'includes/js_functions.php'; ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">

        <div class="w3-col s12m8 l8">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">
                    Find Movies
                </h3>
                <div class="w3-container w3-padding">

                    <form class="w3-form" id="movieSearch">
                        <div class="w3-row">
                        <?php echo '<input class="w3-col s10 m10 l10 w3-input w3-btn w3-light-grey" type="text" placeholder="Search for titles containing..." name="find" id="find" onkeyup="showResults(this.value, '.$_SESSION['user_id'].')"/>'; ?>
                           
                        </div>
                    </form>
                </div>
                <?php // if (isset($_GET['find'])) { include 'includes/results.php'; } ?>
                <div id="results"></div>
            </div>
        </div>
        <div class="w3-col s12 m4 l4">
            <?php require 'includes/management.php'; ?>
        </div>        
        <div class="w3-col s12m8 l8">

        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>

<?php echo '<script>window.onload=showResults("", '.$_SESSION['user_id'].')</script>'; ?>