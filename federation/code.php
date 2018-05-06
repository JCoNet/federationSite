<?php  
	require_once "includes/header.inc.php"; 
	$string = "";
	if(isset($_SESSION['success'])) {
		session_unset();
		session_destroy();
	}
	if(isset($_POST['submit'])) {
		require_once "functions/header.php";
		require_once "functions/escape.php";
		require_once 'functions/db.php';

		$code = escape($_POST['confirmation']);

		if(empty($code)) {
			echo "<div class='error'>OOPS... you didn't fill out the code.</div>";
		} else {
			$sql = "SELECT * FROM users WHERE user_confirmation_code = '$code'";
			$result = mysqli_query($connection, $sql);

			$resultCheck = mysqli_num_rows($result);

			while ($row = mysqli_fetch_assoc($result)) { 
				$code = $row['user_confirmation_code'];
				$id = $row['id'];
			}

			if($resultCheck < 1) {
				echo "<div class='error'>OOPS... you didn't use the correct code.</div>";
			} else {
				$sql = "UPDATE users SET user_confirmed = 'confirmed' WHERE id = '$id'";
				mysqli_query($connection, $sql);

				$_SESSION['success'] = "success";
			}
		}
	}
?>
	<?php  
		if(isset($_SESSION['success'])) {
			require_once 'includes/menu.php';
			require_once "includes/footer.inc.php";
		} else {
			echo "
					<div class='code-container'>
						<form action='code.php' class='code' method='post'>
							<div class='code-header'>
								<h2><strong>Enter your confirmation code</strong></h2>"
								 . $string .
							"</div>
							<input type='text' value='FS - ' name='confirmation'>
							<input type='submit' name='submit'' value='Confirm'>
						</form>
					</div>
				 ";
		}
	?>
</body>
</html>