<!DOCTYPE html>
<html>
<head>
  <title>View Job | Hireling</title>
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
        <li><a href="post_job.php">Post Job</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>


<section class="fsec3">
  <div id="view_job">
    <span><a href="dashboard.php#jobs"><i class="fa fa-close"  style="float: right;font-size: 25px;color: white;"></i></a></span>
<?php  
include '../config.php';
// include 'session.php';
$j_id=$_GET['j_id'];
$sql="SELECT * FROM jobs WHERE j_id=$j_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$r_id=$row['r_id'];
$sql2="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
$result2=mysqli_query($conn,$sql2);
$row2=mysqli_fetch_assoc($result2);

?>
    <center class="capt" style="text-transform: capitalize;"><caption class="capt"><?php echo $row2['r_org'];?></caption></center>
    <table id="job_table">
    <img src="profile_pictures/<?php echo $row2['r_image']; ?>" style="width: 95px;margin-top: 20px;margin-right: 5px;float: right;">
    <tr><td>Job ID</td><td> : </td><td> #<?php echo $row['j_id'];?></td></tr>
    <tr><td>Job Type</td><td> : </td><td> <?php echo $row['j_type'];?></td></tr>
    <tr><td>Description </td><td> : </td><td><?php echo $row['j_description'];?></td>
    <tr><td>Location    </td><td> : </td><td><?php echo $row['j_location'];?></td>
    <tr><td>Incentive   </td><td> : </td><td>Rs. <?php echo $row['j_sal'];?></td>
    <tr><td>Time        </td><td> : </td><td><?php echo $row['j_time'];?> month(s)</td>
    </table>
    <br>
    <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
      <a href="delete_job.php?id=<?php echo $row['j_id'];?>" onclick="return confirm('Do you want to delete this record ?')" style="text-decoration: none;padding: 2px 10px;float: right;" id="revlink">Delete <i class="fa fa-trash"></i></a>
      <a href="edit_job.php?j_id=<?php echo $row['j_id'];?>" style="text-decoration: none;padding: 2px 10px; float: right;" id="revlink">Edit <i class="fa fa-pencil-square-o"></i></a>
    </span>
  </div>
<br>
</section>
<section class="fsec3" style="min-height: 51vh">
<div class="status">
<table border="1" bordercolor="#fff" cellspacing="0">
<caption>Jobs Status</caption>
<tr> 
  <th>S No.</th>
  <th>Name</th>
  <th>Email ID</th>
  <th>Phone</th>
  <th>Gender</th>
  <th>Age</th>
  <th>View profile</th>
  <th>Reject</th>
</tr>

<?php
$count=1;
$sql2="SELECT * FROM apply WHERE j_id='$j_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$f_id=$row2['f_id'];
if ($row2['app']==='1') {
      $sql3="SELECT * FROM freelancers WHERE f_id='$f_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);
?>
<tr>
  <td><?php echo $count++; ?></td>
  <td style="text-transform: capitalize;"><?php echo $row3['f_name'];?></td>
  <td><?php echo $row3['f_email'];?></td>
  <td><?php echo $row3['f_phone'];?></td>
  <td><?php echo $row3['f_gender'];?></td>
  <td><?php echo $row3['f_age'];?></td>
  <td><a target="blank" href="view_profile.php?f_id=<?php echo $row3['f_id'];?>&j_id=<?php echo $j_id;?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
  <td><a href="reject.php?f_id=<?php echo $row3['f_id'];?>&j_id=<?php echo $j_id;?>" onclick="return confirm('Do you want to delete this record ?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
</tr>

<?php

}}}?>

<?php
if ($result2->num_rows== 0){?>
<tr>
  <td colspan="8">No record to display :(</td>
</tr>

<?php }?>

</table>    
</div>
</section>

</body>
</html>