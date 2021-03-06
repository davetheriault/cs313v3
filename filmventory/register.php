<?php include 'includes/session.php'; ?>
<?php // include 'password_compat/lib/password.php';  ?>
<?php require 'includes/dbConnect.php'; ?>
<?php require 'includes/functions.php'; ?>

<?php
$username = '';
if (isset($_POST['signup'])) {
    $query = 'SELECT username FROM user WHERE username = "' . $_POST['user'] . '"';
    $findUser = $db->prepare($query);
    $findUser->execute();

    $user_exists = $findUser->fetch();

    if ($user_exists['username'] == $_POST['user']) {
        $_SESSION['message'] = 'Username Not Available.';
    } else {

        if ($_POST['pass'] != $_POST['pass2']) {
            $_SESSION['message'] = 'Passwords do not match.';
        } else {

            $username = $_POST['user'];
            $password = $_POST['pass'];

            $hashed_pw = crypt($password, CRYPT_BLOWFISH);

            $db->exec('INSERT INTO user (username, password) VALUES ("' . $username . '", "' . $hashed_pw . '") ');

            $_SESSION['message'] = 'User created';

            redirect_to('login.php');

        }
    }
}
?>

<?php $title = 'Register'; ?>
<?php include 'includes/header.php'; ?>

<?php echo '<div class="w3-card-8">'.message().'</div>'; ?>

<main class="w3-container">
    <div class="w3-row">
        <div class="w3-col s1 m2 l4">&nbsp;</div>
        <div class="w3-col s10 m8 l4">
            <div class="w3-container w3-card-4 w3-white w3-padding-0 w3-margin">
                <h3 class="w3-red w3-padding w3-margin-0">Register</h3>

                <form id="userSignup" action="register.php" method="post" class="w3-container">

                    <p>
                        <label>Username:</label>
                        <input class="w3-input" type="text" name="user" required="required" value="<?php echo htmlentities($username) ?>"/>
                    </p>
                    <p>
                        <label>Password</label>
                        <input class="w3-input" type="password" name="pass" required="required"/>
                    </p>
                    <p>
                        <label>Confirm Password</label>
                        <input class="w3-input" type="password" name="pass2" required="required"/>
                    </p>

                    <p><input class="w3-input" name="signup" type="submit" value="Sign Up" form="userSignup"/> </p>
                    Already registered? <a href="login.php">Log In</a><br/>&nbsp;
                </form>
            </div>
        </div>
    </div>

</main>

<?php include 'includes/footer.php'; ?>