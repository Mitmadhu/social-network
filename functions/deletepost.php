<?php
$conn=mysqli_connect("localhost" ,"root" ,"" ,"socialnetwork") or die(mysqli_connect_error());

if (isset($_GET['postid'])) {
	$postid = $_GET['postid'];

	$delete_post ="DELETE FROM POSTS WHERE postid='$postid'";
	$run=mysqli_query($conn,$delete_post);
	if($run){
		echo "<script>alert('post have been deleted')</script>";
		echo "<script>window.open('../home.php' ,'_self')</script>";
	}
	else{
		echo "<script>alert('post have not been deleted')</script>";
		echo "<script>window.open('../profile.php' ,'_self')</script>";
	}
}

?>