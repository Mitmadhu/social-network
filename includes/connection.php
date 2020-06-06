<?php
$conn=mysqli_connect("localhost" ,"root" ,"" ,"socialnetwork");
if($conn){
	//echo "connection successful";
	date_default_timezone_set("Asia/Kolkata");
	// india khojo
	session_start();
}
else{
	die("connection unscessful because " . mysqli_connect_error());
}