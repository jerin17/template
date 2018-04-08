<!DOCTYPE html>
<html>
<head>
	<title>Hireling</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">	
    <link rel="icon" type="image/gif" href="css/images/logo.png"/>
</head>
<!-- <style>
.animate-bottom {
  animation-name: animatebottom;
  animation-duration: 1s
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

</style>
 -->
 <body>


<div id="header">
	<a href="index.php"><img src="css/images/logo2.png"></a>
    <h1><a href="home.php">Hireling</a></h1>
    <div id="navbar">
      <ul>
        <li><a href="#home">Home</a></li>         
        <li><a href="#jobs">Jobs</a></li>         
        <li><a href="#write">Contact Us</a></li>
        <li><a href="#about">About</a></li>
        <?php 
		if(!isset($_SESSION)){session_start();}
		if (isset($_SESSION['user'])) {
			if($_SESSION['user']=="f"){
			echo '<li><a href="freelancer/jobs.php">Jobs</a></li>';	
			echo '<li><a href="freelancer/dashboard.php">Dashboard</a></li>';	
			echo '<button class="button" style="background:#e74c3c;"><a href="logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>';
			}

			else if($_SESSION['user']=="r"){
			echo '<li><a href="recruiter/post_job.php">Post Job</a></li>';	
			echo '<li><a href="recruiter/dashboard.php">Dashboard</a></li>';	
			echo '<button class="button" style="background:#e74c3c;"><a href="logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>';
			}
		}
		else{
		?>
			<div class="dropdown">
			  <button class="dropbtn">Register</button><i class="fa fa-caret-down" style="color:white;position: absolute;left: 	85px;top: 10px;"></i>
			  <div class="dropdown-content">
			    <a href="register/freelancer">Register as a freelancer</a>
			    <a href="register/recruiter">Register as a Recruiter</a>
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
	<a href="home.php"><i class="fa fa-close" id="closebtn" style="position: absolute;top:-40px;left:540px;color: white;font-size: 22px;"></i></a>
	<img src="css/images/logo.png" class="avatar">	
	<h1>Freelancer / Recruiter Login </h1>
	<form action="login.php" method="post">
		<p>Email ID</p>
		<input type="email" name="email" placeholder="Enter Email ID" required><i class="fa fa-envelope-o" id="icon"></i>
		<p>Password</p>
		<input type="password" name="password" placeholder="Enter Password" required><i class="fa fa-lock" id="icon"></i>
		<input type="submit" value="Login as Freelancer" name="freelancer">
		<input type="submit" value="Login as Recruiter" name="recruiter" id="btn2"><br>
		<br><a href="forgotpassword.php">Forgot Password ?</a><br>
		<a href="register/freelancer">Don't have an account yet !</a>
	</form>

	</div>
	</div>
</div>	
	
<section class="sec1 animate-bottom" id="home">
	<div class="indexbox">
        <p>We help you to hire</p>
        <h2>expert freelancers</h2>
		  <a href="register/freelancer" class="btn">Become a freelancer <i class="fa fa-search"></i></a>
          <a href="#" class="btn inverse">Post a Job <i class="fa fa-pencil"></i></a>
	</div>
</section>

<section class="sec2" id="jobs">
	<h1><b>Start <span>Freelancing</span></b></h1>

	<?php
	  include 'config.php';
	  $count=0;
      $sql="SELECT * FROM jobs";     
      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      	$count++;
        $r_id=$row['r_id'];
        $sql2="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
        $result2=mysqli_query($conn,$sql2);
        $row2 = $result2->fetch_assoc();
        if($count<=6){

	?>
<a href="freelancer/jobs.php"><div class="job">
		 <img src="recruiter/profile_pictures/<?php echo $row2['r_image']; ?>">
         <h2><?php echo $row2['r_org']; ?></h2>
		 <p><?php echo $row['j_type']; ?> / Rs. <?php echo $row['j_sal']; ?></p>
	</div></a>
	<?php }}} ?>
</section>

<section class="sec7"> 
   <h6>Whatever It Is, We Can Help</h6>
<hr size="1" color="#1abc9c" width="33%" style="margin-bottom:70px;">
    <div class="sec7-container">
      <div class="sec7-content">
        <div class="div1"><strong>01</strong></div>
          <div class="div2"><h6><a href="">What kind of work can I get done?</a></h6><br>
          <p>Small jobs, large jobs, anything in-between</p></div>
      </div>
    
       <div class="sec7-content">
        <div class="div1"><strong>02</strong></div>
          <div class="div2"><h6><a href="">How does it Work ?</a></h6><br>
          <p>1. Post your project<br>2. Choose the perfect freelancer<br>3. Pay when you are satisfied!</p></div>
      </div>
      <div class="sec7-content">
        <div class="div1"><strong>03</strong></div>
          <div class="div2"><h6><a href="">Get free quotes. It's quick and easy</a></h6>
          <p>It only takes minutes to create new projects, get competitive quotes and choose your freelancer.</p></div>
      </div>
	</div>
</section>

<section class="sec5" id="about">
<div class="about">
	<h1>Who are we </h1>
	<p>Hireling.com is a freelancing and crowdsourcing marketplace by number of users and projects. We connect employers and freelancers globally from over the world. Through our marketplace, employers can hire freelancers to do work in areas such as software development, writing, data entry and design right through to engineering, the sciences, sales and marketing, accounting and legal services.</p>

			<!-- <hr size="1" color="#1abc9c" width="60%"> -->
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


<section class="sec7"> 
   <h6>Whatever It Is, We Can Help</h6>
<hr size="1" color="#1abc9c" width="33%" style="margin-bottom:50px;">
    <div class="sec7-container">
      <div class="sec7-content">
        <div class="div1"><strong>01</strong></div>
          <div class="div2"><h6><a>What kind of work can I get done?</a></h6><br>
          <p>Small jobs, large jobs, anything in-between</p></div>
      </div>
    
       <div class="sec7-content">
        <div class="div1"><strong>02</strong></div>
          <div class="div2"><h6><a>How does it Work ?</a></h6><br>
          <p>1. Post your project<br>2. Choose the perfect freelancer<br>3. Pay when you are satisfied!</p></div>
      </div>
      <div class="sec7-content">
        <div class="div1"><strong>03</strong></div>
          <div class="div2"><h6><a>Get free quotes. It's quick and easy</a></h6>
          <p>It only takes minutes to create new projects, get competitive quotes and choose your freelancer.</p></div>
      </div>
	</div>
</section>
<!-- <hr size="1" color="#1abc9c" width="60%"> -->


<section class="sec3" id="write">
<div class="cont-left"></div>
<div class="cont-left-two">
	<div class="cont-div">
		<i class="fa fa-map-marker" aria-hidden="true"></i>
		<span class="cont-head">Address</span>
		<div class="cont-content" style="color: #999999">Jamia Hamdard,Badarpur Road, Hamdard Nagar,<br> New Delhi, Delhi 110062</div>
	</div>

	<div class="cont-div">
		<i class="fa fa-phone" aria-hidden="true"></i>
		<span class="cont-head">Lets Talk</span>
		<div class="cont-content">+91-9990480663</div>
	</div>

		<div class="cont-div">
		<i class="fa fa-envelope" aria-hidden="true"></i>
		<span class="cont-head">General Support</span>
		<div class="cont-content">support@hireling.in</div>
	</div>
</div>
<div class="cont-right">
	<form action="">
				<span class="cont-right-head">Send Us A Message</span><br>
				<label>Tell us your name *</label>
					<input type="text" name="name" placeholder="First name">
				
				<label>Enter your email *</label>
					<input type="text" name="email" placeholder="Eg. example@email.com">
				
				<label>Message *</label>
					<textarea name="message" rows="5" placeholder="Write us a message"></textarea>
				
				<input class="cont-btn" type="submit" name="submit" value="Send Message">
				
	</form>

</div>
</section>
<!-- <br><br> -->
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>


</body>
</html>

<!-- 
		<iframe height="100%" width="100%" style="border-radius: 10px 0px 0px 10px;" src="https://www.mapsdirections.info/en/custom-google-maps/map.php?width=420&height=420&hl=ru&q=Jamia%20Hamdard%2C%20Hamdard%20Nagar+(Hireling)&ie=UTF8&t=&z=15&iwloc=A&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.mapsdirections.info/en/custom-google-maps/">Create Google Map</a> by <a href="https://www.mapsdirections.info/en/">Measure area on map</a></iframe>
 -->