<?php
include "db.php";

if(isset($_POST['register'])){
	if(isset($_POST['firstname']) && $_POST['firstname'] != ""){
		$firstname = $_POST['firstname'];
		unset($_SESSION['error']['firstname']);
	}else{
		header("Location: /phpmessage/registerView.php");
		$_SESSION['error']['firstname'] = "Firstname is required";
	}

	if(isset($_POST['lastname']) && $_POST['lastname'] != ""){
		$lastname = $_POST['lastname'];
		unset($_SESSION['error']['lastname']);
	}else{
		header("Location: /phpmessage/registerView.php");
		$_SESSION['error']['lastname'] = "Lastname is required";
	}

	if(isset($_POST['email']) && $_POST['email'] != ""){
		$email = $_POST['email'];
		unset($_SESSION['error']['email']);
	}else{
		header("Location: /phpmessage/registerView.php");
		$_SESSION['error']['email'] = "Email is required";
	}

	$checkEmailExist = "SELECT `email` FROM `users` WHERE (email = '$email')";
	$result_email = mysqli_query($connect, $checkEmailExist);
	if(mysqli_num_rows($result_email) > 0){
		$row = mysqli_fetch_assoc($result_email);
		if($email === $row['email']){
			header("Location: /phpmessage/registerView.php");
			$_SESSION['error']['emailExist'] = "This Email already exist";
		}else{
			unset($_SESSION['error']['emailExist']);
		}
	}

	if(isset($_POST['password']) && $_POST['password'] != ""){
		$password = $_POST['password'];
		unset($_SESSION['error']['password']);
	}else{
		header("Location: /phpmessage/registerView.php");
		$_SESSION['error']['password'] = "Password is required";
	}

	if(isset($_POST['repassword']) && $_POST['repassword'] != ""){
		$repassword = $_POST['repassword'];
		unset($_SESSION['error']['repassword']);
	}else{
		header("Location: /phpmessage/registerView.php");
		$_SESSION['error']['repassword'] = "Confirm Password is required";
	}


	if($password != $repassword){
		header("Location: /phpmessage/registerView.php ");
		$_SESSION['error']['passwordConfirmation'] = "Password And Password Confirmation does not match";
	}else{
		unset($_SESSION['error']['passwordConfirmation']);
	}

	$gender = $_POST['gender'];
	$password = md5($password);

	if(!isset($_SESSION['error'])){
		$register = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender')";
		$result = mysqli_query($connect, $register);
		if($result){
			header("Location: /phpmessage/loginView.php");
		}
	}
}