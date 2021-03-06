<?php
session_start();
if(!isset($_SESSION['user_name']))
{
  header('location: login_page.php');
}
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
  <div class="row">
      <div class="col s12 m12 l12" style="height:60%;width:100%;background-image:url('nicole-harrington-516250.jpg');background-attachment:fixed;background-size:cover;background-position:center center">

        <div id="profile-image-custom" style="width:200px;height:200px;border:5px solid white;border-radius:100%;position:relative;top:65%;background-image:url('');      background-size:cover;background-position:center center;">
            <center>
              <a href="edit_profile.php" id="image-change" style="width:100%;height:100%;padding:12px 24px;color:white;position:absolute;top:35%;left:0%;">
                <i class="fa fa-camera" style="font-size:32px"></i>
              </a>

            </center>
        </div>
        <div style="position:relative;left:16.5%;top:22.5%;width:80%;height:50px">

          <span style="color:#fff;font-size:24px"><?php echo $_SESSION['user_name']; ?></span><br>
          <span style="color:#fff;font-size:18px"><?php echo '&nbsp;'.$_SESSION['email']; ?></span>
          <a href="#" type="button" title="My Circles" class="btn btn-floating waves-effect purple white-text right"> <i class="fa fa-circle-o-notch" style="font-size:18px"></i> </a>
        </div>

        </div>

      </div><br><br>
          <div class="row">
            <div style="margin-left:5px;top:49.5%" class="card col s12 m4 l4 z-depth-3 left bojang">
              <div class="card-content">
                  <center> <span> <?php echo $_SESSION['user_name']; ?> </span> </center>
                  <center> <div style="width:10px;height:2px;border-radius:25px;background-color:"></div> </center>
                  <br>
                  <ul class="collection">
                    <li class="collection-item"> <i class="fa fa-transgender-alt"></i> </li>
                    <li class="collection-item"> <i class="fa fa-circle-o-notch"></i> </li>
                    <li class="collection-item"> <i class="fa fa-map-marker"></i> </li>
                    <li class="collection-item"> <i class="fa fa-briefcase"></i> </li>
                    <li class="collection-item"> <i class="fa fa-university"></i> </li>
                    <li class="collection-item"> <i class="fa fa-graduation-cap"></i> </li>

                  </ul>
              </div>
            </div>
              <?php
    											$conn = mysqli_connect("127.0.0.1", "root","","community");
                          $upid = $_SESSION['user_id'];
    											$sql3 = "SELECT * from user,education where user.user_id IN (select user_id from `education` WHERE user_id = '$upid') ORDER BY education.post_id DESC";
    											$result = mysqli_query($conn,$sql3);
    																				while($row = mysqli_fetch_assoc($result))
    											{
    												static $i=3;
    												if($row['user_id'] == $row['u_id'])
    										{
    											echo '<div data-aos="fade-up" right data-aos-duartion="2000" data-aos-easing="linear" class="card col s12 m7 l7 right  z-depth-3" style="margin-right:20px">

    											 <div  class ="col s12 m12 right l12 card-content" >
    											 <div style="width:50px;height:50px;border-radius:100%;background-image:url(\' user_data/'.$row['image'].'\');background-size:cover;background-position:center center;" class="left"></div>
    											 <div>'; echo'<a href="#" class="right dropdown-button" data-activates="dropdown'.$i.'" > &nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down black-text"></i> </a>';
    											 echo'
    											 &nbsp; <span style="font-weight:100;color:#888;">'.$row['user_name'].'</span> <span style="font-weight:100;color:#888;display:block;text-align:right" class="right">'.date('D G:m a',strtotime($row['times'])).'</span>
    											 </div> <br><br>
    											 <div class="divider"></div>
                           <br>
    											 <p class="flow-text" style="font-size:18px;font-weight:100">
    												'.$row['status'].'
    											 </p><br>';if($row['post_image'] != 'NULL')
                           {
                              echo '
                              <div style="background-image:url(user_posts/'.$row['post_image'].');background-size:cover;background-position:center center;width:100%;height:50%;" class="z-depth-4">

                              </div>';
                           }
                           echo '
                           <br>
    											 <div class="card-action">
    											 	<div>
    												<div class="left" style="display:inline-block">
                            <center><i class="fa fa-thumbs-up black-text " style="font-size:24px"></i>&nbsp;&nbsp;</center>
                            </div>
                            <div class="right">
                            <center ><i class="fa fa-thumbs-down black-text " style="font-size:24px"></i></center>
                            </div>
                            <div class="center">
                            <a href="#commentx" id="p'.$row['post_id'].'" class="comment-button modal-trigger" data-activates="commentx"><i class="fa fa-comments grey-text" style="font-size:32px;"></i></a>
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
                                <span style="font-size:16px;color:#888;">'.$comm['user_name'].'
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
                                    <span style="font-size:16px;color:#888;">'.$repliesx['user_name'].'
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
                          													<a href="delete.php?id='.$row['post_id'].'">Delete</a>
                          												</li>
                          											</ul>';

    											$i++;

    										}

    											}


    				?>

          </div>

<?php include('partials/footer.php'); ?>
<script type="text/javascript">
AOS.init();
var profile_image_custom = document.getElementById('profile-image-custom');
$(document).ready(function(){

    $(document).on('scroll',function(){
      if(window.scrollY <= 200)
      {
        var x = document.getElementsByClassName('bojang')[0];
        x.style.position = 'static';
      }
      else {
        var x = document.getElementsByClassName('bojang')[0];
        x.style.position = 'fixed';
      }
    });
      image_change.style.display = "none";
});
var image_change = document.getElementById('image-change');
profile_image_custom.addEventListener('mouseover',function(){
  image_change.style.display = "block";
});
profile_image_custom.addEventListener('mouseout',function(){
  image_change.style.display = "none";
});

</script>
</body>
</html
