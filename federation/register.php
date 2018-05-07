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
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['usernameEmpty'])) {
		$error = "<div class='error'>OOPS.... You left your username empty!</div>";
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['emailEmpty'])) {
		$error = "<div class='error'>OOPS.... You left your email empty!</div>";
		$username = $_SESSION['username'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordEmpty'])) {
		$error = "<div class='error'>OOPS.... You left your password empty!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
	}

	if(isset($_SESSION['confirmPasswordEmpty'])) {
		$error = "<div class='error'>OOPS.... You forgot to confirm your password!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['usernameInvalid'])) {
		$error = "<div class='error'>You have used invalid characters for your username!</div>";
		$username = $_SESSION['usernameInvalid'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['emailInvalid'])) {
		$error = "<div class='error'>You have used invalid characters for your email!</div>";
		$email = $_SESSION['emailInvalid'];
		$username = $_SESSION['username'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordmatch'])) {
		$error = "<div class='error'>Your passwords do not match!</div>";
		$email = $_SESSION['email'];
		$username = $_SESSION['username'];
		session_unset();;
		session_destroy();
	}

	if(isset($_SESSION['emailExists'])) {
		$error = "<div class='error'>The email you have choses has been registered with us!</div>";
		$email = $_SESSION['emailExists'];
		$username = $_SESSION['username'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['usernameExists'])) {
		$error = "<div class='error'>The username you have choses has been registered with us!</div>";
		$username = $_SESSION['usernameExists'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['usernameInvalidLenght'])) {
		$error = "<div class='error'>The username you choose must be at least 6 characters!</div>";
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordNumber'])) {
		$error = "<div class='error'>Your password must contain at least one number!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordInvalidLenght'])) {
		$error = "<div class='error'>Your password must be at least 8 characters!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordNewmeric'])) {
		$error = "<div class='error'>Your password must contain letters!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordCaps'])) {
		$error = "<div class='error'>Your password must contain atleast one capital letter!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordLower'])) {
		$error = "<div class='error'>Your password must contain atleast one lowercase letter!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	if(isset($_SESSION['passwordSpecail'])) {
		$error = "<div class='error'>Your password must contain atleast one special character!</div>";
		$username = $_SESSION['username'];
		$email = $_SESSION['email'];
		session_unset();
		session_destroy();
	}

	echo $error;
?>

<form action="includes/actions/register.php" method="post" class="registerForm">
	<div class="inputWithIcon">
		<input type="text" placeholder="Username" name="username" id="username" class="inputRegister" value="<?php echo $username; ?>" autocomplete="off">
		<i class="fa fa-user fa-3x fa-fw" aria-hidden="true"></i>
	</div>
	<div class="inputWithIcon">
		<input type="email" placeholder="E-Mail" name="email" id="email" class="inputRegister" value="<?php echo $email ?>" autocomplete="off">
		<i class="fa fa-envelope fa-3x fa-fw" aria-hidden="true"></i>
	</div>
	<div class="inputWithIcon">
		<input type="password" placeholder="Password" name="password" id="password" class="inputRegister" value="" autocomplete="off">
		<i class="fa fa-lock fa-3x fa-fw" aria-hidden="true"></i>
	</div>
	<div class="inputWithIcon">
		<input type="password" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" class="inputRegister" value="" autocomplete="off">
		<i class="fa fa-lock fa-3x fa-fw" aria-hidden="true"></i>
	</div>
	<div class="inputWithIcon">
		<button type="submit" name="submit" value="register">Register</button>
	</div>
</form>
<?php require_once "includes/footer.inc.php"; ?>