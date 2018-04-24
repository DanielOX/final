<?php

include('connection.php');
$circle_id = $_GET['circle_id'];
$user_id = $_GET['user_id'];


if($conn)
{
  $QUERY = "DELETE  FROM user_groups WHERE group_id = $circle_id AND user_id = $user_id";
  $RESULT = mysqli_query($conn,$QUERY);
    if($RESULT)
    {
      header('location: circle.php');
    }
    else {
    }
}






 ?>
