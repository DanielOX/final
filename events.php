<?php
session_start();
if(!((isset($_SESSION['user_id'])) && (isset($_SESSION['user_name']))))
{
  header('location: login.php');
}
else
{
    $conn = mysqli_connect('127.0.0.1','root','','community');
    $query = "SELECT * FROM events  WHERE isActive = 1 ORDER BY id DESC LIMIT 8";
    $result = mysqli_query($conn,$query);
    if(!$result)
    {
        echo "Unexpected Error Occured!";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Events</title>
    <link rel="stylesheet" href="Materialize/materialize.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  	<script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
  	<script type="text/javascript" src="Materialize/materialize.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  </head>
  <body>
    <?php     include('partials/header.php'); ?>

    <div class="container">
      <div class="row">
        <div class="col s12 m2 l2 offset-m8 offset-l8 right" style="position:fixed;left:20%">
            <div class="card-content">
              <div class="card-body">
                <center>
                  <p class="flow-text">
                      <a type="button" href="create_events.php" class="btn green pulse btn-floating" name="button"> <i class="fa fa-plus"></i> </a>
                  </p>

                </center>
              </div>
            </div>

      </div>
        </div>

        <div class="row">
<?php


while($row = mysqli_fetch_array($result))
{
    echo "<div class='card col s12 m3 l3 z-depth-4'>";
    echo "<div class='card-content'>";
    echo "<div class='card-body'>";
    $image_path = $row['image'];
    $image = 'http://localhost/final/event_images/'.$image_path;
    echo "<center><div style='
    width:180px;
    height:180px;
    background-size:cover;
    background-position:center center;
    border-radius:100%;
    background-image:url(".$image.");'>";
    echo '</div></center>';
    echo "<br>";
    echo "<div class='divider'></div>";
    echo "<br>";
    echo "<p class='flow-text'>";
    echo $row['name'];
    echo "</p>";
    echo "<br>";
    echo "<div class='divider'></div>";
    echo "<br>";
    echo "<p class='flow-text' style='font-size:16px'>";
    echo substr($row['description'],0,40);
    echo "</p>";

    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>
</div>






      </div>
    <?php include('partials/footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('textarea').materialize_textarea();

  });
</script>
  </body>
</html>
