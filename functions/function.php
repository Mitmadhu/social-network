<?php

//function to insert post in post table

$fileTypeError="";

function insertPost($conn ,$userid){
	$contentLengthError = "";
	$conn = $conn;
	$userid = $userid;
	if (isset($_POST['sub'])) {
		$content = $_POST['contents'];
		$upload_image =$_FILES['upload_image']['name'];
		$type =pathinfo($upload_image, PATHINFO_EXTENSION);
		if($upload_image==""){
			echo "<script>alert('please select some image')</script>";
			echo "<script>window.open('home.php','_self')</script>";
		}
		if(strlen($content)>250){
            echo "<script>alert('please use 250 or less than 250 characters.')</script>";
            $contentLengthError="error";
			echo "<script>window.open('home.php','_self')</script>";
			exit();
		}
		if(empty($content)){
            echo "<script>alert('please enter some text in text area')</script>";
            $contentLengthError="error";
			echo "<script>window.open('home.php','_self')</script>";
			exit();
		}

		if ($type == 'png' or $type == 'jpeg' or $type=='jpg') {
			$fileTypeError="";
		}

		else{
			$fileTypeError="error";
			echo "<script>alert('image should be jpg or png or jpeg')</script>";
			echo "<script>window.open('home.php','_self')</script>";
			exit();

		}
		if(!$fileTypeError and !($contentLengthError)){
			$upload_image = uniqid().$upload_image;
			$upload_imagetmp =$_FILES['upload_image']['tmp_name'];
			move_uploaded_file($upload_imagetmp, "imagepost/$upload_image");

			$insert = "INSERT INTO POSTS (userid , postcontent , uploadimage ,postdate) VALUES('$userid' ,'$content' ,'$upload_image' ,NOW())";

			$run = mysqli_query($conn , $insert);
			if($run){
				 echo "<script>alert('your post updated a moment ago.')</script>";
				 $update ="UPDATE USERS SET posts='yes' where userid ='$userid'";
				 $run=mysqli_query($conn,$update);
				 echo "<script>window.open('home.php' ,'_self')</script>";
				 exit();
			}

			else{
				 echo "<script>alert('error while uploading.')</script>";
				 echo "<script>window.open('home.php' ,'_self')</script>";
			}
		}


	}
}
