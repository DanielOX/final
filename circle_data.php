<?php
session_start();
$status =  $_POST['statas'];
$cname = $_POST['type_post'];

$current_circle_id = $_POST['current_circle_id'];
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$conn = mysqli_connect("127.0.0.1", "root","","community");
$date = date("Y-m-d H:i:s");
//$time = now();
$f = $cname.'.php';

$filename =  time().'.'.substr($_FILES['post_image']['name'],strpos($_FILES['post_image']['name'],'.')+1);
if($_FILES['post_image']['name'] === '')
{
  $sql="INSERT INTO circle_posts (circle_id,u_id,status,times) VALUES ($current_circle_id,$uid,'$status',CURRENT_TIMESTAMP)";
}
else
{
  $t = time();
  mkdir('circle_posts/'.$t,0777,true);
  chmod('circle_posts/'.$t,0777);
  move_uploaded_file($_FILES['post_image']['tmp_name'],'circle_posts/'.$t.'/'.$filename);
  $filename = $t.'/'.$filename;

  $sql="INSERT INTO circle_posts (circle_id,u_id , status ,times,post_image) VALUES ( $current_circle_id,$uid,'$status',CURRENT_TIMESTAMP,'$filename')";
}
$result = mysqli_query($conn, $sql);

if ($result)
{

  header("location: view_circle_generic.php".'?circle_id='.$current_circle_id.'&circle_name='.$cname);
}
else {
	echo "error ";
	}

mysqli_close($conn);
?>
