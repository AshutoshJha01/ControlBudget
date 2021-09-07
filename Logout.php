<?php 

	session_start();
	unset($_SESSION['log_in']);
	session_destroy();
	header('location:Login.php');
?>