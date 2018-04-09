<?php  
include '../config.php';
$f_id=$_GET['f_id'];
 $j_id=$_GET['j_id'];
 $col=$_GET['col'];


	if($col==="short")
	 $sql="DELETE FROM shortlist WHERE f_id='$f_id' AND j_id='$j_id'";
	else
	 $sql="DELETE FROM reject WHERE f_id='$f_id' AND j_id='$j_id'";

	if ($conn->query($sql) === TRUE) {
	    $msg="Record deleted successfully";
	} else {
	    echo "Error deleting record: " . $conn->error;
	}


	$app=1;
	$sql2="INSERT INTO apply (f_id,j_id,app) VALUES ('$f_id','$j_id','$app') ";

	if ($conn->query($sql2) === TRUE)
	    echo "New record created successfully";

	else 
	    echo "Error: " . $sql2 . "<br>" . $conn->error;


header('Location: view_job.php?j_id='.$j_id.'#status');

?>