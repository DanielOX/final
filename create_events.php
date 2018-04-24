<?php
session_start();






















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
        <div class="card col s12 m8 l8 offset-m2 offset-l2 z-depth-4">
            <div class="card-content">
              <div class="card-body">
                <center>
                  <p class="flow-text">
                    Create Events
                  </p>

                </center>
              </div>
            </div>
        </div>
        <div class="card col s12 m8 l8 offset-m2 offset-l2 z-depth-4">
            <div class="card-content">
                <div class="row card-body" style="padding:10px 20px">
                    <div class="col s12 m12 l12">
                      <form class="" action="event_upload.php" method="post" enctype="multipart/form-data">
                          <div class="input-field col s12 m12 l12">
                            <label for="Event_Title">Event Title</label>
                            <input id="Event_Title"  name= "name" type="text" value="">
                          </div>
                          <div class="input-field col s12 m12 l12">
                            <label for="Event_Description">Event Description</label>
                            <textarea required id="Event_Description" name="description" data-length='122' class="materialize-textarea" ></textarea>
                          </div>
                          <div class="input-field col s12 m12 l12">
                            <label for="Event_Location">Event Address</label>
                            <input type="text" id="Event_Location" required name="address" />
                          </div>
                          <div class="file-field input-field col s12 m12 l12">
                                <div class="btn green ">
                                  <span> <i class="fa fa-image"></i> </span>
                                  <input required type="file" name="image">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" placeholder="Event Featured Pic or Panaflex" type="text">
                                </div>
                              </div>
                       <button type="submit" required name="submit" class="pulse green btn-floating right"> <i class="fa fa-paper-plane-o"></i> </button>

                      </form>
                    </div>

                </div>
            </div>
        </div>
    </div>














    <?php     include('partials/footer.php'); ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('textarea').materialize_textarea();

  });
</script>
  </body>
</html>
