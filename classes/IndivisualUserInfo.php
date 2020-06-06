<?php
/**
 * 
 */
class IndivisulaUserInfo
{
	private $conn ,$userId ,$resultData="";

	function __construct($conn,$userId)
	{
		$this->conn = $conn;
		$this->userId = $userId;
	}

	public function getUserAllInfo(){
		$returnUser="";

		$userData = mysqli_query($this->conn,"SELECT * FROM USERS WHERE userid=$this->userId LIMIT 1");
		$userResult = mysqli_fetch_array($userData);
		$fullName = $userResult['firstname']." ".$userResult['lastname'];
		$describeUser = $userResult['describeuser'];
		$relationshipStatus = $userResult['relationship'];
		$userCountry =$userResult['usercountry'];
		$userImageSrc = $userResult['userimage'];
		$userRegDate = $userResult['user_reg_date'];
		$userBirhtday = $userResult['userbirthday'];
		$newDate = date("d-m-Y", strtotime($userBirhtday));

		$returnUser="<div class='user-container'>
		       <center><h3>user information</h3></center>
		       <div class='user-info-1'>
		           <div class='user-profile-img'>
		               <img src='usersprofiles/$userImageSrc'>
		           </div>
		           <div class='user-content'>
		               <div class='info'>Name:$fullName</div>
		               <div class='info'>Description:$describeUser</div>
		               <div class='info'>Relationship status:$relationshipStatus</div>
		               <div class='info'>Country:$userCountry</div>
		               <div class='info'>Joining date:$userRegDate</div>
		               <div class='info'>Born in:$newDate</div>
		           <div>
		       </div>
		     </div>";

		     return $returnUser;

	}

	public function getUserAllPost(){

		$userPost = mysqli_query($this->conn ,"SELECT * FROM POSTS WHERE userid = $this->userId ORDER BY postid desc limit 5");
		if (mysqli_num_rows($userPost)==0) {
			echo "<script>alert('no post to display')</script>";
		}
		$returnPost="";

		while($resultPost = mysqli_fetch_array($userPost)){
			$postContent = $resultPost['postcontent'];
			$uplaodImageSrc = $resultPost['uploadimage'];
			$postDate = $resultPost['postdate'];

			$returnPost.= "<div class='container-for-post'>
					          <div class='post-image-of-user'>
					              <img src='$uplaodImageSrc'>
					          </div>
					          <div class='post-content-of-user'>
					              <span>$postContent</span><br>
					              <span>$postDate</span>
					          </div>
			              </div>";
		}
		return $returnPost;
	}

	/*public function setForgetPasswordOption(){ //implemented using j query
		$contentData = $_POST['content'];

		if(strlen($contentData)>1){
			$setQuery=mysqli_query($this->conn , "UPDATE USERS SET recoveryaccount = '$contentData' where userid =$this->userId limit 1");

			if ($setQuery) {
				echo "<script>alert('your friend name taken for your acount recovery')</script>";
			}
			else{
				echo "<script>alert('recovery account info not given')</script>";
			}
		}

		else{
			echo "<script>alert('please enter some name')</script>";
		}
	}*/

	public function editProfileInfo(){
		$firstName = ucfirst($_POST['first']);
		$lastName = ucfirst($_POST['last']);
		$userName = strtolower($_POST['uname']);
		$userDescription = $_POST['description'];
		$relationshipStatus = $_POST['relationship'];
		$userPassword =md5($_POST['password']);
		$userCountry = $_POST['country'];
		$userGender = $_POST['gender'];
		$userBirhtday = $_POST['birthdate'];

		$firstNameError =true;
		$lastNameError =true;
		$userNameError =true;
		$userEmailError =true;
		$passwordLengthError=true;

		

		if (strlen($_POST['password']) <8) {
			$passwordLengthError = false;
			echo "<script>alert('password should be of minimum 8 character long')</script>";
			echo "<script>window.open('home.php' , '_self')</script>";
			exit();
		}


		if(($firstNameError) and ($lastNameError) and ($userNameError) and ($userEmailError) and ($passwordLengthError)){

			$updateProfileQuery = "UPDATE USERS SET firstname='$firstName' , lastname='$lastName' ,
			username ='$userName' , describeuser='$userDescription' , relationship='$relationshipStatus'
			,userpass ='$userPassword', usercountry='$userCountry' ,usergender ='$userGender' ,userbirthday ='$userBirhtday' where userid='$this->userId' limit 1 ";
			$run_query = mysqli_query($this->conn,$updateProfileQuery);
			if ($run_query) {
			 echo "<script>alert('your profile updated')</script>";
			 echo "<script>window.open('home.php' , '_self')</script>";
			}
		}
	}



	
}

?>