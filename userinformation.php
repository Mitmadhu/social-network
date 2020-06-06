
<!DOCTYPE html>
<html>
<head>
	<title>user profile page</title>
</head>
<link rel="stylesheet" type="text/css" href="css/homestyle.css">
<body>

</body>
</html>
<?php
 include 'includes/headernew.php';
 include 'classes/IndivisualUserInfo.php';
 if(!isset($_SESSION['userid'])){
 	header('Location:index.php');
 }
 $userid = $_GET['userid'];
 $IndivisulaUserInfoObj = new IndivisulaUserInfo($conn ,$userid);
 $returnUser=$IndivisulaUserInfoObj->getUserAllInfo();
 $dataReturn=$IndivisulaUserInfoObj->getUserAllPost();

 echo "<div id='post-container'>
          <div>
          	$returnUser
          	</div>
          	<div>
          	<center><h3 class='user-post-head'>User Posts</h3></center><hr>
          $dataReturn
          	</div>
       </div>";
 
  ?>

