<?php
  include'header.php';
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>signup page</title>
	<style>
		body{
			overflow-x: hidden;
			font-family: 'Mukta', serif;

		}
		body h3{
			font-size: 28px;
			color: #e91e8e;
		}

		#signup{
			width: 60%;
			border-radius: 30px;
			margin-top: 20px;
			margin-bottom: 20px;
			transition: width 2s;
		}
		#signup:hover,
		#signup:active{
			width:65%;
			border-radius: 2px solid #1e24e9;
		}
		.btnbox{
			padding-left: 100px;
		}
		.main-content{
			width: 50%;
			height:80%;
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
			margin-bottom: 15px;
		}

	</style>
</head>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<center><h3><strong>Join My Whatsapp</strong></h3><hr></center>
				</div>
				<div class="l-part">
					<form  action="signup.php" method="POST">
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-pencil"></i>
							</span>
							<input type="text" name="firstname" class="form-control" placeholder="Enter your first Name.." required="">
						</div>
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-pencil"></i>
							</span>
							<input type="text" name="lastname" class="form-control" placeholder="Enter your Last Name.." required="">
						</div>
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-lock"></i>
							</span>
							<input id="password" type="password" name="userpass" class="form-control" placeholder="Enter your password.." required="">
						</div>
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-user"></i>
							</span>
							<input id="emil" type="email" name="useremail" class="form-control" placeholder="Enter your  email.." required="">
						</div>
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-chevron-down"></i>
							</span>
							<select class="form-control" name="usercountry" required="required">
								<option disabled="">Select Your Country</option>
								<option>India</option>
								<option>United State Of America</option>
								<option>Pakistan</option>
								<option>Japan</option>
								<option>UK</option>
								<option>France</option>
								<option>Germany</option>
								<option>China</option>
								<option>Russia</option>
							</select>
						</div>
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-chevron-down"></i>
							</span>
							<select class="form-control input-md" name="usergender" required="required">
								<option disabled="">Select Your Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</div>
						<div class="input-group input">
							<span class="input-group-addon">
								<i class="glyphicon glyphicon-calendar"></i>
							</span>
							<input type="date" name="userbirthday" class="form-control" placeholder="Enter your  birthdate" required="">
						</div>
						<div>
						<a href="signin.php" style="text-decoration-style: none; float: right; color: #187fab" data-toggle="tooltip" title="Sign in">Already have an account?</a>
						</div>
						<div class="btnbox">
							<center><button id="signup" class="btn btn-info btn-lg" name="signup">Sign Up</button><center>
						</div>
						<?php  include'insertuser.php';  ?>
					</form>
				</div>
		    </div>
		</div>
	</div>
</body>
</html>