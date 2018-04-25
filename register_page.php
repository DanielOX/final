<?php
session_start();
if(isset($_SESSION['user_id'])) {


   }
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="Materialize/materialize.css">
<script type="text/javascript" src="Materialize/jquery-2.1.0.js"></script>
<script type="text/javascript" src="Materialize/materialize.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
</head>
  <style>
  body{
    font-family:'Raleway';
    font-weight:100;
  }

  </style>
<body>
<div class="cantainer">
  <div class="row ">
<form class="" action="register.php" method="post">
  <div class="col s12 m6 l6 offset-m3 offset-l3 card z-depth-2">
    <div class="card-content">
      <div class="row">
        <center><div style="width:120px;height:120px;border-radius:100%;background-image:url('images/logo.png');background-size:cover;background-position:center center"></div></center>
                  <p class="flow-text"> <center class="flow-text">Register Form</center> </p>

              <div class="col s12 m12 l12 input-field">
                    <input id="name" type="text" name="user_name"/>
                    <label for="name">User Name</label>
                  </div>
        <div class="col s12 m12 l12 input-field">
          <input id="email" type="email" name="email"/>
          <label for="email">Email</label>
        </div>

        <div class="col s12 m12 l12 input-field">
          <input id="text" type="text" pattern="^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$" name="phoneno"/>
          <label for="phoneno">Phone#</label>
        </div>

        <div class="col s12 m12 l12 input-field">
          <input id="password" type="password" name="password"/>
          <label for="password">Password</label>
        </div>
        <div class="col s12 m12 l12 input-field">
          <a href="login_page.php" type="btn orange">Already Have an account?</a>
        </div>

        <div class="col s12 m12 l12">
          <button type="submit" name="submit" class="btn btn-floating green right"><i class="fa fa-paper-plane-o"></i></button>
        </div>
      </div>

    </div>
    </div>


</form>
  </div>

</div>




</body>
</html>
