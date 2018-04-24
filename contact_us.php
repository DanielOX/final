<?php session_start();
  if(!(isset($_SESSION['user_name'])))
  {
    header('location: login_page.php');
  }
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="Materialize/materialize.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  	<script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
  	<script type="text/javascript" src="Materialize/materialize.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  </head>
<style media="screen">
  #myMap
  {
    width:100%;
    height:400px;
  }
</style>
  <body>

<?php include('partials/header.php');?>

<div class="container">
    <div class=" card row z-depth-2">
        <div class="card-content col s12 m12 l12">
            <div class="card-title">
                We Would Love To Help You, Get In Touch With Us!
            </div>
            <div class="card-body">
                <ul class="collections">
                  <li class="collection-item"> <i class="fa fa-phone"></i> &nbsp;+92315-9550507 </li>
                  <li class="collection-item"> <i class="fa fa-envelope"></i> &nbsp;bilalihsan50@gmail.com </li>
                </ul>
                <div id="myMap"></div>
            </div>
        </div>
    </div>
</div>





<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiOZPbFcKsaIEOO0_gahBGD8H2l6GwACU&callback=initMap">
    </script>

<script type="text/javascript">
function initMap() {
    var uluru = {lat: 33.7448, lng: 72.7866};
    var map = new google.maps.Map(document.getElementById('myMap'), {
      zoom: 15,
      center: uluru
    });
    var marker = new google.maps.Marker({
      position: uluru,
      map: map,
      title:'COMSATS WAH CANTT'
    });
  }
</script>

<?php include('partials/footer.php');?>
</body>
</html>
