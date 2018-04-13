<?php 
include '../../config.php';
if(isset($_POST['register']))
{
    $r_org=$_POST['r_org'];$r_name=$_POST['r_name'];$r_email=$_POST['r_email'];$r_password=$_POST['r_password'];
    $r_phone=$_POST['r_phone'];$r_website=$_POST['r_website'];$r_city=$_POST['r_city'];
    $r_bio="";$r_image="avatar.png";$r_linkedin="";$r_github="";$r_facebook="";$r_google="";$r_instagram="";


    $sql = "INSERT INTO recruiters (r_name,r_email,r_phone,r_org,r_city,r_password)
    VALUES('$r_name','$r_email','$r_phone','$r_org','$r_city','$r_password')";
    mysqli_query($conn , $sql);

    $sql2="SELECT * from recruiters WHERE r_name='$r_name' AND r_email='$r_email'AND r_org='$r_org'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    $r_id=$row2['r_id'];

    $sql = "INSERT INTO r_details (r_id,r_bio,r_image,r_website,r_linkedin,r_github,r_facebook,r_google,r_instagram)
    VALUES ('$r_id','$r_bio','$r_image','$r_website','$r_linkedin','$r_github','$r_facebook','$r_google','$r_instagram')";
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
