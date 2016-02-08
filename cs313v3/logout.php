<?php session_start(); ?>
<?php require_once 'includes/functions.php'; ?>
<?php
	//logout
	$_SESSION["user_id"] = NULL;
	$_SESSION["username"] = NULL;
        var_dump($_SESSION);
        redirect_to("login.php");
?>