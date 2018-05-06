<?php  	require_once "includes/header.inc.php"; 
		require_once 'includes/menu.php';
?>

<h1 class="headertxt">Register</h1>

<?php  
	$error = '';
	$username = "";
	$email = "";

	if(isset($_SESSION['postNotUsed'])) {
		$error = "<div class='error'>You did not use the submit button</div>";
		unset($_SESSION['postNotUsed']);
		session_destroy();
	}

	if(isset($_SESSION['usernameEmpty'])) {
		$error = "<div class='error'>OOPS.... You left your username empty!</div>";
		unset($_SESSION['usernameEmpty']);
		session_destroy();
	}

	if(isset($_SESSION['emailEmpty'])) {
		$error = "<div class='error'>OOPS.... You left your email empty!</div>";
		$username = $_SESSION['username'];
		unset($_SESSION['emailEmpty']);
		unset($_SESSION['username']);
		session_destroy();
	}

	if(isset($_SESSION['passwordEmpty'])) {
		$error = "<div class='error'>OOPS.... You left your password empty!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		unset($_SESSION['passwordEmpty']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		session_destroy();
	}

	if(isset($_SESSION['confirmPasswordEmpty'])) {
		$error = "<div class='error'>OOPS.... You forgot to confirm your password!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		unset($_SESSION['confirmPasswordeEmpty']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		session_destroy();
	}

	if(isset($_SESSION['usernameInvalid'])) {
		$error = "<div class='error'>You have used invalid characters for your username!</div>";
		$username = $_SESSION['usernameInvalid'];
		$email = $_SESSION['email'];
		unset($_SESSION['usernameInvalid']);
		unset($_SESSION['email']);
		session_destroy();
	}

	if(isset($_SESSION['emailInvalid'])) {
		$error = "<div class='error'>You have used invalid characters for your email!</div>";
		$email = $_SESSION['emailInvalid'];
		$username = $_SESSION['username'];
		unset($_SESSION['emailInvalid']);
		unset($_SESSION['email']);
		session_destroy();
	}

	if(isset($_SESSION['passwordmatch'])) {
		$error = "<div class='error'>Your passwords do not match!</div>";
		$email = $_SESSION['email'];
		$username = $_SESSION['username'];
		unset($_SESSION['passwordmatch']);
		unset($_SESSION['email']);
		unset($_SESSION['username']);
		session_destroy();
	}

	if(isset($_SESSION['emailExists'])) {
		$error = "<div class='error'>The email you have choses has been registered with us!</div>";
		$email = $_SESSION['emailExists'];
		$username = $_SESSION['username'];
		unset($_SESSION['emailExists']);
		unset($_SESSION['username']);
		session_destroy();
	}

	if(isset($_SESSION['usernameExists'])) {
		$error = "<div class='error'>The username you have choses has been registered with us!</div>";
		$username = $_SESSION['usernameExists'];
		$email = $_SESSION['email'];
		unset($_SESSION['usernameExists']);
		unset($_SESSION['email']);
		session_destroy();
	}

	echo $error;
?>

<form action="includes/actions/register.php" method="post" class="registerForm">
	<input type="text" placeholder="Username" name="username" id="username" class="inputRegister" value="<?php echo $username; ?>" autocomplete="off">
	<input type="email" placeholder="E-Mail" name="email" id="email" class="inputRegister" value="<?php echo $email ?>" autocomplete="off">
	<input type="password" placeholder="Password" name="password" id="password" class="inputRegister" value="<?php ?>" autocomplete="off">
	<input type="password" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" class="inputRegister" value="<?php ?>" autocomplete="off">
	<input type="submit" name="submit" value="register">
</form>
<?php require_once "includes/footer.inc.php"; ?>