<?php
session_start();
if(!(isset($_SESSION['user_name']) && isset($_SESSION['isAdmin'])))
{
  header('location: login.php');
}
$conn = mysqli_connect('localhost','root','','community');
$query = "SELECT * FROM circles";
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Visualize User</title>
    <link rel="stylesheet" href="../../Materialize/materialize.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
  	<script type="text/javascript" src="../../Materialize/jquery-2.1.0.js"></script>
  	<script type="text/javascript" src="../../Materialize/materialize.js"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <div class="card" style="margin:0;width:100%;height:60px">
      <a style="margin-top:5px;margin-left:5px" href="index.php" class="btn white btn-floating waves-effect"> <i class="fa fa-long-arrow-left grey-text"></i> </a>

    </div>

    <div class="container">
        <div class="row">
            <div class="z-depth-3 card col s12 m12 l12">
                <div class="card-body"  style="padding:12px 24px">
                    <table class="table bordered responsive striped">
                      <thead>
                        <th>Name</th>
                        <th>Desc.</th>
                        <th>owner</th>
                        <th>Image</th>
                        <th>Action</th>
                      </thead>
                      <tbody >
                        <?php
                          while ($row = mysqli_fetch_array($result))
                          {
                              echo '<tr>';
                              echo "<td>";
                              echo $row['name'];
                              echo '</td>';
                              echo "<td>";
                              echo $row['description'];
                              echo '</td>';
                              echo "<td>";
                              echo $row['owner'];
                              echo '</td>';
                              $image = 'http://localhost/final/'.$row['image'];
                              echo "<td style='width:120px;height:120px;background-size:cover;
                              background-position:center center;border-radius:100%;background-image:url(".$image.");'>";
                              echo '</td>';
                              echo "<td style='text-align:center'>";
                              echo "<a type='button' class='btn red btn-floating' href='circles/delete_circle.php?id=".$row['id']."'> <i class='fa fa-trash'></i> </a>";
                              echo "</td>";
                              echo '</tr>';
                          }
                         ?>
                      </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


  </body>
</html>
