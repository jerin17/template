<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

</head>
<body>

<div id="header">
    <h1><a href="index.php">Hireling</a></h1>
</div>
	
<section class="sec4">
	<div class="registerbox">
	<a href="index.php"><i class="fa fa-close" style="float:right;margin-top:-40px;color: red;font-size: 22px;"></i></a>		
	<img src="css/user.png" class="avatar" alt="avatar">	
	<h1>Register </h1>
	<form>
	<div class="regbox left">
<!-- 
<i class="fa fa-user" id="iconr"></i>
<i class="fa fa-user-o" id="iconr"></i>
<i class="fa fa-envelope-o fa-fw" id="iconr"></i>
<i class="fa fa-phone" id="iconr"></i>
<i class="fa fa-birthday-cake" id="iconr"></i>
<i class="fa fa-neuter" id="iconr"></i>
<i class="fa fa-key fa-fw" id="iconr"></i>
<i class="fa fa-key fa-fw" id="iconr"></i>

 -->		
 		<i class="fa fa-user"></i><input id="registerinput" type="text" name="fname" placeholder="Enter First Name" required><br>
		<i class="fa fa-user-o"></i><input id="registerinput" type="text" name="lname" placeholder="Enter Last Name" required><br>
		<i class="fa fa-envelope"></i><input id="registerinput" type="email" name="email" placeholder="Enter Email ID" required><br>
		<i class="fa fa-phone"></i><input id="registerinput" type="longnumber" name="number" placeholder="Enter Phone Number" required><br>

	</div>
	<div class="regbox right">
		<i class="fa fa-birthday-cake"></i><input id="registerinput" type="number" name="age" placeholder="Enter Age" required><br>
		<!-- <i class="fa fa-neuter"></i><input id="registerinput" type="text" name="gender" placeholder="Select Gender" required><br>	 -->
		<i class="fa fa-neuter"></i><select name="gender" id="registerinput" placeholder="select gender">
			<option value="">--- select gender ---</option>
			<option value="">Male</option>
			<option value="">Female</option>
		</select><br>
		<i class="fa fa-lock"></i><input id="registerinput" type="password" name="password" placeholder="Enter Password" required><br>
		<i class="fa fa-unlock-alt"></i><input id="registerinput" type="password" name="cpassword" placeholder="Confirm Password" required><br>
	</div>
		<br>
	<div class="regbox clear">
		<input type="submit" value="register" ><br>
		<a href="login.php">Already have an account ! Login here</a>
	</div>
	</form>

	</div>
</section>

</body>
</html>
