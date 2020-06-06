
<?php 
require 'header.php';
   ?>
<!DOCTYPE html>
<html>
<head>
	<title>my Instagram signin and signup</title>
	<style>
		body{
			overflow-x: hidden;
			font-family: 'Mukta', serif;

		}
		body h3{
			font-size: 28px;
			color: #e91e8e;
		}

		#centered1{
			position: absolute;
			font-size: 10px;
			top: 30%;
			left: 30%;
			transform: translate(-50%,-50%);
		}

		#centered2{
			position: absolute;
			font-size: 10px;
			top: 50%;
			left: 40%;
			transform: translate(-50%,-50%);
		}

		#centered3{
			position: absolute;
			font-size: 10px;
			top: 70%;
			left: 30%;
			transform: translate(-50%,-50%);
		}

		#signup{
			width: 80%;
			border-radius: 30px;
			margin-bottom: 18px;
			margin-top: 14px;
			transition: width 2s;
		}

		#signup:hover,
		#signup:active{
			width:85%;
			border-radius: 2px solid #1e24e9;
		}

		#login{
			width: 80%;
			border-radius: 30px;
			background-color: #fff;
			color: #1da1f2;
			border: 1px solid #1da1f2;
			transition: width 2s;
		}

		#login:hover,
		#login:active{
			width: 85%;
			border-radius: 30px;
			background-color: #1da1f2 ;
			color: #000;
			border: 2px solid #1da1f2;
		}

		

		.form-area{
			background-color: #80808012;
			width: 500px;
            height: 170px;
            padding-left: 70px;
            padding-top: 18px;
		}

		.logotext{
			background-color: #fff;
		}

	</style>
</head>
<body>
    <div class="row">
		<div class="col-sm-6">
			<img src="images/img4.jpg" class="img-rounded" title="My Whatsapp" width="650px" height="490px">
			<div id="centered1" class="centered"><h3><span class="glyphicon glyphicon-search"></span>&nbsp &nbsp<strong>Follow your intrests.</strong></h3></div>
			<div id="centered2" class="centered"><h3><span class="glyphicon glyphicon-search"></span>&nbsp &nbsp<strong>Hear what people are talking about you.</strong></h3></div>
			<div id="centered3" class="centered"><h3><span class="glyphicon glyphicon-search"></span>&nbsp &nbsp<strong>join the conversation .</strong></h3></div>
		</div>

		<div class="col-sm-6" style="left: 6%">
			<div class="logotext">
				<img src="images/icon.jpg" class="img-rounded" title="My Whatsapp" width="80px" height="80px">
				<h2><strong>See what is happening in <br> the world right now!!</strong></h2>
				<h4 style="margin-top: 30px"><strong>Join My Whatsapp Today.</strong></h4>
		   </div>
			<div class="form-area">
		        <form method="POST" action="">
		        	<div><button id="signup" class="btn btn-info btn-lg" name="signup">Sign Up</button></div>
		        	<div><button id="login" class="btn btn-info btn-lg " name="login">Sign In</button></div>
		        </form>
	        </div>
		</div>
    </div>
    <?php  
       if(isset($_POST['signup'])){
       	header('Location:signup.php' , '_self');
       	exit();
       }
        if(isset($_POST['login'])){
       	header('Location:signin.php' , '_self');
       	exit();
       }
      ?>
</body>
</html>