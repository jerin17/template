<?php 
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  header('Location:new.php');
}
?>
<!DOCTYPE html>
<html lang="en" style="
    background-image: url(../../css/background/back5.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: center;
    background-size: 1400px 700px;
">
<head>
    <meta charset="UTF-8">
    <title>Freelancer Registration | Hireling</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="freelance_register.css">  
    <link rel="icon" type="image/gif" href="../../css/images/logo.png"/>
</head>

<body>
<div class="header">
  <a href="../../index.php"><img src="../../css/images/logo2.png"></a>
    <h1><a href="../../home.php">Hireling</a></h1>
    <h3 class="link"><a href="../recruiter">Register as Recruiter</a></h3>
</div>

<form name="msform" id="msform" action="register.php" method="post" novalidate>
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Personal Details</li>
    <li>Educational Qualification</li>
  </ul>
  <fieldset class="field">
    <h2 class="fs-title">Create your account</h2>
    <h3 class="fs-subtitle">This is step 1</h3>
    <input type="text" name="f_name" placeholder="Name*"/>
    <input type="email" name="f_email" placeholder="Email *"/>
    <input type="password" name="f_password" placeholder="Password *"/>
    <input type="password" name="f_cpassword" placeholder="Confirm Password *"/>
    <input type="button" name="next" class="next action-button" value="Next" />
    <br><span id ="err" style="color: red;font-size: 12px;float: right;margin:0;margin-top: 10px;"></span>
  </fieldset>
  <fieldset class="field">
   <h2 class="fs-title">Personal Credentials</h2>
    <h3 class="fs-subtitle">Fill in your personal details...</h3>
    <input type="text" name="f_phone" placeholder="Phone*" required/>
    <input type="number" name="f_age" placeholder="Age*"/>
    <input type="text" name="f_gender" placeholder="Gender*"/>
    <input type="text" name="f_city" placeholder="City" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
    <br><span id ="err2" style="color: red;font-size: 12px;float: right;margin:0;margin-top: 10px;"></span>
  </fieldset>
  <fieldset class="field">
      <h2 class="fs-title">Educational Qualification</h2>
    <input type="text" name="f_firm" placeholder="School/College/company" required />
    <input type="text" name="f_work" placeholder="Work Profile" required />
    <input type="text" name="f_project" placeholder="Project link"/>
    <textarea name="f_skill" placeholder="Skills"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="register" class="action-button" value="Submit">
    <br><span id ="err3" style="color: red;font-size: 12px;float: right;margin:0;margin-top: 10px;"></span>

  </fieldset>
</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
  <script src="freelance_register.js"></script>




</body>
</html>
