<?php
	//logout
	//session_start();
	$_SESSION["user_id"] = null;
	$_SESSION["username"] = null;
	redirect_to("login.php");
?>