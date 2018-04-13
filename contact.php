<?php  

if(isset($_POST['submit'])){
include 'config.php';
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];

$sql="INSERT INTO contactus (name,email,message) VALUES ('$name','$email','$message')";
if ($conn->query($sql) === TRUE) {
			  $to="jerinthomas17@gmail.com";
              $subject = "Hireling.ga | Contact Us form suggestion";
              $txt = 'Message from <br><br>Name : '.$name.'<br>Email ID : '.$email.'<br>Message : '.$message.'<br>';
              $headers = "From: ".$email."\r\n";
              $headers .= 'MIME-Version: 1.0' . "\r\n";
              $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";             
              mail($to,$subject,$txt,$headers);

        echo $msg = '<center style="background: #009432; padding:10px;color: white;font-weight:bold;">You\'ve successfully reached us. Thank You for your wonderful suggestion : ))</a><a href="home.php" style="float:right;color:white;text-decoration:none"><i class="fa fa-close" id="closebtn" style="color: white;font-size: 20px;"></i></a></a></center>';
        include 'home.php';
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}?>