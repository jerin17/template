<?php  
include '../config.php';
$f_id=$_GET['f_id'];
$j_id=$_GET['j_id'];


	$sql="DELETE FROM apply WHERE f_id='$f_id' AND j_id='$j_id'";

	if ($conn->query($sql) === TRUE) {
	    $msg= "Record deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}


	$short=2;
	$sql2="INSERT INTO shortlist (f_id,j_id,short) VALUES ('$f_id','$j_id','$short') ";

	if ($conn->query($sql2) === TRUE)
	    $msg= "New record created successfully";

	else 
	    echo "Error: " . $sql2 . "<br>" . $conn->error;


header('Location: view_job.php?j_id='.$j_id.'#status');

?>