<?php 
	if(!isset($_SESSION['r_id']))
	{ header('location: ../home.php');} 
 	
 	else 
 		{$r_id = $_SESSION['r_id'];}      
?>

