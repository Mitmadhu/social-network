<?php

    if (isset($_POST['login'])) {
    	
    	$email=$_POST['email'];
    	$password=$_POST['password'];
    	$password1=md5($password);

    	$select_user ="SELECT userid,username FROM USERS WHERE useremail ='$email' AND userpass ='$password1' AND status ='verified'";
    	$run_user = mysqli_query($conn,$select_user);
        $result  = mysqli_fetch_array($run_user);
    	$check_user= mysqli_num_rows($run_user);
    	
    	if ($check_user == 1) {
            $_SESSION['userid'] = $result['userid'];
            //for chat message
            $_SESSION['username']=$result['username'];
            $queryForLoginTable = "INSERT INTO login_details (userid) VALUES ('".$result['userid']."')";
            mysqli_query($conn,$queryForLoginTable);
            $_SESSION['login_details_id'] = mysqli_insert_id($conn);
    		echo "<script>alert('Login successful');</script>";
    		echo "<script>window.open('home.php' ,'_self');</script>";
    	}
    	else{
    		echo "<script>alert('Your email or password is incorrect');</script>";
    	}

    }
    // bada comment me style kharb ho gya


    ?>
    