<?php
session_start();
require_once "../../functions/header.php";
require_once "../../functions/escape.php";

if(isset($_POST['submit'])) {
	require_once '../../functions/db.php';

	$username = escape($_POST['username']);
	$email = escape($_POST['email']);
	$password = escape($_POST['password']);
	$confirmPassword = escape($_POST['confirmPassword']);

	if(empty($username)) {
		$_SESSION['usernameEmpty'] = $username;

		url("../../index.php?username=EMPTY?");
	} else if(empty($email)) {
		$_SESSION['emailEmpty'] = $email;
		$_SESSION['username'] = $username;

		url("../../index.php?email=EMPTY?");
	} else if(empty($password)) {
		$_SESSION['passwordEmpty'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;

		url("../../index.php?password=EMPTY?");
	} else if(empty($confirmPassword)) {
		$_SESSION['confirmPasswordEmpty'] = $confirmPassword;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;

		url("../../index.php?confirmPassword=EMPTY?");
	} else if(!preg_match("/^[a-zA-Z]*$/", $username)) {
		$_SESSION['usernameInvalid'] = $username;
		$_SESSION['email'] = $email;

		url("../../index.php?username=invalid?");
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['emailInvalid'] = $email;
		$_SESSION['username'] = $username;

		url("../../index.php?email=invalid?");
	} else if($password != $confirmPassword) {
		$_SESSION['passwordmatch'] = $password;
		$_SESSION['email'] = $email;
		$_SESSION['username'] = $username;

		url("../../index.php?passwords=noMatch?");
	} else {
		$sql = "SELECT * FROM users WHERE user_username = '$username'";

		$result = mysqli_query($connection, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			$_SESSION['usernameExists'] = $username;
			$_SESSION['email'] = $email;

			url("../../index.php?username=exists?");
		} else {

		$sql = "SELECT * FROM users WHERE user_email = '$email'";

		$result = mysqli_query($connection, $sql);
		$resultCheck = mysqli_num_rows($result);

		if($resultCheck > 0) {
			$_SESSION['emailExists'] = $email;
			$_SESSION['username'] = $username;

			url("../../index.php?username=exists?");
		} else {
			$username = mysqli_real_escape_string($connection, $username);
			$email = mysqli_real_escape_string($connection, $email);
			$password = mysqli_real_escape_string($connection, $password);

			$hash = password_hash($password, PASSWORD_DEFAULT);

			$date = date('d - m - Y');

			$rand = 'FS - ' . confcode(100000, 999999);

			$conf = 'not confirmed';


			$sql = "INSERT INTO users (user_username, user_email, user_password, user_joined, user_confirmation_code, user_confirmed) VALUES ('$username', '$email', '$hash', '$date', '$rand', '$conf');";
			mysqli_query($connection, $sql);

			$_SESSION["thankyou"] = 'thanks';
			$_SESSION['username'] = $username;
			url('../../thankyou.php');
		}
	}
}

} else if(!isset($_POST['submit'])) {
	$_SESSION['postNotUsed'] = "not post";

	url("../../index.php?you_did_not_use_the_submit_button?");
}