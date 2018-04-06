<?php 
if(isset($_POST['submit']))
{
include '../config.php';
$j_time = mysqli_real_escape_string($conn, $_POST['j_time']);
$j_sal = mysqli_real_escape_string($conn, $_POST['j_sal']);
$j_location = mysqli_real_escape_string($conn, $_POST['j_location']);
$j_type = mysqli_real_escape_string($conn, $_POST['j_type']);
$j_description = mysqli_real_escape_string($conn, $_POST['j_description']);
$j_id=$_GET['j_id'];

$sql = "UPDATE jobs SET j_time='$j_time', j_sal='$j_sal' ,j_location='$j_location',j_type='$j_type', j_description='$j_description' WHERE j_id='$j_id'" ;

if ($conn->query($sql) === TRUE) 
    echo "Record updated successfully";  
 
else 
    echo "Error: " . $sql . "<br>" . $conn->error;

header("Location:view_job.php?j_id=".$j_id);
}?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Job | Hireling</title>
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

<?php  
session_start();
include 'session.php';
include_once '../config.php';
$j_id=$_GET['j_id'];
$sql="SELECT * FROM jobs WHERE j_id='$j_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>

<section class="psec1" style="min-height: 100vh;">
<div id="post_job">
  <center style="font-weight: bolder;font-size: 120%;">POST JOB</center>
  <form action="edit_job.php?j_id=<?php echo $j_id;?>" method="POST">
  <label>JOB TYPE :</label><br>
  <input type="text" name="j_type" placeholder="eg : IT / web design/ andorid app / graphic design" value="<?php echo $row['j_type']; ?>" required>
  <br><label>DESCRIPTION :</label><br>
  <input type="text" name="j_description" placeholder="a brief description about the expected work" value="<?php echo $row['j_description']; ?>" required>
  <br><label>SALARY :</label><br>
  <input type="text" name="j_sal" placeholder="sptipend /certificate / or any other incentives" value="<?php echo $row['j_sal']; ?>" required>
  <br><label>LOCATION :</label><br>
  <input type="text" name="j_location" placeholder="work form home / any other location" value="<?php echo $row['j_location']; ?>" required>
  <br><label>TIME TO COMPLETE THE JOB :</label><br>
  <input type="text" name="j_time" placeholder="in months" value="<?php echo $row['j_time']; ?>" required>
  <input type="number" name="j_id" hidden value="<?php echo $row['j_time']; ?>"> 
  <br><br><input type="submit" name="submit" value="Update" style="cursor: pointer;"><br>
</form>

</div>
</section>
</body>
</html>
