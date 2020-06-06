<?php 
$comment = $_POST['sendComment'];
$postid = $_POST['postid'];

$dataReturn = array(
					'comment' => $comment,
					'post Id' => $postid
					);
/*print_r($dataReturn); // lekin ye shi way nai h bad practice*/

echo json_encode($dataReturn);// achaaaaaaa correct way for array

/*
echo "<div>
		<div>$comment</div>
		<div>$postid</div>
      </div>";
*/