<?php
    session_start();
    $f_id=$_SESSION['f_id'];
    include '../config.php';
    include 'session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Post Job | Hireling</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">  
    <link rel="icon" type="image/gif" href="../css/images/logo.png"/>
</head>
<body>
<div id="header">
  <a href="../index.php"><img src="../css/images/logo.png"></a>
    <h1><a href="../home.php">Hireling</a></h1>
    <div id="navbar">
      <ul>
        <li><a href="../home.php">Home</a></li>         
        <li><a href="dashboard.php">Dashboard</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>

<section class="psec1" style="min-height: 100vh;">
<div id="post_job" style="margin-top: 40px;">
    <span><a href="dashboard.php#jobs"><i class="fa fa-close"  style="float: right;font-size: 25px;color: white;"></i></a></span>
<center style="font-weight: bolder;font-size: 120%;">Change Password</center>
<form action="password.php" method="POST">

    <br><br><label>Old Password</label> 
    <input type="password" name="oldpassword" placeholder="* * * * * * * * *" required><br>

    <label>New Password </label> 
    <input type="password" name="newpassword" placeholder="* * * * * * * * *"  required><br>

    <label>Confirm  New Password </label> 
    <input type="password" name="cpassword" placeholder="* * * * * * * * *"  required><br>  
    <br><br><br><input style="cursor: pointer;" type="submit" name="submit" value="Change Password"><br>

</form>
</div>
</section>

</body>
</html>
<?php
if (isset($_POST['submit']))
{
$oldpassword=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$cpassword=$_POST['cpassword'];

$flag=0;$err=0;$msg="";

    $id=$_SESSION['f_id'];
    $sql="SELECT * FROM freelancers WHERE f_id='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    if ($oldpassword===$row['f_password']) 
       $flag=1;     
    else
       {$flag=0;$err=1;}

if($flag==1)
{
    if ($newpassword===$cpassword)
        $err=0;
    else
        $err=2;
}

if($err==1)
{ $msg="Old password doesn't match ! ";}
else if($err==2)
{ $msg="Confirm password doesn't match ! ";}
else
{ $msg="Password updated successfully ! ";        
  $sql = "UPDATE freelancers SET f_password='$newpassword' WHERE f_id='$f_id'" ;
  mysqli_query($conn , $sql);
}


if($err==0)
{echo '<center style="background:rgba(0,0,0,0.7);padding:10px;box-sizing: border-box;color: green;font-weight:bolder;position: absolute;z-index: 2;top:430px;left:450px;">',$msg,'<a style="color:green" href="dashboard.php">Click here</a> to go back</center>';}

else
{echo '<center style="background:rgba(0,0,0,0.7);padding:10px;box-sizing: border-box;color: red;position: absolute;z-index: 2;top:430px;left:450px;">',$msg,'<a style="color:red" href="dashboard.php">Click here</a> to go back</center>';}

}?>
