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
  $row=mysqli_fetch_assoc($result);
  
    if($count == 1){
      $_SESSION['user']="f";
      $_SESSION['f_id'] = $row['f_id'];
      header('Location:freelancer/dashboard.php');  
    }

  else{
        echo $msg = '<center style="background: #e74c3c; padding:5px;color: white;font-weight:bolder;">Invalid Username/Password. Please try again </a><a href="home.php" style="float:right;color:white;text-decoration:none"><i class="fa fa-close" id="closebtn" style="color: white;font-size: 20px;"></i></a></a></center>';
        include 'home.php';
      }
}

if(isset($_POST['recruiter']))
{
  $sql2 = "SELECT * FROM `recruiters` WHERE r_email='$email' AND r_password='$password'";
  $result2=mysqli_query($conn,$sql2);
  $count2 = mysqli_num_rows($result2);
  $row2=mysqli_fetch_assoc($result2);
  
    if($count2 == 1){
      $_SESSION['user']="r";
      $_SESSION['r_id'] = $row2['r_id'];
       header('Location:recruiter/dashboard.php');  
    }

  else{
         echo $msg = '<center style="background: #e74c3c; padding:5px;color: white;font-weight:bolder;">Invalid Username/Password. Please try again </a><a href="home.php" style="float:right;color:white;text-decoration:none"><i class="fa fa-close" id="closebtn" style="color: white;font-size: 20px;"></i></a></a></center>';
        include 'home.php';
      }
}

?>