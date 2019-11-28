<?php
include "db.php";

$email = $_POST['email'];
$password = $_POST['password'];

if($email == ""){
	header("Location: /phpmessage/loginView.php");
	$_SESSION['error']['email'] = "Email is required";
}else{
	unset($_SESSION['error']['email']);
}

if($password == ""){
	header("Location: /phpmessage/loginView.php");
	$_SESSION['error']['password'] = "Password is required";
}else{
	unset($_SESSION['error']['password']);
}

$password = md5($password);
$login = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' LIMIT 1 ";
$result = mysqli_query($connect, $login);

if($result->num_rows == 1){
	$user = mysqli_fetch_assoc($result);
	$_SESSION['userId'] = $user['id'];
	header("Location: /phpmessage/profile.php");
	unset($_SESSION['error']['invalid']);
}else{
	header("Location: /phpmessage/loginView.php");
	$_SESSION['error']['invalid'] = "Invalid email or password";
}