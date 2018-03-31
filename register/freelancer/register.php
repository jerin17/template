<?php 
@$conn = mysqli_connect('localhost','root','seoul','template');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['register']))
{
	$f_name=$_POST['f_name'];$f_email=$_POST['f_email'];$f_password=$_POST['f_password'];
	//$f_cpassword=$_POST['f_cpassword'];
	$f_phone=$_POST['f_phone'];$f_age=$_POST['f_age'];$f_gender=$_POST['f_gender'];$f_city=$_POST['f_city'];
	$f_firm=$_POST['f_firm'];$f_work=$_POST['f_work'];$f_project=$_POST['f_project'];$f_skill=$_POST['f_skill'];
	
	$f_image="favatar.png";$f_bio="";$f_resume="";


    $sql = "INSERT INTO freelancers (f_name,f_email,f_password,f_phone,f_age,f_gender,f_city,f_firm,f_work,f_project,f_skill)
    VALUES('$f_name','$f_email','$f_password','$f_phone','$f_age','$f_gender','$f_city','$f_firm','$f_work','$f_project','$f_skill')";
    if ($conn->query($sql) === TRUE)
    {
    	echo "string";

    	header('Location:../../index.php');
    }
    else{    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
