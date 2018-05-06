<?php  	require_once "includes/header.inc.php"; 
		require_once 'includes/menu.php';
?>
<?php  
	if(isset($_SESSION['logedin'])) {
		echo "<h1 class='h1'>You have logged in!</h1>";
	} 

	 if(isset($_SESSION['loggedout'])) {
		echo "<h1 class='h1'>You have logged out! Come back soon.</h1>";
	}
?>
<?php require_once "includes/footer.inc.php"; ?>