<?php
$conn = mysqli_connect('127.0.0.1','root','','community');
$e_id = $_GET['id'];
if($conn)
{
  $query = "UPDATE events SET isActive = 1 WHERE id = $e_id";
  $result = mysqli_query($conn,$query);
  if(!$result)
  {
      echo "Unexpected Error Occured while Approving Events!";
  }
  else
  {
      header('location: ../visulaize-events.php');
  }

}
else
{
      echo "Unexpected Error Occured while Approving Events!";
}







 ?>
