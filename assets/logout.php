<?php
	session_start();
	session_destroy();
	header("location: /phpmessage/loginView.php");
?>