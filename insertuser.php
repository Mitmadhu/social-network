<?php

 $usernameError="";
 $passwordError="";
 $emailError="";
 $userbirthday="";

  if(isset($_POST['signup'])){
    	$firstname=$_POST['firstname'];
    	$lastname=$_POST['lastname'];
    	$userpass=$_POST['userpass'];
      $userpass1=md5($userpass);
    	$useremail=$_POST['useremail'];
    	$usercountry=$_POST['usercountry'];
    	$usergender=$_POST['usergender'];
    	$userbirthday=$_POST['userbirthday'];
    	$status="verified";
    	$posts="no";
    	$newgid=sprintf('%05' , rand(0,999999));
    	$username=strtolower($firstname . '_' . $lastname . '_' . $newgid);

      $username_query="SELECT * FROM USERS WHERE username='$username'";
      $run_query=mysqli_query($conn,$username_query);
      if(mysqli_num_rows($run_query)){
        $usernameError="<span class='danger'>Username already exist</span>";
        echo"<script>alert('Username already exist')</script>";
        exit();
      }

      if (strlen($userpass)<8) {
       $passwordError="<span class='danger'>Password should be atleast of 10 characters</span>";
        echo"<script>alert('Password should be atleast of 10 characters')</script>";
        exit();
      }

      $email_query="SELECT * FROM USERS WHERE useremail='$useremail'";
      $run_email_query=mysqli_query($conn,$email_query);
      if (mysqli_num_rows($run_email_query)) {
        $emailError="<span class='danger'>The email already exist try another</span>";
        echo"<script>alert('The email already exist try another')</script>";
        echo "<script>window.open('signup.php', '_self')</script>";
        exit();
      }

      if((!$usernameError) and (!$emailError) and (!$passwordError)){

          $rand = rand(1 ,3);
          if($rand==1){
            $profile_pic = "profile1.png";
          }

         else if($rand==2){
            $profile_pic = "profile2.png";
          }

          else if($rand==3){
            $profile_pic = "profile3.png";
          }

          $insert="INSERT INTO USERS (firstname ,lastname, username,describeuser,relationship,userpass,useremail
                    ,usercountry,usergender,userimage,usercover,user_reg_date,  status,posts, recoveryaccount,
                    userbirthday) values ('$firstname','$lastname','$username','hello!!!all of you....','...',
                    '$userpass1','$useremail','$usercountry','$usergender','$profile_pic','defaultcover.jpg',NOW(),'$status','$posts','Iwanttoputadingintheuniverse','$userbirthday')";

          $query=mysqli_query($conn,$insert);

          if ($query) {
            echo "<script>alert('Congratulations you registered successfully ....')</script>";
            echo "<script>window.open('signin.php', '_self')</script>";

          }

          else{
             echo '<script>
               swal("Registration failed, "...Please try again!!!");
              </script>';

            echo "<script>window.open('signup.php', '_self')</script>";;
          }

      }


      
  }





     ?>