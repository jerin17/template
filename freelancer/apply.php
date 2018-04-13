<?php
session_start();
include '../config.php';
$j_id=$_GET['id'];
@$f_id=$_SESSION['f_id'];
$app=1;
if($f_id!="")
{
$sql="INSERT INTO apply (f_id,j_id,app) VALUES ('$f_id','$j_id','$app') ";

if ($conn->query($sql) === TRUE)
    $msg= "New record created successfully";

else 
    echo "Error: " . $sql . "<br>" . $conn->error;
header("Location:jobs.php#$j_id");
}

if($f_id==""){echo '<center style="background: #e74c3c; padding:10px;"><a href="../home.php" style="color: white;font-weight:bolder;">Please Login to Apply</a><a href="jobs.php" style="float:right;color:white;text-decoration:none"><i class="fa fa-close" id="closebtn" style="color: white;font-size: 22px;"></i></a></a></center>';}
include 'jobs.php';
?>


