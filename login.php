<?php    
include 'config.php';
session_start();
$email=$_POST['email'];
$password=$_POST['password'];

if(isset($_POST['freelancer']))
{
  $sql = "SELECT * FROM `freelancers` WHERE f_email='$email' AND f_password='$password'";
  $result=mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  
    if($count == 1){
      $_SESSION['f_email'] = $email;
      header('Location:freelancer/dashboard.php');  
    }

  else{
        echo $msg = "Invalid Username/Password";
      }
}

if(isset($_POST['recruiter']))
{
  $sql2 = "SELECT * FROM `recruiters` WHERE r_email='$email' AND r_password='$password'";
  $result2=mysqli_query($conn,$sql2);
  $count2 = mysqli_num_rows($result2);
  
    if($count2 == 1){
      $_SESSION['r_email'] = $email;
      header('Location:recruiter/dashboard.php');  
    }

  else{
        echo $msg = "Invalid Username/Password";
      }
}

?>