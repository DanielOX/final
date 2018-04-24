<?php
 session_start();
if(!(isset($_SESSION['user_id']))) {
echo "<script>window.location.assign('login_page.php');</script>";
}
$conn = mysqli_connect("127.0.0.1", "root","","community");
$uid = $_SESSION['user_id'];
if(isset($_GET['circle_id']))
{
  $current_circle_id = $_GET['circle_id'];
  $current_circle_name = $_GET['circle_name'];
  $query = "SELECT * FROM user_groups WHERE user_id = $uid AND group_id = $current_circle_id";
  $UYT = mysqli_query($conn,$query);
  if(mysqli_num_rows($UYT) == 0)
  {
        echo "<script> alert('You didn;t joined this group <br> <p>Redirecting you to circle pages, first join the group then you will able to post and comment and share your thoughts</p>'); </script>";
        header('location: circle.php');
  }

}



$query = "SELECT * FROM `user` WHERE user_id = '$uid'";
$UYT = mysqli_query($conn,$query);
$self_user = mysqli_fetch_assoc($UYT);



?>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="view port" content="width=device-width,initial-scale=1">
	<title>Community Communicator</title>
	<link rel="stylesheet" href="Materialize/materialize.css">
  <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
  <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
	<script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="Materialize/materialize.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<style media="screen">
	body
  {
		font-family: 'Raleway', sans-serif;
	}
	.carousel:hover
	{
			cursor:pointer;
	}
</style>
<body>

<?php include('partials/header.php'); ?>
<br>
<div class="cantainer">
  <div class="card row z-depth" style="width:15%;position:fixed;left:80%">
    <div class="card-content">
      <div class="card-body col s12 m12 l12">
        <center>
          <a href=<?php echo 'leave_circle.php?circle_id='.$current_circle_id.'&user_id='.$self_user['user_id']; ?> class="center btn-flat red white-text"  title="leave circle"> <i class="fa fa-power-off"></i> </a>
        </center>

        <div class="card-content">


        <p style="font-size:22px;"><b><?php echo $current_circle_name; ?></b></p>
          </div>
      </div>

    </div>
  </div>

  <div class="row card z-depth-3" style="margin:0 auto;width:50%">

		<div class="col card-content s12 m12 l12 ">
		 <form method="post" action="circle_data.php" enctype="multipart/form-data">
				<div class="col s12 m12 l12 input-file">     <!-- upper portion of div for add photo etc-->
           <div style="width:50px;height:50px;border-radius:100%;background-image:url('<?php if($self_user['image'] === 'AVATAR.png'){echo 'http://localhost/final/user_data/AVATAR.png';} else{ echo 'http://localhost/final/user_data/'.$self_user['image']; } ?>');background-size:cover;background-position:center center;" class="left"></div>
             <input type="hidden" name="current_circle_id" value="<?php echo $current_circle_id; ?>">
					<div>
					 &nbsp;<span style="font-weight:100;color:#888;"><?php echo $self_user['user_name']; ?></span>
					</div>
          <input type="hidden" name="type_post" value="<?php $circle_name = $_GET['circle_name'];echo $circle_name; ?>">
          <br/>
				</div>
				 <div class="col s12 m12 l12 input-field"> 	<!-- div for post area/textarea -->
						<textarea class="materialize-textarea" id="textarea1" name="statas" required></textarea>
						 <label for="textarea1">Type Message</label>
						  <div class="input-field file-field">
				 			 <div class="btn green  left" >
				 			 <i class="fa fa-camera white-text"></i>
				 		   <input  class="btn btn-floating" type="file" name="post_image">
				 		 </div>
				 	 </div>
				<button type="submit" name="submit" class="btn green btn-floating white-text right"> <i class="fa fa-paper-plane-o"></i> </button>
				</div>
		   </form>
			</div>
  	</div>
   </div>
<br>
					<?php
											$conn = mysqli_connect("127.0.0.1", "root","","community");
											$sql3 = "SELECT * from user,circle_posts where user.user_id = circle_posts.u_id AND circle_posts.circle_id = $current_circle_id ORDER BY circle_posts.post_id DESC";
											$result = mysqli_query($conn,$sql3);
																				while($row = mysqli_fetch_assoc($result))
											{
												static $i=3;
												if($row['user_id'] == $row['u_id'])
										{
											echo '<div data-aos="fade-up" data-aos-duartion="2000" data-aos-easing="linear" class="row card  z-depth-3" style="width:51%;margin:0 auto;">

											 <div  class ="col s12 m12  l12 card-content" >
											 <div style="width:50px;height:50px;border-radius:100%;background-image:url(\'http://localhost/final/user_data/'.$row['image'].'\');background-size:cover;background-position:center center;" class="left"></div>
											 <div>'; if($_SESSION['user_id'] === $row['user_id']){echo'<a href="#" class="right dropdown-button" data-activates="dropdown'.$i.'" > &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down black-text"></i> </a>';}
											 echo'
											 &nbsp; <span style="font-weight:100;color:#888;"><a href="user_profile_guest.php?u_id='.$row['user_id'].'">'.$row['user_name'].'</a></span> <span style="font-weight:100;color:#888;display:block;text-align:right" class="right">'.date('D G:m a',strtotime($row['times'])).'</span>
											 </div> <br><br>
											 <div class="divider"></div>
                       <br>
											 <p class="flow-text" style="font-size:18px;font-weight:100">
												'.$row['status'].'
											 </p><br>';if($row['post_image'] != NULL)
                       {
                          echo '
                          <div style="background-image:url(circle_posts/'.$row["post_image"].');background-size:cover;background-position:center center;width:100%;height:50%;" class="z-depth-4">

                          </div>';
                       }
                       $circle_post_review_id = $row['post_id'];
                       $review_query = "SELECT count(*) as total FROM circle_post_review WHERE post_id = $circle_post_review_id AND review=1";
                       $review_result = mysqli_query($conn,$review_query);
                       $review_row = mysqli_fetch_assoc($review_result);
                       $d_review_query = "SELECT count(*) as total FROM circle_post_review WHERE post_id = $circle_post_review_id AND review=0";
                       $d_review_result = mysqli_query($conn,$d_review_query);
                       $d_review_row = mysqli_fetch_assoc($d_review_result);
                       echo '
                       <br>
											 <div class="card-action">
											 	<div>
												<div class="left " style="display:inline-block">
                        <center style="display:inline-flex" ><i  data-id="'.$row['post_id'].'" class="fa fa-thumbs-up blue-text liker" style="font-size:24px"></i>&nbsp;&nbsp; <div class="like-count" id="L'.$row['post_id'].'" style="width:25px;height:25px;border-radius:100%;background-color:#eee;">'.$review_row['total'].'</div> </center>
                        </div>
                        <div class="right ">
                        <center style="display:inline-flex">
                        <div class="dislike-count" id="D'.$row['post_id'].'" style="width:25px;height:25px;border-radius:100%;background-color:#eee;">'.$d_review_row['total'].'</div>&nbsp;&nbsp;
                        <i data-id="'.$row['post_id'].'" class="fa fa-thumbs-down red-text disliker" style="font-size:24px"></i></center>
                        </div>
                        <div class="center">
                        <a href="#commentx" id="p'.$row['post_id'].'" class="comment-button modal-trigger" data-activates="commentx"><i class="fa fa-comments green-text" style="font-size:32px;"></i></a>
                        </div>

											 	</div>
                       </div>
											</div>';
                      $h = $row['post_id'];
                      $query = "SELECT * FROM `comment`,`user` WHERE  '$h' = comment.p_id AND user.user_id = comment.user_id";
                      $R = mysqli_query($conn,$query);
                      while($comm = mysqli_fetch_assoc($R))
                      {
                        echo '<div class="card col s12 m12 l12" style="margin-bottom:0 !important;margin-top:0 !important">
                          <div class="card-content">
                          <div style="width:40px;height:40px;border-radius:100%;word-wrap:break-word;background-image:url(\' user_data/'.$comm['image'].'\');background-size:cover;background-position:center center;" class="left"></div>
                            <span style="font-size:16px;color:#888;"><a href="user_profile_guest.php?u_id='.$comm['user_id'].'">'.$comm['user_name'].'</a>
                              <a href="#replyx" id="p'.$comm['comment_id'].'" class="reply-toggle modal-trigger right" data-activates="replyx"><i class="fa fa-reply grey-text" style="font-size:24px;"></i></a>

                            </span><br>
                            <span style="font-size:13px;color:#333;display:inline-block;margin-top:2px;width:auto;max-width:100%;padding:12px 24px;word-wrap:break-word;border-radius:100px;background-color:#ddd">'.$comm['status'].'</span>
                          </div>
                        </div>';
                        $comment_idx = $comm['comment_id'];
                        $query_repy = "SELECT * FROM `comment_reply`,`user` WHERE  '$comment_idx' = comment_reply.comment_id AND comment_reply.user_id = user.user_id ";
                        $Replies = mysqli_query($conn,$query_repy);
                          while($repliesx = mysqli_fetch_assoc($Replies))
                          {
                            echo '<div class="card col s12 m12 l12" style="margin-bottom:0 !important;margin-top:0 !important;">
                              <div class="card-content" style="margin-left:10% !important;border-left:2px solid #aaa;width:auto;margin-bottom:3px;">
                              <div style="width:40px;height:40px;border-radius:100%;word-wrap:break-word;background-image:url(\' user_data/'.$repliesx['image'].'\');background-size:cover;background-position:center center;" class="left"></div>
                                <span style="font-size:16px;color:#888;"><a href="user_profile_guest.php?u_id='.$repliesx['user_id'].'">'.$repliesx['user_name'].'</a>
                                  <a href="#replyx" id="p'.$repliesx['comment_id'].'" class="reply-toggle modal-trigger right" data-activates="replyx"><i class="fa fa-reply grey-text" style="font-size:24px;"></i></a>
                                </span><br>
                                <span style="font-size:13px;color:#333;display:inline-block;margin-top:2px;width:auto;max-width:100%;padding:12px 24px;word-wrap:break-word;border-radius:100px;background-color:#ddd">'.$repliesx['body'].'</span>
                              </div>
                            </div>';
                          }

                      }
                      echo '
                      </div>
                      <br>

                      <ul class="dropdown-content" id="dropdown'.$i.'">
                      												<li>
                      													<a href="delete_post.php?id='.$row['post_id'].'">Delete</a>
                      												</li>
                      											</ul>';

											$i++;

										}

											}


				?>

   <div class="modal bottom-sheet" id="commentx">
      <div class="modal-content row">
        <form action="circle_comment_upload.php" method="post">
          <div class="input-field col s12 m12 l12">
            <input id="comment" type="text" name="comment_status" autofocus/>
            <label for="comment">Share Your Thoughts</label>
          </div>
          <input type="hidden" id="form-post-id" name="post_id" value=""/>

          <div class="col s12 m12 l12">
            <button type="submit" class="btn btn-floating green right" name="button"> <i class="fa fa-paper-plane-o"></i></button>
          </div>
        </form>
      </div>
   </div>





   <div class="modal bottom-sheet" id="replyx">
      <div class="modal-content row">
        <form action="circle_reply_upload.php" method="post">
          <div class="input-field col s12 m12 l12">
            <input id="comment" type="text" name="reply_body" autofocus/>
            <label for="comment">Reply To Comment</label>
          </div>
          <input type="hidden" name="form-user-id" value="<?php echo $_SESSION['user_id']; ?>"/>
          <input type="hidden" id="form-comment-id" name="form-comment-id" value=""/>
          <div class="col s12 m12 l12">
            <button type="submit" class="btn btn-floating green right" name="button"> <i class="fa fa-paper-plane-o"></i></button>
          </div>
        </form>
      </div>
   </div>


</body>




<script type="text/javascript">
$('.modal').modal();
$(document).ready(function(){
AOS.init();
$('.comment-button').click(function(event){
 var post_id = $(this).attr('id');
  post_id = post_id.substr(1,post_id.length);
$('#form-post-id').val(post_id);
});
});
$('.reply-toggle').click('click',function(){
  var comment_id = $(this).attr('id');
  comment_id = comment_id.substr(1,comment_id.length);
  $('#form-comment-id').val(comment_id);
});

$('.liker').on('click',function(){
  var post_id_like = $(this).attr('data-id');
  var http = new XMLHttpRequest();
  http.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200)
    {
      var parsed = JSON.parse(this.responseText);
      if(parsed.type == "error")
      {
        alert('You can\'t like and dislike post at the same time' );
      }else {
          var liker_counter = document.getElementById('L'+parsed.post_id);
          liker_counter.innerHTML = parsed.count ;
      }
    }
  }
  http.open('GET','circle_post_review.php?pid='+post_id_like+'&type=1',true);
  http.send();


});



$('.disliker').on('click',function(){
  var post_id_like = $(this).attr('data-id');
  var http = new XMLHttpRequest();
  http.onreadystatechange = function()
  {
    if(this.readyState == 4 && this.status == 200)
    {
        var parsed = JSON.parse(this.responseText);
        if(parsed.type == "error")
        {
          alert('You can\'t like and dislike post at the same time' );
        }else {
          var liker_counter = document.getElementById('D'+parsed.post_id);
          liker_counter.innerHTML = parsed.count ;

        }
    }
  }
  http.open('GET','circle_post_review.php?pid='+post_id_like+'&type=0',true);
  http.send();


});











</script>

<?php include('partials/footer.php'); ?>
</html>
