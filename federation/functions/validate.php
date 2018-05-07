<?php

function empty($username) {
	$user = $_SESSION['ok'] = "";
	if(empty($username)) {
		$_SESSION['usernameEmpty'] = $username;

		url("../../register.php?username=EMPTY?");
	} else if(empty($username)) {
		$_SESSION['usernameEmpty'] = $username;

		url("../../register.php?username=EMPTY?");
	} else if(empty($email)) {
		$_SESSION['emailEmpty'] = $email;
		$_SESSION['username'] = $username;

		url("../../register.php?email=EMPTY?");
	} else if(empty($password)) {
		$_SESSION['passwordEmpty'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;

		url("../../register.php?password=EMPTY?");
	}
} 