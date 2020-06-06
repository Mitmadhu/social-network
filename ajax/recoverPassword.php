<?php
require '../includes/connection.php';

$recoveryInfo = $_POST['sendNameViaPost'];
$userid =$_SESSION['userid'];

$insertFriend = mysqli_query($conn ,"UPDATE USERS SET recoveryaccount='$recoveryInfo' WHERE userid='$userid' limit 1") ;

if ($insertFriend) {
	echo "your friend name taken for password recovery";
}
else{
	echo "your friend name not taken for password recovery";
}


?>