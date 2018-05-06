<nav class="top-nav">
	<div class="logo">
		<h1>Federation Servers</h1>
	</div>
	<div class="menu-items">
		<ul class="menu">
			<li class="menu-item">
				<a href="#" class="menu-link">Home</a>
			</li>
			<li class="menu-item">
				<a href="#" class="menu-link">Forum</a>
			</li>
			<li class="menu-item">
				<a href="#" class="menu-link">Support</a>
			</li>
		</ul>
	</div>
	<div class="button">

		<?php  
			if(isset($_SESSION['logedin'])) {
				echo "<p class='welcome'> Hello " . $_SESSION['user_username'] . " would you like to:   ";
				echo "<a href='logout.php'><button class='logout' id='logout'>Logout</button></a> </p>";
			} else {
				echo "
						<button class='login' id='login'>Login</button>
						<a href='register.php'><button class='register' id='register'>register</button></a>
					 ";
			}
		?> 
		
	</div>
</nav>

<div class="popupContainer" id="popupConatiner">
	<div class="popup" id="popup">
		<div class="popup-header">
			<h2 class="login-head">
				Login
			</h2>
		</div>
		<div class="popup-body">
			<form action="includes/actions/login.php" method="post">
				<input type="text" name="username" placeholder="Username or Password" autocomplete="off" value="">
				<input type="password" name="password" placeholder="Password" autocomplete="off" value="">
		</div>
		<div class="popup-footer">
				<input type="submit" value="Login" name="submit">
				<a href="register.php" class="register">Don't Have an Accout Register Now</a>
			</form>
		</div>
	</div>
</div>
<?php  

$username = '';
	if(isset($_SESSION['usernameEmpty'])) {
		$username = "<div class='error'>OOPS... You forgot to fill out your username</div>";
		unset($_SESSION['usernameEmpty']);
		session_destroy();
	} else if(isset($_SESSION['passwordEmpty'])) {
		$username = "<div class='error'>OOPS... You forgot to fill out your password</div>";
		unset($_SESSION['usernameEmpty']);
		session_destroy();
	} else if(isset($_SESSION['usernameIncorect'])) {
		$username = "<div class='error'>Username or Email is incorect</div>";
		unset($_SESSION['usernameIncorect']);
		session_destroy();
	} else if(isset($_SESSION['passwordIncorect'])) {
		$username = "<div class='error'>Your password is incorect</div>";
		unset($_SESSION['passwordIncorect']);
		session_destroy();
	} else if(isset($_SESSION['notConfirmed'])) {
		$username = "<div class='error'>You have not confirmed your account yet.</div>";
		unset($_SESSION['notConfirmed']);
		session_destroy();
	}

	echo $username;
?>