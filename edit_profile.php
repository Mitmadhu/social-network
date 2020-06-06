<?php   
include 'includes/headernew.php';
include 'classes/IndivisualUserInfo.php';
$IndivisulaUserInfoObj = new IndivisulaUserInfo($conn,$userid);

if(!isset($_SESSION['userid'])){
  header('Location:index.php' ,'_self');
}
if (isset($_POST['updatebutton'])) {
	$IndivisulaUserInfoObj -> editProfileInfo();
	// kya hota h refresh jo v data form me fill krte gayab ho jata
	// form ka to kaam hi yhi h Mtlb update krmr se phle gayab ho rha
	//kha h form
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<link rel="stylesheet" type="text/css" href="css/editprofile.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
	<body> 
		<div class="w3-container w3-blue " id="">
         <center><h2>Edit Your Profile</h2></center>
		</div>
         <br>

		
		<div class="form-container">
			<form action="" method="POST" class="w3-container">
				   <p>
						<label class="w3-text-blue"><b>First Name</b></label>
						<input class="w3-input w3-border" type="text" name="first" required="true" value="<?php echo $firstname;  ?>">	
					<p>
					<label class="w3-text-blue">Change your Lastname</label>
					<input class="w3-input w3-border" type="text" name="last" required="true" value="<?php echo $lastname;  ?>">
					<p>
					<label class="w3-text-blue">Change your Username</label>
					<input class="w3-input w3-border" type="text" name="uname" required="true" value="<?php echo $username;  ?>">
					<p>
					<label class="w3-text-blue">Change your Description</label>
					<input class="w3-input w3-border" type="text" name="description" required="true" value="<?php echo $describeuser;  ?>">
					<p>
					<label class="w3-text-blue">Relationship Status</label>
					<select class="w3-input w3-border" name="relationship">
						   <option><?php echo $relationship;  ?></option>
						   <option>Engaged</option>
						   <option>Married</option>
						   <option>Single</option>
						   <option>In a relationship</option>
						   <option>It's Complicated</option>
						   <option>seperated</option>
						   <option>Divorced</option>
						   <option>Widow</option>
					</select>
					<p>
					<label class="w3-text-blue">Password</label>
					<input id="myInput" class="w3-input w3-border" type="password" name="password" required="true" value="<?php echo $userpass;  ?>">
					<input  type="checkbox" name="" onclick="showPassword(this)"><strong>Show password</strong>
					<p>
					<label class="w3-text-blue">Country</label>
					<select class="w3-input w3-border" name="country">
						   <option><?php echo $usercountry;  ?></option>
						   <option>United States</option>
						   <option>India</option>
						   <option>Pakistan</option>
						   <option>Russia</option>
						   <option>China</option>
						   <option>Brazil</option>
						   <option>UK</option>
						   <option>Nepal</option>
					</select>
					<p>
					<label class="w3-text-blue">Gender</label>
					<select class="w3-input" name="gender">
						   <option><?php echo $usergender;  ?></option>
						   <option>Male</option>
						   <option>Female</option>
						   <option>Other</option>
					</select>
					<p>	   
					<label class="w3-text-blue">Birthday</label>
					<input class="w3-input w3-border"  type="date" name="birthdate" required="" value="<?php echo $userbirthday;  ?>">
					<p>
					<label class="w3-text-blue">Forgotten password</label>
					<button type="button" class="btn btn-default" data-toggle="modal" data-target="#mymodal">Turn on</button>

				
		        <button name="updatebutton" class="btn btn-info" id="update">Update</button>
		    </form>
	    </div>
	    
	    <!---------------------------modal----------------------------------->
<div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="mymodalLabel" aria-hidden="true"> 
				  <div class="modal-dialog" >
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
				        </button>
				        <h5 class="modal-title">Modal Header</h5>
				      </div>
				      <div class="modal-body">
			        	<strong>What is your best friend name</strong>
				        <textarea class="form-control" name="content" placeholder="someone"></textarea><br>
				        <input type="submit" name="sub" class="btn btn-default" value="submit" onclick="setForgetPasswordOption(this);"><br><br>
				        <pre>Answer the above question we will ask this question<br> if you forget your password.</pre><br><br>
				        <?php
			        /*if (isset($_POST['sub'])) {
			        	
			        	$IndivisulaUserInfoObj -> setForgetPasswordOption();
			        }*/
				        ?>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

<script>
function showPassword() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
/******for password recovery option using friend name*********** kha h function ye kya?
email already ******/

function setForgetPasswordOption(btn){
	var button =$(btn);
	var myData = button.siblings('textarea').val();

	if (myData.length > 1) {
		$.post("ajax/recoverPassword.php" , {sendNameViaPost : myData}).done(function(data){
		//button.html(data);
			$("#mymodal").modal('hide');
			alert(data);
		});
			
	}
}
</script>						 
</body>
</html>

