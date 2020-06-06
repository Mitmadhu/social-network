
<?php
require '../includes/connection.php';

$peopleName = strtolower($_POST['sendNameViaPost']);

$findPeople = mysqli_query($conn,"SELECT * FROM USERS WHERE (firstname LIKE '$peopleName%') or (lastname LIKE '$peopleName%') or (username LIKE '$peopleName%')");
$resultData ="";

while ($result = mysqli_fetch_array($findPeople)) {

	$fullName = $result['firstname']." " .$result['lastname'];
	$src = $result['userimage'];
	$userBirthday = $result['userbirthday'];
	$userRegDate = $result['user_reg_date'];
	$userId = $result['userid'];
	$userName =$result['username'];

	$resultData.="<div class ='people-container'>
	                    <div class='pepole-image'>
	                      <img src='usersprofiles/$src'>
	                    </div>
	                    <div class='search-content'>
	                        <a href='userinformation.php?userid=$userId'>
	                        <span class='pepole-info'>$fullName</span></a><br>
	                        <span class='people-reg-date'>$userRegDate</span><br>
	                        <span class='people-birthday'>$userBirthday</span><br>
	                    <div>
	                </div><hr>";
}

echo $resultData;