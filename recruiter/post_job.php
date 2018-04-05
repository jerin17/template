<!DOCTYPE html>
<html>
<head>
  <title>Post Job | Hireling</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">  
    <link rel="icon" type="image/gif" href="../css/images/logo.png"/>
</head>
<body>
<div id="header">
  <a href="../index.php"><img src="../css/images/logo.png"></a>
    <h1><a href="../home.php">Hireling</a></h1>
    <div id="navbar">
      <ul>
        <li><a href="../home.php">Home</a></li>         
        <li><a href="dashboard.php">Dashboard</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>

<section class="psec1" style="min-height: 100vh;">
<div id="post_job">
  <center style="font-weight: bolder;font-size: 120%;">POST JOB</center>
  <form action="post_job.php" method="POST">    
  <label>JOB TYPE :</label><br>
  <input type="text" name="j_type" placeholder="eg : IT / web design/ andorid app / graphic design" required>
  <br><label>DESCRIPTION :</label><br>
  <input type="text" name="j_description" placeholder="a brief description about the expected work" required>
  <br><label>SALARY :</label><br>
  <input type="text" name="j_sal" placeholder="sptipend /certificate / or any other incentives" required>
  <br><label>LOCATION :</label><br>
  <input type="text" name="j_location" placeholder="work form home / any other location" required>
  <br><label>TIME TO COMPLETE THE JOB :</label><br>
  <input type="text" name="j_time" placeholder="in months" required>
  <input type="text" name="date" hidden value='<?php echo date("d/m/Y"); ?>'>
  <br><br><input type="submit" name="submit" value="POST"><br>

</form>

</div>
</section>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
session_start();
$r_id=$_SESSION['r_id'];
include '../config.php';
include 'session.php';
$j_time=$_POST['j_time'];
$j_sal=$_POST['j_sal'];
$j_location=$_POST['j_location'];
$j_type=$_POST['j_type'];
$j_description=$_POST['j_description'];
$j_date=$_POST['date'];

$sql = "INSERT INTO jobs (r_id,j_time, j_sal ,j_location,j_type, j_description,j_date)
VALUES ('$r_id','$j_time','$j_sal', '$j_location','$j_type','$j_description','$j_date')";

if ($conn->query($sql) === TRUE)
    $msg="New record created successfully";

else
    echo "Error: " . $sql . "<br>" . $conn->error;

header('Location:dashboard.php#jobs');
}?>
