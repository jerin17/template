<!DOCTYPE html>
<html>
<head>
  <title>Post Job | Hireling</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">  
  <link rel="icon" type="image/gif" href="css/images/logo.png"/>
</head>
<body>
<div id="header">
  <a href="index.php"><img src="css/images/logo.png"></a>
    <h1><a href="home.php">Hireling</a></h1>
</div>
</div>

<section class="psec1" style="min-height: 100vh;">
<div id="post_job" style="margin-top: 40px;">
<center style="font-weight: bolder;font-size: 120%;">Forgot Password</center>
<form action="forgotpassword.php" method="POST" name="myform">

    <label>Select user</label> 
    <select name="user" required>
    <option value="">--- select user ---</option>
    <option value="f">Freelancer</option>
    <option value="r">Recruiter</option>
    </select><br><br>

    <label>Enter Registered Email Address </label> 
    <input type="email" name="email" id="email" placeholder="abc@gmail.com"  required><br>

   <!--  <label>Confirm Email Address </label> 
    <input type="cemail" name="cemail" placeholder="abc@gmail.com"  required><br>  
    -->
     <br><br><br><input style="cursor: pointer;" type="submit" name="submit" value="Forgot password"><br>

</form>
</div>

</section>

</body>
</html>
<?php 
if (isset($_POST['submit']))
{
    include 'config.php';
    $user=$_POST['user'];
    $email=$_POST['email'];
    $err=0;

    if($user=="r")
      $sql = "SELECT * FROM `recruiters` WHERE r_email='$email'"; 

    else
      $sql = "SELECT * FROM `freelancers` WHERE f_email='$email'"; 

    $result=mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
      
    if($count == 1)
    {
      $row=mysqli_fetch_array($result);

        if($user=="r")
        {   
              $password=$row['r_password'];
              $to = $email;
              $subject = "Hireling | Password Recovery";
              $txt = 'Recruiter Login Credentials<br><br>Email ID : '.$email.'<br>Password : '.$password.'<br>';
              $headers = "From: ADMIN-HIRELING@hireling.com"."\r\n";
              $headers .= 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";             
              mail($to,$subject,$txt,$headers);
              $msg=' Password has ben sent to the resistered ID : <span style="color : white;">'.$email.'</span>';
              $err=2;
        }

        else
        {
              $password=$row['f_password'];
              $to = $email;
              $subject = "Hireling | Password Recovery";
              $txt = 'Freelancer Login Credentials<br><br>Email ID : '.$email.'<br>Password : '.$password.'<br>';
              $headers = "From: ADMIN-HIRELING@hireling.com"."\r\n";
              $headers .= 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";             
              mail($to,$subject,$txt,$headers);
              $msg=' Password has ben sent to the resistered ID : <span style="color : white;">'.$email.'</span>';
              $err=2;
        }
    }

    else
    {
      $msg=' This email ID is not registered yet | ';$err=1;
    }
  
if($err==2)
{echo '<center style="background:rgba(0,0,0,0.7);padding:10px;box-sizing: border-box;color: green;font-weight:bolder;position: absolute;z-index: 2;top:520px;left:400px;">',$msg,'<br><a style="color:green" href="home.php">Click here</a> to go back</center>';}

else
{echo '<center style="background:rgba(0,0,0,0.7);padding:10px;box-sizing: border-box;color: red;position: absolute;z-index: 2;top:530px;left:450px;">',$msg,'<a style="color:red" href="home.php">Click here</a> to go back</center>';}
}?>

<?php  
if($err==2){
?>
<script>
  var input = document.getElementsByTagName('input')[0];
  input.setAttribute("disabled", "true");
</script>
<?php } ?>