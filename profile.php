<?php

include 'includes/headernew.php';
include 'classes/Posts.php';
include 'classes/Users.php';

$post = new Posts($userid, $conn);


if (!isset($_SESSION['userid'])) {
	header('Locatio:index.php' ,'_self');
}
?>

<!DOCTYPE html>
<html>
<head>
	<?php
	$user = new Users($conn, $_SESSION['userid']);
	 
	?>
	<title><?php echo $user->getUsername();?></title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
	


</head>
<body>
		<!-- <div class="col-sm-2">
			kro apne se 
		</div> -->
			<?php  /* ye sb variable kha se aa rha h ye sb header me h*/
                 
			echo $post->getCoverPhoto();
            //update cover image

            if (isset($_POST['submit'])) {

            	$user->updateCover();
            	exit();
            }


            //update profile image


            if (isset($_POST['update'])) {
            	$user-> updateProfilePic();
            	exit();

            }

            if (isset($_POST['update-cover'])) {
            	$user-> updateCoverPic();
            	exit();

            }


			?>
			
    </div>
    	
	<div class="tab-container design">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			  <li class="nav-item">
			    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#video" role="tab" aria-controls="home" aria-selected="true">Posts</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#about" role="tab" aria-controls="profile" aria-selected="false">About</a>
			  </li>
			</ul>

			<div class="tab-content" id="myTabContent">
			  <div class="tab-pane fade show active" id="video" role="tabpanel" aria-labelledby="home-tab">
			  	<!---display user posts-------->
			  	<?php 
			  		if(isset($_GET['uid'])){
			  			$uid = $_GET['uid'];
			  		}
			  		echo $post->getPosts();

			  		include 'functions/deletepost.php';

			  	 ?>
			  </div>
			  <div class="tab-pane fade" id="about" role="tabpanel" aria-labelledby="profile-tab">
			  	
	  			<?php
	  			 $userBirthDate = new DateTime($userbirthday);
	  			 $date = $userBirthDate ->format('M j Y');
	  			 $dt = new DateTime($user_reg_date);
                 $userRegDate= $dt->format('M j Y');
	  	            echo"<div class='about-container'>
	  	                    <div class='about-info-of-user'>
		  		                <p id='content1'>About<p><hr>
		  		                 <p>$firstname $lastname</p>
		  		                 <p>$describeuser</p>
		  		                 <p>Relationship status:&nbsp $relationship</p>
		  		                 <p>Lives In:&nbsp $usercountry</p>
		  		                 <p>Member since:&nbsp $userRegDate</p>
		  		                 <p>Gender:&nbsp $usergender</p>
		  		                 <p>Date Of Birth:&nbsp $date</p>
	  	                     </div>
	  	                  </div>   ";
	  			?>
			  </div>
			</div>
		</div>

   </div>
</div>
<script>
	$(document).ready(function(){
		$('#home-tab').click(); // auto click on post tab on load

		$('#detect-click').on('click', function(){
			$('#changepic').click();
		});
		
		$('#changepic').on('change', function(){
			$('#btnprofile').click();
			// aya samaj me ? bhut achha se krte ho

		});

		$("#cover-photo").on('change', function(){
			$("#update-cover").click();
		});
		// js bs cick krne ka kkam kr rha h haa achha h change event h na wo photo change ho rha to btn automatic click ho rha? label kyo hota h usse click ho rha h
	});
</script>
<script src="javascript/app.js"></script>
</body>
</html>




