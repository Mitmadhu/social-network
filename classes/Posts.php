

<?php 

/**
 * 
 */
//sochte h hm av thoda aacha haa  haa socho

class Posts
{
	private $uid, $conn, $sqlData;
	function __construct($uid, $conn)
	{
		$this->uid = $uid;
		$this->conn = $conn;
		$get_user = "SELECT * FROM USERS WHERE userid='$uid'";
		$run_user = mysqli_query($this->conn , $get_user);
		$this->sqlData = mysqli_fetch_array($run_user);
	}

    public function insertPost($image, $caption){
        mysqli_query($this->conn, "INSERT into posts (userid,postcontent,uploadimage) values(
                        '$this->uid','$caption','$image')");
    }

	public function getPosts()
	{
       	$uid = $this->uid;
	    $get_posts ="SELECT * FROM POSTS WHERE userid ='$uid' ORDER BY postid DESC LIMIT 5";
	    $run_posts= mysqli_query($this->conn,$get_posts);
	    $returnData  = "";

    	while($row_posts = mysqli_fetch_array($run_posts)){
    		$postid = $row_posts['postid'];
    		$userid =$row_posts['userid'];
    		$postcontent =$row_posts['postcontent'];
    		$uploadimage =$row_posts['uploadimage'];
            $uploadimage = $uploadimage;
    		$postdate =$row_posts['postdate'];

    		$users ="SELECT * FROM USERS WHERE userid ='$userid' ";
    		$run_users = mysqli_query($this->conn,$users);
    		$row_users = mysqli_fetch_array($run_users);

    		$username = $row_users['username'];
    		$src = $row_users['userimage'];
    		$firstname = $row_users['firstname'];
    		$lastname = $row_users['lastname'];

    		//display posts
            // user profile page pe kha gya
    		$returnData .= "<div class='post-head'>
				    			<div class='display-flex'>  
				    				<div class='profile-head-photo'>
				    					<img src='usersprofiles/$src' >
				    				</div>
				    				<div class='profile-head-info'>
				    					<span><a> $firstname $lastname </span><br>
				    					<span> $username </span><br>
				    					<span> $postdate </span><br>
				    				</div>
				    			</div>
				    			<div class='caption'>
				    				$postcontent
				    			</div>
				    			<div class='post-head-image'>
				    				<img src='$uploadimage'>
				    			</div>
				    		</div>
				    		<div>
					    		<a href='view.php?postid=$postid'><button class='btn btn-success btn1'>View</button></a>
	    			            <button class='btn btn-danger delete btn2' onclick='deletePost($postid)'>Delete</button>
					    		<a href='editpost.php?postid=$postid'><button class='btn btn-primary btn3'>Edit</button></a>
	    			        </div>";
    		
    		}
    		return $returnData;
    	}


    public function getCoverPhoto()
    {

    	$userid = $this->sqlData['userid'];
    	$firstname = $this->sqlData['firstname'];
    	$lastname = $this->sqlData['lastname'];
    	$username = $this->sqlData['username'];
    	$describeuser = $this->sqlData['describeuser'];
    	$useremail = $this->sqlData['useremail'];
    	$usercountry = $this->sqlData['usercountry'];
    	$usergender = $this->sqlData['usergender'];
    	$userimage = $this->sqlData['userimage'];
    	$usercover = $this->sqlData['usercover'];
    	$user_reg_date = $this->sqlData['user_reg_date'];
    	$status = $this->sqlData['status'];
    	$posts = $this->sqlData['posts'];
    	$recoveryaccount = $this->sqlData['recoveryaccount']; 
    	$userbirthday = $this->sqlData['userbirthday'];
    	$relationship=$this->sqlData['relationship'];
        
    	return "<div id='profile-info'>
	                <div><img id='cover-img' class='img-rounded' src='cover/$usercover' alt='cover'>
                    </div>
                    <label for='cover-photo' style='cursor:pointer;'> Change Cover </label>
	                <div class='changecover'>
                       <form action='profile.php?uid=$userid' id='profile-pic-form' method='post' enctype='multipart/form-data'>
                            <input type='file' name='coverPhoto' style='display:none;' id='cover-photo' size='60px'/>

                            <button name='update-cover' style='display:none;' id='update-cover'>Update cover</button>
                       </form>
	                <div>
                </div>

                <div id='profile-img' >
                    <img src='usersprofiles/$userimage' alt='profile' id='detect-click' class='img-circle' width='180px' height='185px' text='change'>

                    <form action='profile.php?uid=$userid' id='profile-pic-form' method='post' enctype='multipart/form-data'>
    	                   <input id='changepic' type='file' name='u_image' size='60px' style='display:none;' />
    	                <button name='update' id='btnprofile' style='display:none;'>Update profile</button>
                    </form>
                </div><br>
                ";
                // ho gya achha kha hua haa 
    }

    public function getAllPosts(){

    	$data = mysqli_query($this->conn, "SELECT * from posts order by postdate desc ");
    	$dataReturn = "";
    	while ($result = mysqli_fetch_array($data)) {
    		$postedDate = $this->time_elapsed_string($result['postdate']);
    		$postSrc = $result['uploadimage'];
    		$postComment =$result['postcontent'];
    		$userId = $result['userid'];
    		$postId = $result['postid'];

    		$newData =  mysqli_query($this->conn, "SELECT * from users where userid='$userId' limit 1");
    		$newResult = mysqli_fetch_array($newData);

    		$fullname = $newResult['firstname']." ".$newResult['lastname'];
    		$userSrc = $newResult['userimage'];
            $userId = $newResult['userid'];

            $allComments = $this->getAllComments($postId);
    		
    		$dataReturn .= "<div class='post-container'>
    							<div class='display-flex'>
    								<div class='user-img'>
    									<img src='usersprofiles/$userSrc'/>
    								</div>
    								<div class='user-info'>
    									<span><a href='profile.php?uid=$userId'>$fullname</a>
                                        </span><br>
    									<span>$postedDate</span><br>
    								</div>
    							</div>
    							<div class='all-post-caption'>
    								$postComment
    							</div>
    							<div >
    								<img class='post-img' src='$postSrc'>
    							<div>
    							<br>
    							<div class='post-comment'>
    								<textarea autocomplete='off'></textarea>
    								<button class='btn btn-primary' onclick='postComment(this, $postId)'>comment</button>
    							</div>
    							<div class='load-comments'>
                                    $allComments
                                </div>
    						</div><br><br>";


    	}
    	

    	return $dataReturn;
    }

    private function getAllComments($postId){
        $data = mysqli_query($this->conn, "SELECT * from comments where postid='$postId' order by
           commentid desc");
        $dataReturn = "";

        while ($result = mysqli_fetch_array($data)) {

             $userId = $result['userid'];
             $postDate =$this->time_elapsed_string($result['commentdate']) ;
             $commentText = $result['comment'];

             $userData = mysqli_query($this->conn,"SELECT * FROM USERS WHERE userid ='$userId'");
             $userResult = mysqli_fetch_array($userData);

             $fullName =  $userResult['firstname']." " .$userResult['lastname'];
             $userSrc = $userResult['userimage'];

             $dataReturn .= "<div class='display-comments'>
                                <div class='comment-user-img'>
                                    <img src='usersprofiles/$userSrc'>
                                </div>
                                <div class='comment-info'>
                                    <span>$fullName</span><br>
                                    <span>$postDate</span> <br>
                                    $commentText
                                </div>
                            </div>";

                            /*
                            hight fixx kr ke scroll wala kr dete h haa kro hm dekhenge
                            haa madhubala
                            */

        }
        return $dataReturn;
    }

   private function time_elapsed_string($datetime, $full = false) {
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
}