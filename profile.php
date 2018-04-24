<?php
session_start();
function sanitizer($data)
{
  $data = stripslashes(trim(htmlspecialchars(str_replace(array('(',')'),'',$data))));
  return $data;
}
var_dump($_POST);
$u_name     =     sanitizer($_POST["user_name"]);
$pass       =     sanitizer($_POST["password"]);
$email = $_SESSION['email'];
$graduation =     sanitizer($_POST['graduation']);
$gender     =     sanitizer($_POST['gender']);
$address    =     sanitizer($_POST['address']);
$institute  =     sanitizer($_POST['universty']);
$works_at   =     sanitizer($_POST['works_at']);



$uid = $_SESSION["user_id"];
$conn = mysqli_connect("127.0.0.1", "root","","community");
$image = "";
$sql = "";
$result = "";


if($_FILES['image']['name'] !== "")
{

  $file_name = $_FILES['image']['name'];
  $image = $email.'/'.$file_name;
  $sql = "UPDATE user SET password='$pass',user_name = '$u_name',image='$image'  WHERE user_id=$uid";
  $result = mysqli_query($conn,$sql);
  if($result){
  $sql = "UPDATE user_information SET gender = '$gender',address='$address',studied_at='$institute',isUndergraduate='$graduation',works_at='$works_at' WHERE user_id=$uid";
  $result = mysqli_query($conn,$sql);
  }
  move_uploaded_file($_FILES['image']['tmp_name'],'user_data/'.$_SESSION['email'].'/'.$file_name);
  $_SESSION['image'] = $image;
  $conn->close();

}
else
{
  $sql = "UPDATE user SET password='$pass',user_name = '$u_name' WHERE user_id=$uid";
  $result = mysqli_query($conn,$sql);
  if($result){
  $sql = "UPDATE user_information SET gender = '$gender',address='$address',studied_at='$institute',isUndergraduate='$graduation',works_at='$works_at' WHERE user_id=$uid";
  $result = mysqli_query($conn,$sql);
  }
  $conn->close();
}




















if($result){
  $_SESSION['user_name'] = $u_name;
  $_SESSION['email'] = $email;
  header('location: user_profile.php');}else{ echo "Couldn\t Update Fatal Error!"; }


?>
