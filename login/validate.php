<?php
	session_start();
	if (!isset($_SESSION['email']) || !isset($_SESSION['access_level']) ) {
		header('Location: index.php');
	}
	
?>