<?php
session_start();

$conn = mysqli_connect('127.0.0.1','root','','community');
$status = $_POST['comment_status'];
$post_id = $_POST['post_id'];
$uid = $_SESSION['user_id'];
$query = "INSERT INTO `comment` (p_id,user_id,status) VALUES($post_id,$uid,'$status')";
$result = mysqli_query($conn,$query);
mysqli_close($conn);

header('location: view_circle_generic.php');

?>
