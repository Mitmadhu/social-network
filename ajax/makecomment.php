<?php 
// ajax call do not have return statement
// it return via eco
require '../includes/connection.php';

$userLoggedIn = $_SESSION['userid'];
$postId = $_POST['postId'];
$comment = $_POST['sendViaPostMethod'];
$postDate = time_elapsed_string(date("Y-m-d H:i:s")); 

$data = mysqli_query($conn, "INSERT into comments (userid, postid, comment) values('$userLoggedIn', '$postId','$comment')");

$userData = mysqli_query($conn,"SELECT * FROM USERS WHERE userid='$userLoggedIn' limit 1");
$userInfo = mysqli_fetch_array($userData);

$userSrc=$userInfo['userimage'];
$fullName = $userInfo['firstname']." ".$userInfo['lastname'];

echo "<div class='display-comments'>
        <div class='comment-user-img'>
            <img src='usersprofiles/$userSrc'>
        </div>
        <div class='comment-info'>
            <span>$fullName</span><br>
            <span>$postDate</span> <br>
            $comment
        </div>
    </div>";

function time_elapsed_string($datetime, $full = false) {
     $now = new DateTime;
     $ago = new DateTime($datetime);
     $diff = $now->diff($ago);

     $diff->w = floor($diff->d / 7);
     $diff->d -= $diff->w * 7;

     $string = array(
         'y' => 'year',
         'm' => 'month',
         'w' => 'week',
         'd' => 'day',
         'h' => 'hour',
         'i' => 'minute',
         's' => 'second',
     );
     foreach ($string as $k => &$v) {
         if ($diff->$k) {
             $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
         } else {
             unset($string[$k]);
         }
     }

     if (!$full) $string = array_slice($string, 0, 1);
     return $string ? implode(', ', $string) . ' ago' : 'just now';
 }



