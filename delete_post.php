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
$type = $_GET['type'];
$QUERY = "DELETE  FROM $type where post_id = '$to_delete'";
$RESULT = mysqli_query($conn,$QUERY);
$type .= '.php';
if($RESULT)
{
  header('location: '.$type);
}
else
{
  echo 'An Unexpected Error Ocurred, please try again later';
}


 ?>
