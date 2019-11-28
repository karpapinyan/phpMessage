<?php
include ("db.php");
$userId = $_SESSION['userId'];
if(!$userId){
    header("location: loginView.php");
}

 	$data['success'] = false;
    $id = $_POST['id'];
    $content = $_POST['content'];
    $sql = "INSERT INTO `messages` (`user_id`, `user2_id`, `content`) VALUES ('$userId', '$id', '$content')";
    $result1 = mysqli_query($connect, $sql);
    if($result1){
        $data['success'] = true;
    }
    echo json_encode($data);die;
 


?>