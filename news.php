<?php session_start();
	if(!isset($_SESSION['user_name']))
	{
		header('location: login_page.php');
	}
 ?>
<?php include('partials/header.php'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Latest News</title>
		<link rel="stylesheet" href="Materialize/materialize.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  	<script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
  	<script type="text/javascript" src="Materialize/materialize.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style media="screen">
	.cover
	{
		width:100%;
		height:50%;
		background-size: cover;
		background-position: center center;
	}
	.cssload-container {
		width: 117px;
		margin: 0 auto;
		margin-top:25%;
	}

	.cssload-circle-1 {
		height: 117px;
		width: 117px;
		background: rgb(97,46,141);
	}

	.cssload-circle-2 {
		height: 97px;
		width: 97px;
		background: rgb(194,34,134);
	}

	.cssload-circle-3 {
		height: 78px;
		width: 78px;
		background: rgb(234,34,94);
	}

	.cssload-circle-4 {
		height: 58px;
		width: 58px;
		background: rgb(237,91,53);
	}

	.cssload-circle-5 {
		height: 39px;
		width: 39px;
		background: rgb(245,181,46);
	}

	.cssload-circle-6 {
		height: 19px;
		width: 19px;
		background: rgb(129,197,64);
	}

	.cssload-circle-7 {
		height: 10px;
		width: 10px;
		background: rgb(0,163,150);
	}

	.cssload-circle-8 {
		height: 5px;
		width: 5px;
		background: rgb(22,116,188);
	}

	.cssload-circle-1,
	.cssload-circle-2,
	.cssload-circle-3,
	.cssload-circle-4,
	.cssload-circle-5,
	.cssload-circle-6,
	.cssload-circle-7,
	.cssload-circle-8 {
		border-bottom: none;
		border-radius: 50%;
			-o-border-radius: 50%;
			-ms-border-radius: 50%;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
		box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
			-o-box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
			-ms-box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
			-webkit-box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
			-moz-box-shadow: 1px 1px 1px rgba(0,0,0,0.1);
		animation-name: cssload-spin;
			-o-animation-name: cssload-spin;
			-ms-animation-name: cssload-spin;
			-webkit-animation-name: cssload-spin;
			-moz-animation-name: cssload-spin;
		animation-duration: 4600ms;
			-o-animation-duration: 4600ms;
			-ms-animation-duration: 4600ms;
			-webkit-animation-duration: 4600ms;
			-moz-animation-duration: 4600ms;
		animation-iteration-count: infinite;
			-o-animation-iteration-count: infinite;
			-ms-animation-iteration-count: infinite;
			-webkit-animation-iteration-count: infinite;
			-moz-animation-iteration-count: infinite;
		animation-timing-function: linear;
			-o-animation-timing-function: linear;
			-ms-animation-timing-function: linear;
			-webkit-animation-timing-function: linear;
			-moz-animation-timing-function: linear;
	}



	@keyframes cssload-spin {
		from {
			transform: rotate(0deg);
		}
		to {
			transform: rotate(360deg);
		}
	}

	@-o-keyframes cssload-spin {
		from {
			-o-transform: rotate(0deg);
		}
		to {
			-o-transform: rotate(360deg);
		}
	}

	@-ms-keyframes cssload-spin {
		from {
			-ms-transform: rotate(0deg);
		}
		to {
			-ms-transform: rotate(360deg);
		}
	}

	@-webkit-keyframes cssload-spin {
		from {
			-webkit-transform: rotate(0deg);
		}
		to {
			-webkit-transform: rotate(360deg);
		}
	}

	@-moz-keyframes cssload-spin {
		from {
			-moz-transform: rotate(0deg);
		}
		to {
			-moz-transform: rotate(360deg);
		}
	}
</style>

	</head>
	<body>
		<div class="container">

		</div>







<script type="text/javascript">
var container = document.getElementsByClassName('container')[0];

window.onload = function()
{
	var http = new XMLHttpRequest();
	http.onreadystatechange = function()
	{
		if(this.readyState == 4 && this.status == 200)
		{
			var data  = "";
			var parsed = JSON.parse(this.responseText);
			parsed.articles.forEach(function(x){
					data += '<div class="card row z-depth-3"><div class="card-content col s12 m12 l12 cover" style="background-image:url('+x.urlToImage+')"></div><div  class=" card-body col s12 m12 l12"> <a href="'+x.url+'"> <h4>'+x.title+'</h4></a><p class="flow-text" style="font-size:18px">'+x.description+'</p><div class="right">&mdash; &nbsp;<small>'+x.author+'</small></div></div>	</div>';
			});
				window.setTimeout(function(){
					container.innerHTML = data;

				},2000);
		}
	}
	http.open('GET','https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=09cf362b3ad94058b60e9e2abab31ee2',true);
	http.send();
	container.innerHTML = '<div class="cssload-container"> <div class="cssload-circle-1"> <div class="cssload-circle-2"> <div class="cssload-circle-3"> <div class="cssload-circle-4"> <div class="cssload-circle-5"> <div class="cssload-circle-6"> <div class="cssload-circle-7"> <div class="cssload-circle-8"> </div> </div> </div> </div> </div> </div> </div> </div> </div>';
}
</script>




<?php include('partials/footer.php'); ?>

	</body>
</html>
