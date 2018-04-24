<?php
session_start();
$status =  $_POST['statas'];
$cname = $_POST['type_post'];
$uid = $_SESSION['user_id'];
$uname = $_SESSION['user_name'];
$conn = mysqli_connect("127.0.0.1", "root","","community");
$date = date("Y-m-d H:i:s");
// $time = now();
$f = $cname.'.php';
$sql = "";
$filename =  time().'.'.substr($_FILES['post_image']['name'],strpos($_FILES['post_image']['name'],'.'));
if($_FILES['post_image']['name'] === '')
{
  $sql="INSERT INTO $cname (post_id,u_id , status ,times) VALUES (NULL,$uid,'$status',CURRENT_TIMESTAMP)";
}
else
{
  $t = time();
  mkdir('user_posts/'.$t);
  move_uploaded_file($_FILES['post_image']['tmp_name'],'user_posts/'.$t.'/'.$filename);
  $filename = $t.'/'.$filename;
  $sql="INSERT INTO $cname (post_id,u_id , status ,times,post_image) VALUES (NULL,$uid,'$status',CURRENT_TIMESTAMP,'$filename')";
}
$result = mysqli_query($conn, $sql);

if($result)
{

  header("location: $f");
}
else
{
//	echo 'dd';
}

mysqli_close($conn);
?>
