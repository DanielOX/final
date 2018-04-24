<?php
session_start();

$conn = mysqli_connect('127.0.0.1','root','','community');
$status = $_POST['comment_status'];
$post_id = $_POST['post_id'];
$uid = $_SESSION['user_id'];
$type = $_POST['type'];

$query = "INSERT INTO `comment` (p_id,user_id,status,type) VALUES($post_id,$uid,'$status','$type')";
$result = mysqli_query($conn,$query);
mysqli_close($conn);
$type .= '.php';
header('location: '.$type);

?>
