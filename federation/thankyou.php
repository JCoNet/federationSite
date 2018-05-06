<?php require_once 'includes/header.inc.php'; ?>
<?php require_once 'functions/header.php'; ?>
<?php  
	$string = '';
	if(isset($_SESSION['thankyou'])) {
		$string = $_SESSION['username'];
		unset($_SESSION['username']);
		unset($_SESSION['thankyou']);
		session_destroy();
	} else if(!isset($_SESSION['thankyou'])) {
		url('index.php?invalidSession');
	}
?>

<div class="container">
	<div class="thanks-header">
		<h1 class="thanks">
			Thank you for registering with us!
		</h1>
	</div>
	<div class="thanks-body">
		Hello <?php echo $string; ?>, we are thrilled to hear that you have registered with us, but before you log in to your new account you need to check your email and activate your account. You can do this by clicking on the link and filling out the confirmation code inside the box.
	</div>
	<div class="thanks-footer">
		<a href="index.php" class="home">Go Home</a>
	</div>
</div>

<?php require_once 'includes/footer.inc.php'; ?>