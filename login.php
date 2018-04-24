<?php
$email = $_POST["email"];
$passs = $_POST["password"];
$user = "root";
$pas = "";
$db = "community";
$db = new mysqli('127.0.0.1', $user, $pas, $db) or die("Unable to connect");
$sql = "SELECT user_id ,user_name, email , password,image FROM user where email = '$email' AND password='$passs'";
$result = mysqli_query($db,$sql);

if ($result->num_rows > 0)
{
		$row  = mysqli_fetch_array($result);
		session_start();
		$_SESSION["user_id"] = $row['user_id'];
		$_SESSION["user_name"] = $row['user_name'];
		$_SESSION['email'] = $row['email'];
		$_SESSION['image'] = $row['image'];
		mysqli_close($db);
		header('location: index.php');
}
else
		{
			mysqli_close($db);
			header('location: login_page.php');
    }


?>
