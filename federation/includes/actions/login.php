<?php 
session_start();
require_once "../../functions/header.php";
require_once "../../functions/escape.php";

if(isset($_POST['submit'])) {
	require_once '../../functions/db.php';

	$username = escape($_POST['username']);
	$password = escape($_POST['password']);

	if(empty($username)) {
		$_SESSION['usernameEmpty'] = $username;

		url("../../index.php#popupContainer?username=EMPTY?");
	} else if(empty($password)) {
		$_SESSION['passwordEmpty'] = $password;

		url("../../index.php#popupContainer?password=EMPTY?");
	} else {

		$username = mysqli_real_escape_string($connection, $username);
		$password = mysqli_real_escape_string($connection, $password);

		$sql = "SELECT * FROM users WHERE user_username = '$username' OR user_email = '$username'";
		$result = mysqli_query($connection, $sql);

		$resultCheck = mysqli_num_rows($result);

		if($resultCheck < 1) {
			$_SESSION['usernameIncorect'] = $username;

			url("../../index.php#popupContainer?usernameORemail=incorect?");
		} else {
			if($row = mysqli_fetch_assoc($result)) {
				$hash = password_verify($password, $row['user_password']);

				if($hash == false) {
					$_SESSION['passwordIncorect'] = $password;

					url("../../index.php#popupContainer?password=incorect?");
				} else {
					$sql = "SELECT * FROM users WHERE user_username = '$username' OR user_email = '$username'";
					$result = mysqli_query($connection, $sql);

					$resultCheck = mysqli_num_rows($result);

					while($row = mysqli_fetch_assoc($result)) {
						$confirmed = $row['user_confirmed'];
					}

					if($confirmed == 'not confirmed') {
						$_SESSION['notConfirmed'] = $username;

						url("../../index.php?user=notconfirmed");
					} else if($confirmed == 'confirmed') {
						if($hash == true) {

							$sql = "SELECT * FROM users WHERE user_username = '$username' OR user_email = '$username'";
							$result = mysqli_query($connection, $sql);

							$resultCheck = mysqli_num_rows($result);

							if($resultCheck > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									$_SESSION['user_id'] = $row['id'];
									$_SESSION['user_username'] = $row['user_username'];
									$_SESSION['user_email'] = $row['user_email'];
									$_SESSION['logedin'] = "loggedin";

									url("../../index.php?login=success?");
								}
							}
						}
					} 
				}
			}
		}
	}
} else {
	$_SESSION['noSubmit'] = $username;

	url("../../index.php#popupContainer?submit=erorr");
}