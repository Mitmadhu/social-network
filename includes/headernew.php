<?php
 include 'includes/connection.php' ; 
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine|indie Flower|Mukta">
<style>
	#mystyle{
		height: 63px;
	}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<nav class="navbar navbar-default" id="mystyle" >
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
		    </button>
			<a href="home.php" class="navbar-brand">My Whatsapp</a>
		</div>
		<div class="collapse navbar-collapse" id="#bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
				   if (isset($_SESSION['userid'])) {
				   		$user = $_SESSION['userid'];
					    $get_user = "SELECT * FROM USERS WHERE userid='$user'";
					    $run_user = mysqli_query($conn , $get_user);
					    $row = mysqli_fetch_array($run_user);

					    $userid = $row['userid'];
					    $firstname = $row['firstname'];
					    $lastname = $row['lastname'];
					    $username = $row['username'];
					    $describeuser = $row['describeuser'];
					    $useremail = $row['useremail'];
					    $usercountry = $row['usercountry'];
					    $usergender = $row['usergender'];
					    $userimage = $row['userimage'];
					    $usercover = $row['usercover'];
					    $user_reg_date = $row['user_reg_date'];
					    $status = $row['status'];
					    $posts = $row['posts'];
					    $recoveryaccount = $row['recoveryaccount']; 
					    $userbirthday = $row['userbirthday'];
					    $relationship=$row['relationship'];
					    $userpass =$row['userpass'];

					    $user_posts = "SELECT * FROM POSTS WHERE userid ='$userid'";
					    $run_posts = mysqli_query($conn , $user_posts);
					    $posts = mysqli_num_rows($run_posts);
				   }
				?>

				<li><a href='profile.php?<?php echo "uid=$userid "; //echo "$firstname";  ?>'>All</a></li>
				<li><a href='home.php'>Home</a></li>
				<li><a href='member.php'>Find people</a></li>
				<li><a href='message.php'>Messages</a></li>


				<?php
			     echo"
				     
					    <li class='dropdown'>
					        <a href ='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span>
					        </a>

					        <ul class='dropdown-menu'>
					           <li>
					           <a href='profile.php?uid=$userid'>My posts<span class='badge badge-secondary'>$posts</span></a>
					           </li>
					           <li>
					           <a href='edit_profile.php?uid=$userid'>Edit account<span class='badge badge-secondary'>$posts</span></a>
					           </li>
					           <li role='seperator' class='divider'></li>
					           <li><a href='logout.php'>Logout</a></li>
					        </ul>
					    </li>
				    ";
				?>
			</ul>
			<div style="float: right">
				<ul class="nav navbar-nav nvbar-right">
					<li class="dropdown">
						<form class="navbar-form navbar left" method="GET" action="results.php">
							<div>
								<input type="text" name="user_query" class="form-control" placeholder="Search">
								<button type="submit" class="form-control btn btn-info" name="search">Search</button>
							</div>
						</form>
					</li>
				</ul>
		   </div>
		</div>
	</div>
