

<?php
session_start();
if(!isset($_SESSION['user_id']))
{
	header('location: login_page.php');
}

?>
												<!--**********HTML code********------>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-compatible" content="IE-edge">
	<meta name="view port" content="width=device-width,initial-scale=1">
	<title>Community Communicator</title>

	<link rel="stylesheet" href="Materialize/materialize.css">
	<script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
	<script type="text/javascript" src="Materialize/materialize.js"></script>


	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
<style media="screen">
	body{
		font-family: 'Raleway', sans-serif;
	}
	.carousel:hover
	{
			cursor:pointer;
	}
</style>
<body>

<?php include('partials/header.php'); ?>



<div class="carousel carousel-slider " id="carousel1">
<div class="carousel-item">
<img src="images/slide_1.jpg" alt="">
</div>
<div class="carousel-item">
<img src="images/slide_2.jpg" alt="">
</div>
<div class="carousel-item">
<img src="images/slide_3.jpg" alt="">
</div>

</div>


<div class="container" >
<div class="row">
	<br>
		<div class="col s12 m12 l12 card z-depth-4" >
			<div class="card-content">
				<center><p style="font-size:24px"> Welcome to community Communicator</p></center> <br>
				<p class="flow-text" style="font-size:18px;text-align:center">Communities are held together by common interest.
				It may be a hobby, something the community members are passionate about,
				a common goal, a common project, or merely the preference for a similar
				lifestyle, geographical location, or profession. Clearly people join the
				community because they care about this common interest that glues the community
				members together. Some stay because they felt the urge to contribute to the cause;
				others come because they can benefit from being part of the community</p>

			</div>

		</div>
	</div>
</div><!--end of content area--><br>
<br>

<!--******6th container*****---->
<!--our team-->
<div class="row" >
	<div class="col s12 m12 l12" >
		<div class="container">
			<div class="row">
		<div class="card z-depth-2 col s12 m4 l4 z-depth-5">
			<div class="card-content">
					<center><div style="width:250px;height:250px;border-radius:100%;background-image:url('images/bilal.PNG');background-size:cover;background-position:center center"></div></center>
			</div>
			<div class="card-action">
			<p class="flow-text">
				Bilal Ihsan
			</p>
			</div>
		</div>
		<div class="card z-depth-2 col s12 m4 l4 z-depth-5" >
			<div class="card-content">
					<center><div style="width:250px;height:250px;border-radius:100%;background-image:url('images/bilal.PNG');background-size:cover;background-position:center center"></div></center>
			</div>
			<div class="card-action">
			<p class="flow-text">
				Bilal Ihsan
			</p>
			</div>
		</div>
		<div class="card z-depth-2 col s12 m4 l4 z-depth-5" >
			<div class="card-content">
					<center><div style="width:250px;height:250px;border-radius:100%;background-image:url('images/bilal.PNG');background-size:cover;background-position:center center"></div></center>
			</div>
			<div class="card-action">
			<p class="flow-text">
				Bilal Ihsan
			</p>
			</div>
		</div>

			</div>


		</div>
	</div>
</div>

<!--************footer*********-->
<div class="container-fluid" style="height:150px;background-color:#666666">


</div>
<script type="text/javascript">
$('.dropdown-button').dropdown();
$(document).ready(function(){
	$('.button-collapse').sideNav();
	$('.carousel.carousel-slider').carousel({fullWidth:true});
});
</script>

</body>
</html>
