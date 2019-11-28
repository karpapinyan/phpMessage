<?php include ("db.php");

$userId = $_SESSION['userId'];
if(!$userId){
    header("location: loginView.php");
}

$data['success'] = false;
if(isset($_POST["update"])){

    if(isset($_POST['id']) )
    {
        $id = $_POST['id'];
    }

    if(isset($_POST['newtitle']) )
    {
        $newtitle = $_POST['newtitle'];
    }

    if(isset($_POST['newcontent']) )
    {
        $newcontent = $_POST['newcontent'];

    }

    $sql = "UPDATE posts SET title='$newtitle',content = '$newcontent'  WHERE id = '$id'";
    $post_updated = mysqli_query($connect, $sql) ;

}
if($post_updated) {
    $data['success'] = true;
}
echo json_encode($data);die;
?>


