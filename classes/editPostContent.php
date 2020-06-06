<?php
/**
 * 
 */
class EditPostContent
{
	private $conn ,$postId;
	function __construct($conn,$postId)
	{
		$this->conn = $conn;
		$this->postId = $postId;
	}

	public function getPost(){
		$postId = $this->postId;
		$get_post ="SELECT * FROM POSTS WHERE postid = '$postId'";
		$run_post = mysqli_query($this->conn, $get_post);
		$postData = mysqli_fetch_array($run_post);
		$postContent = $postData['postcontent'];
		return $postContent;
	}

	public function postContentUpdate(){
		
		$postContent = $_POST['content'];
		$postId = $this->postId;
		$update_postcontent = "UPDATE POSTS SET postcontent='$postContent' where postid = '$this->postId'";
		$run_update = mysqli_query($this->conn , $update_postcontent);
		if ($run_update) {
			echo "<script>alert('post updated')</script>";
			echo "<script>window.open('home.php','_self')</script>";

		}
		else{
			echo "<script>alert('post not updated')</script>";
		}
	}
}



?>