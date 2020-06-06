<?php
include'includes/headernew.php';
include'classes/EditPostContent.php';

$obj = new EditPostContent($conn,$_GET['postid']);

if (!isset($_SESSION['userid'])) {
	header('Location:index.php' ,'_self');
}

if(isset($_POST['editpostsubmit'])){
	$obj->postContentUpdate();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Post</title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>
<body>
	

	<form action="#" method="POST">
		<center><h2>edit post</h2></center>
		<textarea class="form-control" id="edit-content" name="content"><?php
			if(isset($_GET['postid'])){
			 echo $obj->getPost(); 
			}
		?></textarea>
		 <button class="btn btn-primary" name="editpostsubmit" id="editpostsubmit">Update post</button>
	</form>

</body>
</html>