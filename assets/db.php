<?php
session_start();
define("HOST", "localhost");
define("NAME", "root");
define("PASS", "");
define("DBNAME", "phpmessage");

$connect = mysqli_connect(HOST,NAME,PASS,DBNAME);
if(!$connect){
	echo "error";
}

?>