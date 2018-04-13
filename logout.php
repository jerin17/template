<?php  
session_start();
session_destroy();
header('Location:home.php');
//echo $msg = '<center style="background: #009432; padding:5px;color: white;font-weight:bolder;">You\'ve been successfully logged out :) </a><a href="home.php" style="float:right;color:white;text-decoration:none"><i class="fa fa-close" id="closebtn" style="color: white;font-size: 20px;"></i></a></a></center>';
//include 'index.php';
?>