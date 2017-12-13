<?php require 'includes/session.php'; ?>

<?php $title = "Form Submission"; ?>

<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-col l2"></div>
    <div class=" w3-col l8">
        <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
            <h3 class="w3-red w3-padding w3-margin-0">Your info has been submitted</h3>
            <div class="w3-large w3-container w3-padding-xlarge">
                <p><span class="w3-text-grey">Name:</span> <?php echo $_POST['name']; ?></p>
                <p><span class="w3-text-grey">Email:</span> <?php echo $_POST['email']; ?></p>
                <p><span class="w3-text-grey">Major:</span> <?php echo $_POST['major']; ?></p>
                <p><span class="w3-text-grey">Places you have visited:</span> </p>
                <ul>
                    <?php
                    foreach ($_POST['places'] as $place) {
                        echo '<li>' . $place . '</li>';
                    }
                    ?>
                </ul>
                <p><span class="w3-text-grey">Comments: </span></p>
                <ul style="list-style-type: square;"><li><?php echo htmlentities($_POST['comments']); ?></li></ul>

            </div>
        </div>
    </div>

</main>
<?php include 'includes/footer.php'; ?>