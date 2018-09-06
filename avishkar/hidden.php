<?php
	session_start();

	if(!isset($_SESSION['loggedIn'])){
		header('Location: login.php');
		exit();
	}

?>

<a href="logout.php">Log Out</a> <br>
you are logged in!