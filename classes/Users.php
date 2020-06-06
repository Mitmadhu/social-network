<?php 

/**
 * 
 */
class Users
{
	private $uid, $sqlData, $conn;
	function __construct($conn, $user)
	{
		$get_user = "SELECT * FROM USERS WHERE userid='$user'";
		$run_user = mysqli_query($conn , $get_user);
		$this->sqlData = mysqli_fetch_array($run_user);
		$this->uid = $this->sqlData['userid'];
		$this->conn = $conn;
		
	}

	public function getUsername()
	{
		return $this->sqlData['username'];
	}

	public function updateCover()
	{
    	
    	$u_cover = $_FILES['u_cover']['name'];
    	
    	if ($u_cover=='') {
    		echo "<script>alert('please select cover image')</script>";
    		echo "<script>window.open('profile.php?uid=$this->usid' , '_self')</script>";
    		exit();
    	}

    	else{
    		
		    if(!$this->fileTypeError($u_cover)){

		    	$u_cover = uniqid(). $u_cover;
		    	$u_covertmp = $_FILES['u_cover']['tmp_name'];

		    	move_uploaded_file($u_covertmp, "cover/$u_cover");

		    	$update ="UPDATE users set usercover='$u_cover' where userid='$this->uid'" ;
		    	$run_query = mysqli_query($this->conn,$update);

		       if($run_query){
		        echo '<script>
		               alert("your cover photo updated");
		              </script> ';
		              echo "<script>window.open('profile.php?uid=$this->uid' ,'_self')</script>"; 
		       }
		       else{
		        echo '<script>
		               swal("something wrong", "...not updated!!!");
		              </script>';
		              echo "<script>window.open('profile.php?$this->uid' ,'_self')</script>"; 
		       }
                
		    }
		    else{
		    	echo '<script>
		    	       alert("file type must be jpg or jpeg or png");
		    	      </script> ';
		    }

    	}
	}
	public function updateProfilePic(){
         $u_image = $_FILES['u_image']['name'];
    	
    	if ($u_image=='') {
    		echo "<script>alert('please select cover image')</script>";
    		echo "<script>window.open('profile.php?uid=$this->uid' , '_self')</script>";
    		exit();
    	}

    	else{
    		
		    if(!$this->fileTypeError($u_image)){

		    	$u_image = uniqid(). $u_image;
		    	$u_imagetmp = $_FILES['u_image']['tmp_name'];

		    	move_uploaded_file($u_imagetmp, "usersprofiles/$u_image");

		    	$update ="UPDATE users set userimage='$u_image' where userid='$this->uid'" ;
		    	$run_query = mysqli_query($this->conn,$update);

		       if($run_query){
		        echo '<script>
		               alert("your profile photo updated");
		              </script> ';
		              echo "<script>window.open('profile.php?uid=$this->uid' ,'_self')</script>"; 
		       }
		       else{
		        echo '<script>
		               swal("something wrong", "...not updated!!!");
		              </script>';
		              echo "<script>window.open('profile.php?uid=$this->uid' ,'_self')</script>"; 
		       }
                
		    }
		    else{
		    	echo '<script>
		    	       alert("file type must be jpg or jpeg or png");
		    	      </script> ';

		    }


    	}
    }
    
	public function updateCoverPic(){
         $u_image = $_FILES['coverPhoto']['name'];
    	
    	if ($u_image=='') {
    		echo "<script>alert('please select cover image')</script>";
    		echo "<script>window.open('profile.php?uid=$this->uid' , '_self')</script>";
    		exit();
    	}

    	else{
    		
		    if(!$this->fileTypeError($u_image)){

		    	$u_image = uniqid(). $u_image;
		    	$u_imagetmp = $_FILES['coverPhoto']['tmp_name'];

		    	move_uploaded_file($u_imagetmp, "cover/$u_image");

		    	$update ="UPDATE users set usercover='$u_image' where userid='$this->uid'" ;
		    	$run_query = mysqli_query($this->conn,$update);

		       if($run_query){
		        echo '<script>
		               alert("your cover photo updated");
		              </script> ';
		              echo "<script>window.open('profile.php?uid=$this->uid' ,'_self')</script>"; 
		       }
		       else{
		        echo '<script>
		               swal("something wrong", "...not updated!!!");
		              </script>';
		              echo "<script>window.open('profile.php?uid=$this->uid' ,'_self')</script>"; 
		       }
                
		    }
		    else{
		    	echo '<script>
		    	       alert("file type must be jpg or jpeg or png");
		    	      </script> ';

		    }


    	}
    }
    
    private function fileTypeError($u_image){

		$type = pathinfo($u_image, PATHINFO_EXTENSION);
	    if ($type == 'jpg' or $type == 'png' or $type == 'jpeg') {
	    	return  false;
	    }
	    return true;

    }
}