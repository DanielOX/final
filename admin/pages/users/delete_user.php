<?php

$u_id = $_GET['id'];
$conn = mysqli_connect('127.0.0.1','root','','community');

  $query = "DELETE FROM  user WHERE user_id = $u_id";
  $result = mysqli_query($conn,$query);
 if(!$result)
{
  echo "Undexpected error occured while deleting this user!";
}else {
  header('location: ../visulaize-user.php');
}









?>
