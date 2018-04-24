<?php
session_start();
if(isset($_SESSION['user_id'])) 
	{
		$_SESSION["category_name"] ="contact";
		$_SESSION["page_name"] ="bussiness.php";
  		//echo "Your session is running. user id is " .  $_SESSION['user_id'];
  		//echo "<br>";
  		//echo $_SESSION['user_id']."<br>";
		//echo $_SESSION['user_name']."<br>";
		//echo $_SESSION['category_name'];
		$category=$_SESSION['category_name'];
   	}
  
else 
	{
		echo "<script>window.location.assign('login_page.php'); </script>";
	}


?>





<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="view port" content="width=device-width,initial-scale=1">
	<title>Community Communicator</title>
	<link rel="stylesheet" href="CSS/Bootstrap.css"/>
	<link rel="stylesheet" href="CSS/mystyle.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<!--header-->
<!-- *****1st container*****-->
	<div class="container-fluid top_bar">
		<div class="container">

			<div class="row">
				<div class="col-sm-3">
				<a href="https://www.facebook.com/" data-toggle="tooltip" data-placement="bottom"  title="facebook" class="social_icons"><i class="fa fa-facebook-square" style="font-size:25px; color:white;"></i></a>
				<a href="https://www.youtube.com/" data-toggle="tooltip" data-placement="bottom"  title="youtube" class="social_icons"><i class="fa fa-youtube" style="font-size:25px; color:red;"></i></a>
				
				</div>
				<div class="col-sm-9">
				
<form action="logout.php" ><input type="submit" style="float:right;background:#F9C5EA;;" value="Logout" ></form></div>
					<form action="edit_profile.php" ><input type="submit" style="float:right;background:#F9C5EA;;" value="Edit profile" ></form>				</div>
			</div><!--end of row-->
		</div><!--end of container-->
	</div><!--end of container fluid-->
<!-- End of first container-->


<!--************navbar***-->
<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 my_menu">
						
						<nav class="navbar navbar-default">
							
							<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							</div><!-- end of navbar header-->
							
							<div class="collapse navbar-collapse" id="mynavbar">
							
							<ul class="nav navbar-nav pull-center">
							<li class="active"><a href="index.php">Home</a></li>
							
							
							
							                <li class="dropdown">
                  <a href="index.php" class="dropdown-toggle" data-toggle="dropdown">categories<i class="icon-angle-down"></i></a>
                  <ul class="dropdown-menu">
                      <li><a href="sports.php">Sports</a></li>
                      <li><a href="education.php">Education</a></li>
                      <li><a href="health.php">Health</a></li>
                      <li><a href="bussiness.php">Bussiness</a></li>
                  </ul>

               </li>
							
							
							
							
							
								<li><a href="contact.php">Contact us</a></li>
								<li><a href="circle.php">Create Circles</a></li>
								<li><a href="news.php">Latest News</a></li>
							</ul>

							</div> <!-- end of collapse-->
						</nav>
			</div>
			</div>
		</div>
	</div>
<!-- end of navigation bar-->
<!--end of header-->




<!--****** 3rd container*******-->
		<!-- **************Main****************** -->
			
					<div style="height:auto;width:27%;background-color:#454545;float:left;">
						1<br><br><br><br>2<br><br><br><br>3<br><br><br><br>4<br><br><br><br>5<br><br><br><br>6<br><br><br><br>7<br><br><br><br>8
						<br><br><br><br>9<br><br><br><br>10<br><br><br><br>11					
					</div>		
			<div  style="height:auto;width:46%;background-color:#454545;float:left">
						1<br><br><br><br>2<br><br><br><br>3<br><br><br><br>4<br><br><br><br>5<br><br><br><br>6<br><br><br><br>7<br><br><br><br>8
						<br><br><br><br>9<br><br><br><br>10<br><br><br><br>11
					</div>

					<div  style="height:auto;width:27%;background-color:#454545;float:left">
						1<br><br><br><br>2<br><br><br><br>3<br><br><br><br>4<br><br><br><br>5<br><br><br><br>6<br><br><br><br>7<br><br><br><br>8
						<br><br><br><br>9<br><br><br><br>10<br><br><br><br>11
					</div>
<!--************footer*********-->
<div class="container-fluid" style="height:150px;background-color:#666666">


</div>
<!-- end of footer*********---->
					
</body>
</html>
