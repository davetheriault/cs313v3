<?php include 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>
<?php include 'includes/functions.php'; ?>
<?php //var_dump($_SESSION);  ?>
<?php confirm_logged_in(); ?>
<?php $title = 'Welcome ' . $_SESSION['username'] . '!';
s ?>
<?php include 'includes/header.php'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s1 m2 l4">&nbsp;</div>
        <div class="w3-col s10 m8 l4">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0"><?php echo $_SESSION['username']; ?>&apos;s Movie Collection</h3>

                
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>