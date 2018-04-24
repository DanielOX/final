''<?php
session_start();
if(!(isset($_SESSION['user_name'])))
{
  header('location: login_page.php');
}
$conn = mysqli_connect("127.0.0.1", "root","","community");
$uid = $_SESSION['user_id'];
$query = "SELECT * FROM  `user` WHERE user_id  = '$uid' ";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
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

<?php include('partials/header.php'); ?>

<div class="cantainer">
  <div class="row ">
<form  action="profile.php" method="post" enctype="multipart/form-data">
  <div class="col s12 m12 l12 card z-depth-2">
    <div class="card-content">
      <div class="row">
        <center><div style="width:120px;height:120px;border-radius:100%;background-image:url('<?php if($row['image'] == 'AVATAR'){ echo 'user_data/avatar.png'; }else{ echo 'user_data/'.$row['image']; } ?>');background-size:cover;background-position:center center">
          <div style="width:100%;height:100%;border-radius:100%;;background-color:rgba(0,0,0,0.5)">
            <br>
              <div class="input-field file-field" style="margin-left:29.88883%">
               <div class="btn green btn-floating left" style="text-align:center;width:45px;height:45px;border-radius:100px">
               <i class="fa fa-camera white-text"></i>
               <input  class="btn btn-floating" type="file" name="image">
             </div>
           </div>
          </div>

        </div></center>
                  <p class="flow-text"> <center class="flow-text">Update Information</center> </p>
              <div class="col s12 m4 l4 input-field">
                    <input id="name" type="text" name="user_name" value="<?php echo $row['user_name']; ?>" required/>
                    <label for="name"> <i class="fa fa-user-o" style="font-size:24px"></i> &nbsp; User Name</label>
                  </div>
        <div class="col s12 m4 l4 input-field">
          <input id="password" type="password" name="password" value="<?php echo $row['password']; ?>" required/>
          <label for="password"><i class="fa fa-key" style="font-size:24px"></i>&nbsp;&nbsp;Password</label>
        </div>
            <div class="input-field col s12 m3 l3">
              <select name="gender" required>
                <option  disabled><i class="transgender"></i> Gender</option>
                <option value="0">Male</option>
                <option value="1">Female</option>
              </select>
          </div>

          <div class="input-field col s12 m3 l3">
            <select name="graduation" required class="icons">
              <option  disabled><i class="transgender"></i> Graduation</option>
              <option value="0">Graduate</option>
              <option value="1">Ungraduate</option>
            </select>
        </div>

        <div class="col s12 m3 l3 input-field">

          <input id="address" type="text" name="address" value="" >
          <label for="address"> <i class="fa fa-marker"></i> <i class="fa fa-map-marker" style="font-size:24px"></i>&nbsp;&nbsp;Address</label>
        </div>

        <div class="col s12 m3 l3 input-field">
          <input id="universty" type="text" name="universty" value="" >
          <label for="universty"><i class="fa fa-university" style="font-size:24px"></i>&nbsp;&nbsp;Universty or Institue Name</label>
        </div>
        <div class="col s12 m3 l3 input-field">
          <input id="works_at" type="text" name="works_at" value="" >
          <label for="works_at"><i class="fa fa-briefcase" style="font-size:24px"></i>&nbsp;&nbsp;Works at</label>
        </div>










        <div class="col s12 m12 l12">
        <br>
        <br>
            <button type="submit" name="submit" class="btn  green right white-text z-depth-4">Update Information</button>
        </div>
      </div>

    </div>
  </div>


</form>
  </div>

</div>
<?php include('partials/footer.php'); ?>


<script type="text/javascript">

$(document).ready(()=>{
$('select').material_select();
});


</script>
</body>
</html>
