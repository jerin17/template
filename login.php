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
	<div class="loginbox">
	<a href="index.php"><i class="fa fa-close" style="position: absolute;top:5px;left:295px;color: red;font-size: 22px;"></i></a>
	<img src="css/user.png" class="avatar">	
	<h1>Freelancer Login </h1>
	<form>
		<p>Email ID</p>
		<input type="email" name="email" placeholder="Enter Email ID" required><i class="fa fa-envelope-o fa-fw" id="icon"></i>
		<p>Password</p>
		<input type="password" name="password" placeholder="Enter Password" required><i class="fa fa-key fa-fw" id="icon"></i>
		<input type="submit" value="Login" >
		<a href="#">Forgot Password ?</a><br>
		<a href="register.php">Don't have an account yet !</a>
	</form>

	</div>
</section>

</body>
</html>