<?php
/**
 * 
 */
class ForgetPassword
{
	private $conn;
	function __construct($conn)
	{
		$this->conn = $conn;
	}

	public function checkUserCredentials($email,$friendName){
		$userEmail = $email; 
		$userFriendName = $friendName;
		$checkuser = "SELECT * FROM USERS WHERE useremail= '$userEmail' AND recoveryaccount = '$userFriendName' limit 1";

		$run_query = mysqli_query($this->conn , $checkuser);

		$numRow = mysqli_num_rows($run_query);

		if($numRow){
			echo "<script>alert('user verified')</script>";
			echo "<script>window.open('changepassword.php','_self')</script>";
		}
		else{
			echo "<script>alert('user not verified !!try again')</script>";
			exit();
		}

	}

	public function changeExistingPassword($email,$password,$confirmPassword){
		$confirmUser = " SELECT * FROM USERS WHERE useremail = '$email' limit 1 ";
		$confirmRun = mysqli_query($this->conn,$confirmUser);
		$userArray = mysqli_fetch_array($confirmRun);
		$userid = $userArray['userid'];
		$userpassword=md5($password);

		if(mysqli_num_rows($confirmRun)){
			if($password === $confirmPassword){
                
                $updatePassword = mysqli_query($this->conn ,"UPDATE USERS SET userpass ='$userpassword' where userid = '$userid' limit 1");
                if($updatePassword){
                	echo "<script>alert('password change successfuly')</script>";
                	echo "<script>window.open('signin.php' ,'_self')</script>";
                	exit();
                }

                else{
                	echo "<script>alert('password not changed')</script>";
                }
			}
			else{
				echo "<script>alert('please enter same password in both new password and confirm password field')</script>";
			}
		}

		else{
			echo "<script>alert('no such user exist')</script>";
			echo "<script>window.open('index.php' ,'_self')</script>";
			}
	}
}

?>