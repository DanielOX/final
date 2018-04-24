<?php
session_start();
if(!(isset($_SESSION['user_id']))) {
echo "<script>window.location.assign('login_page.php');</script>";
}
$conn = mysqli_connect("127.0.0.1", "root","","community");

function sanitizer($data)
{
  $data = stripclashes(htmlspecialchars(str_replace(array('(',')',$data))));
  return $data;
}
$to_delete = $_GET['id'];
$current_circle_id = $_GET['circle_id'];
$QUERY = "DELETE  FROM circle_posts where post_id = '$to_delete'";
$RESULT = mysqli_query($conn,$QUERY);
if($RESULT)
{
  header('location: view_circle_generic.php?circle_id='.$current_circle_id);
}
else
{
  echo 'An Unexpected Error Ocurred, please try again later';
}


 ?>
