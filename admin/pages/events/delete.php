<?php
$conn = mysqli_connect('127.0.0.1','root','','community');
$e_id = $_GET['id'];
if($conn)
{
  $query = "DELETE FROM events WHERE id = $e_id";
  $result = mysqli_query($conn,$query);
  if(!$result)
  {
      echo "Unexpected Error Occured while Disapproving Events!";
  }
  else
  {
      header('location: ../visulaize-events.php');
  }

}
else
{
      echo "Unexpected Error Occured while Disapproving Events!";
}







 ?>
