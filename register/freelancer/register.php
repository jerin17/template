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
	
	$f_image="user.png";$f_bio="";$f_resume="";$f_linkedin="";$f_github="";$f_facebook="";$f_google="";$f_instagram="";


    $sql = "INSERT INTO freelancers (f_name,f_email,f_password,f_phone,f_age,f_gender,f_city,f_firm,f_work,f_project,f_skill)
    VALUES('$f_name','$f_email','$f_password','$f_phone','$f_age','$f_gender','$f_city','$f_firm','$f_work','$f_project','$f_skill')";
    if ($conn->query($sql) === TRUE)
    {
    	$msg= "string ";

    }
    else{    echo "Error: " . $sql . "<br>" . $conn->error;}

    $sql2="SELECT * from freelancers WHERE f_name='$f_name' AND f_email='$f_email'AND f_password='$f_password'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $f_id=$row2['f_id'];

    $sql = "INSERT INTO f_details (f_id,f_bio,f_image,f_resume,f_linkedin,f_github,f_facebook,f_google,f_instagram)
    VALUES ('$f_id','$f_bio','$f_image','$f_resume','$f_linkedin','$f_github','$f_facebook','$f_google','$f_instagram')";
    if ($conn->query($sql) === TRUE)
    {
        $msg= "You've been registered successfully. Now you may login";
        echo $msg = '<center style="background: #009432; padding:5px;color: white;font-weight:bolder;">You\'ve been registered successfully. Now you may login </a><a href="home.php" style="float:right;color:white;text-decoration:none"><i class="fa fa-close" id="closebtn" style="color: white;font-size: 20px;"></i></a></a></center>';
        include '../../index.php';
    }
    
    else{    echo "Error: " . $sql . "<br>" . $conn->error;
    }

}
?>
