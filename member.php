<?php
include 'includes/headernew.php';
if (!isset($_SESSION['userid'])) {
	header('Location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>find people</title>
	<link rel="stylesheet" type="text/css" href="css/homestyle.css">
</head>
<body>
	
		<center><h2>Find New People</h2></center>
		<input class="form-control" name="findpeople" id="findnewpeople" placeholder="search here" autocomplete="off" onkeyup="liveSearch(this)"></input>
		<button class="btn btn-primary" name="search" id="searchbutton" onclick="getNewPeople(this)">
			search
		</button>


	<div id="searchResult">
		
	</div>
    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="javascript/app.js"></script>

</body>
</html>