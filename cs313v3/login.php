<?php include 'includes/session.php'; ?>
<?php require 'includes/functions.php'; ?>
<?php require 'includes/dbConnect.php'; ?>
<?php 
$username = '';
if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $found_user = attempt_login($username, $password);
    
    if ($found_user) {
        //successful login
        //echo '<br/>Redirect Login Success';
        redirect_to(collection.php);
    } else {
        //failed login
        $_SESSION['message'] = 'Username / Password Do Not Match';
    }
    
}
?>

<?php $title = 'Login'; ?>
<?php include 'includes/header.php'; ?>

<?php echo message(); ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s1 m2 l4">&nbsp;</div>
        <div class="w3-col s10 m8 l4">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">Log In</h3>

                <form id="userLogin" action="login.php" method="post" class="w3-container">
                    
                        <p>
                            <label>Username:</label>
                            <input class="w3-input" type="text" name="user" required="required" value="<?php echo htmlentities($username) ?>"/>
                        </p>
                        <p>
                            <label>Password</label>
                            <input class="w3-input" type="password" name="pass" required="required"/>
                        </p>
                    

                    <p><input class="w3-input" name="login" type="submit" value="Log In" form="userLogin"/> </p><br>
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>