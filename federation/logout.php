
<?php  
	require_once 'functions/header.php';
	session_start();
	if(isset($_SESSION['logedin'])) {
		session_unset();
		session_destroy();
		$_SESSION['loggedout'] = 'logout';

		url('index.php');
	}
?>