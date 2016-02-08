<?php session_start(); ?>
<?php require_once 'includes/functions.php'; ?>
<?php
	//logout
	$_SESSION["user_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("login.php");
?>