<?php
include ("db.php");

$result = [
    "error" => false,
    "message" => 'Email is free',
];
if(isset($_GET['email']) && $_GET['email'] != "") {
   $email = $_GET['email'];

   $check = "SELECT * FROM `users` WHERE email = '$email' LIMIT 1 ";
   $res = mysqli_query($connect, $check);
}

if($res->num_rows == 1 ){
    $result = [
        "error" => true,
        "message" => 'Email is beasy',
    ];
}

echo json_encode($result);

