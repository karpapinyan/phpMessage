<?php
include ("db.php");
$userId = $_SESSION['userId'];
if(!$userId){
    header("location: loginView.php");
}

$data['success'] = false;
if(isset($_GET['post_id'])){
    $id = $_GET['post_id'];
    $sql = "DELETE FROM `posts` WHERE id = '$id' AND user_id=$userId";
    $result1 = mysqli_query($connect, $sql);
    if($result1){
        $data['success'] = true;
    }
    echo json_encode($data);die;
}

?>