 function get_posts($conn){
    $conn = $conn;
    $per_page = 4;

    if (isset($_GET['page'])) {
        $page = $_GET['page'];

    }
    else{
        $page = 1;
    }

    $start_from =($page - 1)* $per_page;

    $get_posts = "SELECT * FROM POSTS ORDER BY postid DESC ";


    $run_posts = mysqli_query($conn,$get_posts);
    

    while ($row_posts = mysqli_fetch_array($run_posts)) {
        
        $postid = $row_posts['postid'];
        $userid = $row_posts['userid'];
        $content= substr($row_posts['postcontent'], 0,40);
        $uploadimage = $row_posts['uploadimage'];
        $postdate = $row_posts['postdate'];

        $user = "SELECT * FROM USERS WHERE userid = '$userid' and posts = 'yes'";
        $run_user = mysqli_query($conn , $user);
        $row_user = mysqli_fetch_array($run_user);

        $username = $row_user['username'];
        $userimage = $row_user['userimage'];

        //displaying posts from  database

        if($content == '' and strlen($uploadimage) >= 1){
            echo "
            <div class='row'>
                <div col-sm-3>
                </div>
                <div col-sm-6>
                  <div class='row'>
                      <div class='col-sm-2'>
                        <p class='profiles'><img  src='usersprofiles/$userimage' class='img-circle' width='100px' height='100px'></p>
                      </div>
                      <div class='col-sm-6'>
                          <div class='postdate'>
                              <h3><a href='profile.php?uid='$userid' style='text-decoration:none; cursor='pointer; color:#3897f0;' >$username</h3>
                              <h4><small style='color='black;'>Updated a post on: <strong>$postdate</strong></small></h4>
                          </div>
                      </div>
                      <div class='col-sm-4'>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-sm-12'>
                          <img id ='posts-img' src='imagepost/$uploaimage' style='height:350px;'>
                      </div>
                       <a href='comment.php?postid=$postid' style='float:right;'><button class='btn btn-info' style='margin-right: 230px;width: 125px; margin-top:-75px;'>Comment</button></a><br>
                  </div><br>
                  
                </div>
                <div class='col-sm-3'></div>
            <div><br><br>
            ";
        }

        else if (strlen($content) >= 1 and strlen($uploadimage) >=1) {
            echo "
            <div class='row'>
                <div col-sm-3>
                </div>
                <div col-sm-6>
                  <div class='row'>
                      <div class='col-sm-2 '>
                        <p class='profiles'><img src='usersprofiles/$userimage' class='img-circle' width='100px' height='100px'></p>
                      </div>
                      <div class='col-sm-6'>
                          <div class='postdate'>
                              <h3><a href='comment.php?uid=$userid' style='text-decoration:none; cursor='pointer; color:#3897f0;' >$username</h3>
                              <h4><small style='color='black;'>Updated a post on: <strong>$postdate</strong></small></h4>
                          </div>
                      </div>
                      <div class='col-sm-4'>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-sm-12 postimageblock' >
                      <p class='profiles'><div id='postcontent'>$content</div><p>
                          <img id ='posts-img' src='imagepost/$uploadimage' style='height:350px;'>
                      </div>
                  </div><br>
                </div>
                <div class='col-sm-3'></div>
            <div><br><br>
            ";
        }
        else {

            echo "
            <div class='row'>
                <div col-sm-3>
                </div>
                <div col-sm-6>
                  <div class='row'>
                      <div class='col-sm-2'>
                        <p class='profiles'><img src='usersprofiles/$userimage' class='img-circle' width='100px' height='100px'></p>
                      </div>
                      <div class='col-sm-6'>
                         <div class='postdate'>
                              <h3><a href='profile.php?uid='$userid' style='text-decoration:none; cursor='pointer; color:#3897f0;' >$username</h3>
                              <h4><small style='color='black;'>Updated a post on: <strong>$postdate</strong></small></h4>
                          </div>
                      </div>
                      <div class='col-sm-4'>
                      </div>
                  </div>
                  <div class='row'>
                      <div class='col-sm-12'>
                         <h3> <p>$content</p></h3>
                      </div>
                       <a href='single.php?postid='$postid' style='float:right;'><button class='btn btn-info' style='margin-right: 230px;width: 125px; margin-top:-75px;'>Comment</button></a><br>
                  </div><br>
                  
                </div>
                <div class='col-sm-3'></div>
            <div><br><br>
            ";
        }

    }
    include 'pagination.php';
 }
