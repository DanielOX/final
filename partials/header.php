

<div class="navbar-fixed">
	<nav class="white">
		<div class="nav-wrapper">
			<a href="#" class="brand-logo">
				<img src="http://localhost/final/images/logo.png" style="width:60px;height:60px"/>
			</a>
			<a href="#" data-activates="my-side-nav" class="button-collapse"><i class="fa fa-bars black-text"></i></a>
			<ul class="right hide-on-med-and-down">
				<li><a href="index.php" class="black-text">Home</a></li>
				<li><a href="#" class="black-text dropdown-button" data-activates="dropdown1">Categories  <i class="fa fa-caret-down black-text"></i></a>  </li>
				<li><a href="events.php" class="black-text">Events</a></li>
				<li><a href="news.php" class="black-text">Latest News</a></li>
				<li><a href="contact_us.php" class="black-text" style="white-space:pre">Contact Us</a></li>
				<li><a href="circle.php" class="black-text">Circles</a></li>
    <li><a href="#" class="black-text dropdown-button" data-activates="dropdown-user">
	      <div style="width:30px;height:30px;border-radius:100%;background-image:url('<?php echo 'http://localhost/final/user_data/'.$_SESSION['image'];?>');display:inline-flex;background-position:center center;background-size:cover;"></div>   <?php echo substr($_SESSION['user_name'],0,strpos($_SESSION['user_name'],' ')); ?>&nbsp; <i class="fa fa-caret-down"></i>
	      </a></li>

			</ul>

	    <ul class="dropdown-content" id="dropdown-user">
				<li> <a href="user_profile.php">My Profile</a> </li>
	      <li>  <a href="edit_profile.php">Edit Profile</a></li>
	      <li class="divider"></li>
	      <li>
	      <a href="logout.php?id=<?php echo $_SESSION['user_id']; ?>">Logout</a>
	      </li>
			 </ul>


			<ul class="dropdown-content" id="dropdown1">
				<li>  <a href="sports.php"> Sports   </a></li>
				<li>  <a href="education.php"> Education </a></li>
				<li>  <a href="health.php"> Health </a></li>
				<li>  <a href="business.php"> Bussiness </a></li>
			</ul>
			<ul class="dropdown-content" id="dropdown2">
				<li>  <a href="sports.php"> Sports   </a></li>
				<li>  <a href="education.php"> Education </a></li>
				<li>  <a href="health.php"> Health </a></li>
				<li>  <a href="business.php"> Bussiness </a></li>
			</ul>

		</div>
	</nav>

</div>


<ul class="side-nav" id="my-side-nav">
	<li>
		<center><div style="width:150px;height:150px;border-radius:100%;background-image:url('images/logo.png');background-size:cover;background-position:center center"></div></center>
	</li>
	<li class="divider"></li>
	<li><a href="index.php" class="black-text">Home</a></li>
	<li><a href="#" class="black-text dropdown-button" data-activates="dropdown2">Categories  <i class="fa fa-caret-down right" style="font-size:18px"></i> </a></li>
	<li><a href="news.php" class="black-text">News</a></li>
	<li><a href="contact.php" class="black-text" style="white-space:pre">Contact Us</a></li>
	<li><a href="circle.php" class="black-text">Circles</a></li>
</ul>
