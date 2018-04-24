<?php

include('connection.php');
$post_id =  $_GET['id'];
$post_type = $_GET['type'];

$query = "SELECT * FROM $post_type WHERE post_id = $post_id";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$uid = $row['u_id'];
$query = "SELECT * FROM `user` WHERE user_id = '$uid'";
$UYT = mysqli_query($conn,$query);
$self_user = mysqli_fetch_assoc($UYT);

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Edit Post</title>
    <link rel="stylesheet" href="Materialize/materialize.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
    <script type="text/javascript" src="Materialize/materialize.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col s12 m8 l8 offset-l2 offset-m2 card">
              <div class="card-body" style="padding:18px 28px">
                <form method="post" action="update_post.php" style="margin-bottom:10px"  enctype="multipart/form-data">
                   <div class="col s12 m12 l12 input-file">     <!-- upper portion of div for add photo etc-->
                      <div style="width:50px;height:50px;border-radius:100%;background-image:url('<?php if($self_user['image'] === 'AVATAR.png'){echo 'http://localhost/final/user_data/AVATAR.png';} else{ echo 'http://localhost/final/user_data/'.$self_user['image']; } ?>');background-size:cover;background-position:center center;" class="left"></div>
                     <div>
                      &nbsp;<span style="font-weight:100;color:#888;"><?php echo $self_user['user_name']; ?></span>
                     </div>
                     <input type="hidden" name="type_post" value="<?php echo $post_type; ?>">
                     <br/>
                   </div>
                    <div class="col s12 m12 l12 input-field"> 	<!-- div for post area/textarea -->
                       <textarea class="materialize-textarea" id="textarea1" name="statas" required><?php echo $row['status']; ?></textarea>
                        <label for="textarea1">Type Message</label>
                         <div class="input-field file-field">
                          <div class="btn green  left" >
                          <i class="fa fa-camera white-text"></i>
                          <input  class="btn btn-floating" type="file" name="post_image">
                        </div>
                      </div>
                      <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                   <button type="submit" name="submit" class="btn green btn-floating white-text right"> <i class="fa fa-paper-plane-o"></i> </button>
                   <br>

                   </div>
                  </form>
              </div>

                <br><br>
            </div>
        </div>
    </div>
  </body>
</html>
