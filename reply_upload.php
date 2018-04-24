<?php
session_start();
if(!(isset($_SESSION['user_id'])))
{
  header('location: login_page.php');
}
function sanitizer($data)
{ 
  $data = stripcslashes(trim(htmlspecialchars(str_replace(array('(',')'),'',$data)))) ;
  return $data;
}


$uid = $_POST['form-user-id'];
$comment_id = $_POST['form-comment-id'];
$status = sanitizer($_POST['reply_body']);
$conn = mysqli_connect("127.0.0.1", "root","","community");
if($conn)
{
  $QUERY = "INSERT INTO comment_reply (reply_id,comment_id,user_id,body) VALUES (NULL,'$comment_id','$uid','$status')";
  $RESULT = mysqli_query($conn,$QUERY);
  mysqli_close($conn);
  if($RESULT)
  {
     header('location: education.php');
  }
  else
  {
    echo '<center> <p>Undefined or unexpected error occured while uploading data on server</p></center>';
  }
}
else
{
    echo 'Undefined or unexpected error occured while uploading data on server';
}




?>
