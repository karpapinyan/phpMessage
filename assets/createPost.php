<?php

include "db.php";
 $userId = $_SESSION['userId'];


if(isset($_POST['title']) && $_POST['title'] != ""){
	$title = $_POST['title'];
	unset($_SESSION['error']['title']);
}else{
	header("Location: /phpmessage/postView.php");
	$_SESSION['error']['title'] = "Title is required";
}

if(isset($_POST['content']) && $_POST['content'] != ""){
	$content = $_POST['content'];
	unset($_SESSION['error']['content']);
}else{
	header("Location: /phpmessage/postView.php");
	$_SESSION['error']['content'] = "Content is required";
}

if(!isset($_SESSION['error'])){
	$createPost = "INSERT INTO `posts` (`user_id`, `title`, `content`) VALUES ('$userId', '$title', '$content')";
	$result = mysqli_query($connect, $createPost);
	if($result){
		header("Location: /phpmessage/postView.php");
	}
}