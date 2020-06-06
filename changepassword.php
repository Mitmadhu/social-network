<?php
 include 'header.php';
 include 'classes/ForgetPassword.php';
 $ForgetPasswordObj = new ForgetPassword($conn);
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>
<body>
	<div class="card card-outline-secondary" id="change-password-container">
        <div class="card-header">
            <h3 >Change Password</h3>
        </div>
        <div class="card-body">
            <form class="form" role="form" autocomplete="off" action="" method="POST">
                <div class="form-group">
                    <label >your email</label>
                    <input type="email" class="form-control" id="inputPasswordOld" required="true" name="useremail">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" id="inputPasswordNew" required="" name="userpassword">
                    <span class="form-text small text-muted">
                            The password must be 8-20 characters, and must <em>not</em> contain spaces.
                        </span>
                </div>
                <div class="form-group">
                    <label>Reenter Password</label>
                    <input type="password" class="form-control" id="inputPasswordNewVerify" required="" name="userconfirmpassword">
                    <span class="form-text small text-muted">
                            To confirm, type the new password again.
                        </span><br><br>
                </div>
                <div class="form-group">
                	<a href="signin.php">back to login page?</a>
                    <button type="submit" class="btn btn-info btn-lg float-right" name="savechange" id="savechangebtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>

<?php 
if (isset($_POST['savechange'])) {
	 $email = $_POST['useremail'];
	 $password = $_POST['userpassword'];
	 $confirmPassword= $_POST['userconfirmpassword'];
	 $ForgetPasswordObj ->changeExistingPassword($email,$password,$confirmPassword);
}    
?>
</html><!----------yhi sb h

problem nikalte ----------------------->