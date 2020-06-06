<?php
include 'includes/headernew.php';
require_once 'app/bootstrap/init.php';
require 'classes/Posts.php';
$post = new Posts($userid, $conn);
if (isset($_POST['submitPost'])) {
	$image = $_SESSION['image'];
	$caption = $_POST['contents'];
	$post->insertPost($image, $caption);
	echo "<script>window.open('home.php', '_self')</script>";

}


if (!isset($_SESSION['userid'])) {
	header('Locatio:index.php' ,'_self');
}
/* */
?>

<!DOCTYPE html>
<html>
<head>
	<?php
        $user = $_SESSION['userid'];
        $userid = $_SESSION['userid'];
	    $get_user="SELECT * FROM USERS WHERE userid = $user LIMIT 1" ;
	    $run_user = mysqli_query($conn , $get_user);
	    $row = mysqli_fetch_array($run_user);
	    $username = $row['username'];

	?>
	<title><?php echo "$username" ; ?></title>

	
</head>
<body>
	<div class="row">
		<div id="insert_post" class="col-sm-12">
			<center>
				<form action="" method="POST" id="f" enctype="multipart/form-data">
					<div id="postPicHere">
						<input type="file" name="upload_image" size="32" id="upload_image" required="true" name="">
					</div>
					<br>
					<textarea class="form-control" id="content" rows="4" name="contents" placeholder="What's in your mind?">
					</textarea><br>
					<button id="btn-post" class="btn btn-success" name="submitPost">post</button>
				</form>
			</center>
		</div>
    </div>
		
	

	<div class="row">
		<div class="col-sm-12">
			<center><h2><strong>News Feed</strong></h2><br></center>
			<?php
			 	$post = new Posts($userid, $conn);
			 	$allPosts = $post->getAllPosts();
			 	echo "<div id='all-post-container'>
			 			$allPosts
			 		</div>";

			  ?>
		</div>
	</div>	
	<!-- ========= modal =========kya bol rhe======== -->
	<div id="uploadimageModal" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
		  		<div class="modal-header">
		    		<button type="button" class="close" data-dismiss="modal">&times;</button>
		  		</div>
		  		<div class="modal-body">
		    		<div class="row">
							<div class="col-md-8 text-center">
							  <div id="image_demo"></div>
							</div>
					</div>
		  		</div>
		  		<div class="modal-footer">
					 <button class="btn btn-success crop_image">Preview</button>
		    		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		  		</div>
			</div>
		</div>
	</div>
	
</body>
</html>
