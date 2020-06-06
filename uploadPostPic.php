<?php

//upload.php
	require 'includes/connection.php';

	$data = $_POST["image"];


	$image_array_1 = explode(";", $data);


	$image_array_2 = explode(",", $image_array_1[1]);

	$data = base64_decode($image_array_2[1]);

	$imageName = "images/postimages/".uniqid(). '.png';

	file_put_contents($imageName, $data);

/*	$query = $con->prepare("INSERT into posts (filepath,postedby) values(:imageName,:userLoggedIn)");
	$query->bindParam(":imageName", $imageName);
	$query->bindParam(":userLoggedIn", $userLoggedIn);
	$query->execute();
	$_SESSION['lastPostId'] = $con->lastInsertId();
	unset($_POST["image"]);*/


	// ajax code me echo se return hota h
	$_SESSION['image'] = $imageName;

	echo $imageName;