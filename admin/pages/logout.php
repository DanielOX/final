<?php
session_start();
$_SESSION= array();
session_destroy();
if(isset($_SESSION['user_name']))
{
  echo "An unexpected error occured while logging you out!";
}
else
{
  header('location: login.php');

}
?>
