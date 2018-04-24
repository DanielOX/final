<?php
$u_name = $_POST["user_name"];
$email = $_POST["email"];
$pass = $_POST["password"];
$pno = $_POST["phoneno"];


$conn = mysqli_connect('127.0.0.1', 'root','','community');
$sql="select * from user where email like '".$email."';";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	echo "already register";
}
else
{

$sql = "INSERT INTO `user` (user_name,email,image,password,PhoneNo) VALUES ('$u_name','$email','AVATAR.png','$pass',$pno)";
$result = mysqli_query($conn,$sql);
$last_id =  mysqli_insert_id($conn);
if(!$result)
{
	echo "Unexpected error occured! please <a href='register_page.php'>try again</a> later ";
	exit(0);
}

$sql = "INSERT INTO user_information (user_id,address,works_at,studied_at,isUndergraduate) VALUES ($last_id,'undefined','undefined','undefined','undefined')";
$result = mysqli_query($conn,$sql);
if(mkdir('user_data/'.$email))
{
	echo "file_created";
}else {
	echo "-_-";
}
header('location: login.php');
mysqli_close($conn);
}
?>
