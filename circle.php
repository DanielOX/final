		<!--**********Php code********------>
<?php
session_start();
if(!(isset($_SESSION['user_id']))) {
echo "<script>window.location.assign('login_page.php'); </script>";
}

$checkx = 0;
$error = "";
$conn = mysqli_connect('127.0.0.1','root','','community');
$limit = 0;
$sql = "SELECT * FROM  circles ORDER BY id DESC LIMIT $limit,10";
$result2 = mysqli_query($conn,$sql);
// CREATING CIRCLES

if(isset($_POST['submit']))
{
  $path = "";
 if($_FILES['group_image']['error'] != 4)
   {
     $circle_name = $_POST['name'];
     $sql = "SELECT * FROM  circles WHERE name = '$circle_name'";
     $chalk = mysqli_query($conn,$sql);
     $c_counter = mysqli_num_rows($chalk);
     $filename = $_FILES['group_image']['name'];
      if(file_exists('circles/'.$_POST['name']) && $c_counter > 0)
      {
          exit();
          $error = 'Group Already Exists!';
      }
      mkdir('circles/'.$_POST['name']);
      $path = 'circles/'.$_POST['name'].'/'.$filename;
      move_uploaded_file($_FILES['group_image']['tmp_name'],$path);
   }
	$circle_name = $_POST['name'];
	$circle_description = $_POST['description'];
  $circle_owner = $_SESSION['user_id'];
	$sql  = "INSERT INTO circles  VALUES (NULL,'$circle_name','$circle_description','$path',$circle_owner)";
	$result = mysqli_query($conn,$sql);
  header('location: circle.php');
}

/*------------------------------------
      JOINING USERS TO CIRCLES
-------------------------------------*/

if(isset($_POST['add-to-groups']))
{
  $group_id = $_POST['group_id'];
  $user_id = $_SESSION['user_id'];
  $checkSQL = "SELECT * FROM user_groups WHERE group_id = '$group_id' AND user_id = '$user_id'";
  $checkRES = mysqli_query($conn,$checkSQL);
  if(mysqli_num_rows($checkRES) <= 0)
  {
    $sql = "INSERT INTO user_groups VALUES (NULL,'$group_id','$user_id')";
    $run = mysqli_query($conn,$sql);
  }
  else
  {
    $error = "<center><p class='flow-text white-text'> <i class='fa fa-exclamation-triangle  white-text' style='font-size:24px'></i>  You Already Joined This Group! </p> </center>";
    $checkx = 1;
  }

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
<script type="text/javascript">


$(document).ready(function(){

    $(".modal").modal();

});

</script>
<?php include('partials/header.php'); ?>

<a style="position:fixed;bottom:84%;left:90%"
class="btn btn-floating green right modal-trigger"
href="#modalx"> <i class="fa fa-plus"></i>
</a>
<div class="container">
  <div class="row">

<?php
while($row = mysqli_fetch_array($result2))
{
$img = "http://localhost/final/";
$img .= $row['image'];

echo '
<div data-aos="fade-up" data-aos-duration="500" data-aos-easing="linear"  class="card col s12 m3 l3  z-depth-3" style="margin-left:35px">
<div class="card-content">

<center>	<div style="width:180px;height:180px;border:1px solid #eee;border-radius:100%;background-image:url('.$img.');background-size:cover;" class="image-responsive">
';
$grouper = $row['id'];
$count_query = "SELECT count(*) as count FROM user_groups WHERE group_id = '$grouper'";
$count_res = mysqli_query($conn,$count_query);
$count_re = mysqli_fetch_assoc($count_res);
echo '<div class="green" style="width:40px;height:40px;;border-radius:100%;position:relative;top:10%;left:35%"> <center class="white-text"> <span class="white-text" style="display:block;position:relative;top:6.5px">
'.$count_re['count'].'
</span></center>  </div>
</div>
</center><br>
<div class="divider"></div><br>';
echo '<form action="" method="post">
  <button type="submit" name="add-to-groups" id="firer-'.$row['id'].'" class="fire-scroller btn small btn-floating blue right"><i class="fa fa-plus"></i></button>
  <a class="btn btn-green" href="view_circle_generic.php?circle_id='.$row['id'].'&circle_name='.$row['name'].'"> <i class="fa fa-eye"></i> </a>
  <input type="hidden" name="group_id" value="'.$row['id'].'">
</form>
';
echo '
<p class="flow-text" style="font-size:18px;">'.substr($row['name'],1,15).'...</p>
</div>
</div>
';
}

?>

</div>
</div>


<div id="modalx" class="modal">
<div class="modal-content">
<center> <p class="flow-text" style="font-size:24px"> Create Circles  </p> </center>
<form method="post" id="fomr"  enctype="multipart/form-data">
<div class="row">
<div class="col s12 m12 l12 input-field">
<input id="name" type="text" name="name"/>
<label for="name">Circle Name</label>
</div>
<div class="col s12 m12 l12 input-field">
<textarea name="description" class="materialize-textarea" id="description"></textarea>
<label for="description">Description</label>
</div>
<div class="col s12 m6 l6 input-field file-field">
	<div class="btn">
		<i class="fa fa-image"></i>
    <input type="file" name="group_image"/>
  </div>
	<div class="file-path-wrapper">
		<input type="text" class="file-path validate">
	</div>

</div>
<div class="col s12 m12 l12 input-field">
	<button type="submit" id="zx" class="right btn btn-floating green" name="submit"> <i class="fa fa-paper-plane-o"></i> </button>
</div>
</div>


</form>
</div>
</div>




<div id="modal1" class="modal bottom-sheet red">
  <div class="modal-content white-text">
    <?php echo $error.' !';
      $error = "";
     ?>
  </div>
</div>



<?php
if($checkx ==1){
  echo '<script>alert(\'You Already Joined This Group!\');</script>';
  $checkx = 0;
}
 ?>







<?php include('partials/footer.php'); ?>



<script type="text/javascript">
  $(document).ready(function(){
    AOS.init();
  });
</script>




</body>
</html>
