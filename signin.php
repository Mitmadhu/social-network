<?php
  include'header.php';
  include 'classes/ForgetPassword.php';

  $ForgetPasswordObj = new ForgetPassword($conn);
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>signin here</title>
	<style >
		body{
			overflow-x: hidden;
			font-family: 'Mukta', serif;

		}
		body h3{
			font-size: 28px;
			color: #e91e8e;
		}
		#signin{
			width: 60%;
			border-radius: 30px;
			margin-top: 20px;
			margin-bottom: 20px;
			transition: width 2s;
		}
		#signin:hover,
		#signin:active{
			width:65%;
			border-radius: 2px solid #1e24e9;
		}
		.btnbox{
			padding-left: 100px;
		}
		.main-content{
			width: 50%;
			height:50%;
			margin: 10px auto;
			background-color: #fff;
			border:2px solid #e6e6e6;
			padding: 40px 50px; 
		}
		.header{
			margin-top: -30px;
			border:0px solid #000;
			margin-bottom: 5px;
		}
		.input{
			margin-bottom: 20px;
		}
		.overlap-text{
			margin-top: 20px;
			position: relative;
		}
		.overlap-text a{
			position:absolute;
			top: 10px;
			right: 10px;
			font-size: 14px;
			letter-spacing: 0px;


		}

	</style>
</head>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<center><h3><strong>Login to My whatsapp</strong></h3><hr></center>
				</div>
				<div class="l-part">
					<form method="POST" action="">
						<div class="input">
						  <input type="email" name="email" class="form-control input-md" placeholder="Enter email" required="">
						<div>
						<div class="overlap-text input">
						  <input  type="password" name="password" placeholder="Enter Password" class="form-control input-md " required="">
						  <!-- <a style="text-decoration: none; float: right;color: #187fab;" data-toggle="tooltip" title="Reset Password"href="forget_password.php">Forget?</a> -->
						  <a title="reset password" href="#" data-target="#pwdModal" data-toggle="modal">Forgot password?</a>
						</div>	
						</div>
						<a href="signup.php" style="text-decoration-style: none; float: right; color: #187fab" data-toggle="tooltip" title="Create Account">Don't have an account?</a>	
						<div class="btnbox">
							<center><button id="signin" class="btn btn-info btn-lg" name="login">Sign In</button><center>
						</div>
					</form>
				</div>	
			</div>
		</div>
	</div>

	<?php include'login.php' ;  ?>

    <!--modal-->
	<div id="pwdModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog">
	  <div class="modal-content">
	      <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	          <h1 class="text-center">What's My Password?</h1>
	      </div>
	      <div class="modal-body">
	          <div class="col-md-12">
	                <div class="panel panel-default">
	                    <div class="panel-body">
	                        <div class="text-center">
	                          
	                          <p>If you have forgotten your password you can reset it here.</p>
	                            <div class="panel-body">
	                            <form action="" method="POST">
		                                <fieldset>
		                                    <div class="form-group">
		                                        <input class="form-control input-lg" placeholder="E-mail Address" name="email" type="email">
		                                    </div>
		                                    <div class="form-group">
		                                        <input class="form-control input-lg" placeholder="write your best friend name for password change" name="friend" type="text">
		                                    </div>
		                                    <div><a href="">back to signin?</a></div><br><br>
		                                    <input class="btn btn-lg btn-primary btn-block" value="submit" type="submit" name="submit">
		                                </fieldset>
	                            </form>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	      </div>
	      <div class="modal-footer">
	          <div class="col-md-12">
	          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
			  </div>	
	      </div>
	  </div>
	  </div>
	</div>	
<?php
 if (isset($_POST['submit'])) {
 	$email = $_POST['email'];
 	$friendName = $_POST['friend'];
 	$ForgetPasswordObj-> checkUserCredentials($email,$friendName);
 }

?>
</html>