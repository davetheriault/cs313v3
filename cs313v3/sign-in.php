<?php require 'includes/session.php'; ?>
<?php include 'includes/dbConnect.php'; ?>
<?php
$error = '';
if (isset($_POST['sign-in'])) {
    $query = 'SELECT * FROM user WHERE username = "' . $_POST['sign-in-username'] . '"';
    $user = $db->prepare($query);
    $user->execute();
    $user->setFetchMode(PDO::FETCH_ASSOC);
    $usr = $user->fetchAll();


    $pass2 = crypt($_POST['sign-in-password'], CRYPT_BLOWFISH);
    
    echo '<br>pass2 = ' . $pass2;
    echo '<br>$usr[0]["password"] = ' . $usr[0]['password'];
    echo '<br>vardump';
    var_dump($usr[0]);
    var_dump($pass2);
    
    function attemptLog($pw1, $pw2) {
        echo '<br>AttemptLog Called';
        if ($pw1 === $pw2) {
            return TRUE;
        } else {
            return NULL;
        }
    }
    
    $login = attemptLog($pass2, $usr[0]['password']);

    if ($login == TRUE) {
        echo '<br>if login true started';
        $_SESSION["user_id"] = "id";
        $_SESSION["username"] = $_POST['sign-in-username'];
        header('Location: collection.php');
    } else {
        $error = 'Please provide valid login';
    }
}
?>
<?php include 'includes/header.php'; ?>

<h1 id="main-h1">Assignments</h1>

<?php echo $error; ?>

<h2>Sign In</h2>
<form id="sign-in-form" action="sign-in.php" method="post">
    <div class="form-group">
        <label for="sign-in-username">Username</label>
        <input type="text" class="form-control" name="sign-in-username" placeholder="Username">
    </div>
    <div class="form-group">
        <label for="sign-in-password">Password</label>
        <input type="password" class="form-control" name="sign-in-password" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-default" form="sign-in-form" value="Sign In" name="sign-in">
    </div>
</form>

<?php include 'includes/footer.php'; ?>