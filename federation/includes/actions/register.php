<?php
session_start();
require_once "../../functions/header.php";
require_once "../../functions/escape.php";

if(isset($_POST['submit'])) {
	require_once '../../functions/db.php';

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

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

		url("../../index.php?confirmPassword=EMPTY?");
	}
} else if(!isset($_POST['submit'])) {
	$_SESSION['postNotUsed'] = "not post";

	url("../../index.php?you_did_not_use_the_submit_button?");
}