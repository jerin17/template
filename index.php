<!DOCTYPE html>
<html>
<head>
	<title>Hireling</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">	
    <link rel="icon" type="image/gif" href="css/images/logo.png"/>
</head>
<body>


<div id="header">
    <h1><a href="index.php">Hireling</a></h1>
    <div id="navbar">
      <ul>
        <li><a href="#home">Home</a></li>         
        <li><a href="#jobs">Jobs</a></li>         
        <li><a href="#write">Contact Us</a></li>
        <li><a href="#about">About</a></li>
        <?php 
		session_start();
		if(isset($_SESSION['f_email'])){
		echo '<li><a href="#">Settings</a></li><li><a href="freelancer/dashboard.php">Dashboard</a></li>';	
		echo '<button class="button" style="background:#e74c3c;"><a href="logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>';
		}
		else{
		?>
			<div class="dropdown">
			  <button class="dropbtn">Register</button><i class="fa fa-caret-down" style="color:white;position: absolute;left: 	85px;top: 10px;"></i>
			  <div class="dropdown-content">
			    <a href="register.php">Register as a freelancer</a>
			    <a href="register.php">Register as a Recruiter</a>
			  </div>
			</div>
 	    <!-- <li><a id="modalbtn" class="button">LOGIN</a></li> -->
 	    <button id="modalbtn" class="button">LOGIN</button>
	  	<?php } ?>
	  </ul>
	 </div> 
</div>

<div id="simplemodal" class="modal">
	<div class="loginbox">
	<a href="index.php"><i class="fa fa-close" id="closebtn" style="position: absolute;top:-40px;left:540px;color: white;font-size: 22px;"></i></a>
	<img src="css/user.png" class="avatar">	
	<h1>Freelancer / Recruiter Login </h1>
	<form action="login.php" method="post">
		<p>Email ID</p>
		<input type="email" name="email" placeholder="Enter Email ID" required><i class="fa fa-envelope-o" id="icon"></i>
		<p>Password</p>
		<input type="password" name="password" placeholder="Enter Password" required><i class="fa fa-lock" id="icon"></i>
		<input type="submit" value="Login as Freelancer" name="freelancer">
		<input type="submit" value="Login as Recruiter" name="recruiter" id="btn2"><br>
		<br><a href="#">Forgot Password ?</a><br>
		<a href="register.php">Don't have an account yet !</a>
	</form>

	</div>
	</div>
</div>
	
<section class="sec1" id="home">
	<div class="indexbox">
        <p>We help you to hire</p>
        <h2>expert freelancers</h2>
		  <a href="#" class="btn">Become a freelancer <i class="fa fa-search"></i></a>
          <a href="#" class="btn inverse">Post a Job <i class="fa fa-pencil"></i></a>
	</div>
</section>

<section class="sec2" id="jobs">
	<h1><b>Start <span>Freelancing</span></b></h1>

	<div class="job">
		 <img src="css/logo/ravatar.png">
         <h2>Google</h2>
		 <p>Web developer / $3000</p>
	</div>
	<div class="job">
		 <img src="css/logo/ravatar.png">
         <h2>Google</h2>
		 <p>Web developer / $3000</p>
	</div>
	<div class="job">
		 <img src="css/logo/ravatar.png">
         <h2>Google</h2>
		 <p>Web developer / $3000</p>
	</div>
	<div class="job">
		 <img src="css/logo/ravatar.png">
         <h2>Google</h2>
		 <p>Web developer / $3000</p>
	</div>
	<div class="job">
		 <img src="css/logo/ravatar.png">
         <h2>Google</h2>
		 <p>Web developer / $3000</p>
	</div>
	<div class="job">
		 <img src="css/logo/ravatar.png">
         <h2>Google</h2>
		 <p>Web developer / $3000</p>
	</div>

</section>

<section class="sec3" id="write">
	<h1>Got a Suggestion for us ?</h1>
	<div class="contactbox">
	<div class="cont-left">
		<iframe height="100%" width="100%" style="border-radius: 10px 0px 0px 10px;" src="https://www.mapsdirections.info/en/custom-google-maps/map.php?width=420&height=420&hl=ru&q=Jamia%20Hamdard%2C%20Hamdard%20Nagar+(Hireling)&ie=UTF8&t=&z=15&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create Google Map</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe>
	</div>
	<form>
	<div class="cont-right">
 		<form action="">
 		<h2>Send a message <i class="fa fa-envelope-o"></i></h2>
 		<input id="contactinput" type="text" name="fname" placeholder="Name (optional)" required><br>
		<input id="contactinput" type="email" name="email" placeholder="Email ID" required><br>
		<textarea id="contactinput" name="message" rows="8" placeholder="Message"></textarea>
		<input type="submit" class="contbtn">
		</form>
	</div>
	</form>

	</div>

</section>

<section class="sec5" id="about">
<div class="about">
	<h1>Who are we </h1>
	<p>Hireling.com is a freelancing and crowdsourcing marketplace by number of users and projects. We connect employers and freelancers globally from over the world. Through our marketplace, employers can hire freelancers to do work in areas such as software development, writing, data entry and design right through to engineering, the sciences, sales and marketing, accounting and legal services.</p>

			<hr size="1" color="#1abc9c" width="60%">
<h2>Team</h2>
</div>
<div class="team">
	<div class="teamcol" id="hide"></div>
	<div class="teamcol">
		<div class="teamimg">
			<img src="css/about/josu.jpg" alt="josu jacob">
		</div>
		<div class="teamdetails">
			<h1>Josu Jacob <br></h1><span>Jamia Hamdard University,<br> B.tech(CSE), final year</span>
			<hr size="2" color="red" width="40%">
			<ul>
				<li><a href="https://www.facebook.com/josujacob"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://plus.google.com/u/0/110015069409710534465"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="https://www.instagram.com/josu_jacob/"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>

	<div class="teamcol">
		<div class="teamimg">
			<img src="css/about/safin.jpg" alt="safin chowdhury">
		</div>
		<div class="teamdetails">
			<h1>Safin Chowdhury <br></h1><span>Jamia Hamdard University,<br> B.tech(CSE), final year</span>
			<hr size="2" color="red" width="40%">
			<ul>
				<li><a href="https://www.facebook.com/safin.chowdhury.35"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://plus.google.com/u/0/112240593188290962758"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="https://www.instagram.com/chowdhury.safin/"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>

	<div class="teamcol">
		<div class="teamimg">
			<img src="css/about/jerin.jpg" alt="jerin thomas">
		</div>
		<div class="teamdetails">
			<h1>Jerin Thomas <br></h1><span>Jamia Hamdard University,<br> B.tech(CSE), final year</span>
			<hr size="2" color="red" width="40%">
			<ul>
				<li><a href="https://www.facebook.com/jerin.thomas.17"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://plus.google.com/u/0/115607481997432307370"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="https://www.instagram.com/jerinthomas17/"><i class="fa fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="teamcol" id="hide"></div>
</div>
</section>
<div class="teamclear"></div>
<section class="sec6">
	<div class="footleft">
		<h1>WHAT'S HIRELING ???</h1>
		<p>Hireling.com is a freelancing and crowdsourcing marketplace by number of users and projects. We connect employers and freelancers globally from over the world.</p>
		<p>Post a project today and get bids from talented freelancers</p>
	</div>
	
	<div class="footright">
		<p> ---- SITEMAP ---- </p>
		<ul>
			<li><a href="">Home</a></li>
			<li><a href="">About</a></li>
			<li><a href="">Contact</a></li>
			<li><a href="">Register</a></li>
			<li><a href="">Login</a></li>
		</ul>
	</div>
</section>
<script src="js/login.js"></script>
</body>
</html>