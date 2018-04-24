<?php
  session_start();
  $u_id = $_SESSION['user_id'];
  $name = $_POST['name'];
  $description = $_POST['description'];
  $address = $_POST['address'];
  $conn = mysqli_connect('127.0.0.1','root','','community');
if($conn)
{
  $filename = time().substr($_FILES['image']['name'],strpos($_FILES['image']['name'],'.'));
  if(move_uploaded_file($_FILES['image']['tmp_name'],'event_images/'.$filename))
  {
    $query = "INSERT INTO events (id,name,description,address,isActive,image,organized_on,organizer_id) VALUES (NULL,'$name','$description','$address',0,'$filename',CURRENT_TIMESTAMP,$u_id)";
    $result = mysqli_query($conn,$query);
    if(!$result)
    {
      echo "Problem while data storiage, unexpected exception";
    }else
    {
        $last_id = $conn->last_id;
        header('location: events.php');
    }

  }
  else
  {
      echo "Problem while stroing event image, try again later";
  }

}
else
{
  echo "Problem while database connection, unexpected exception";

}
?>
