<!DOCTYPE html>
<html>
<head>
  <title>Jobs | Hireling</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">  
    <link rel="icon" type="image/gif" href="../css/images/logo.png"/>
</head>
<body style=" background: url(../css/background/back10.jpg);background-size: cover;background-repeat: repeat;background-attachment: fixed;">
<div id="header" style="position: fixed;z-index: 3;">
  <a href="../index.php"><img src="../css/images/logo.png"></a>
    <h1><a href="../home.php">Hireling</a></h1>
    <div id="navbar">
      <ul>
        <?php 
    if(!isset($_SESSION)){session_start();}
    if (isset($_SESSION['user'])) {
      @$f_id=$_SESSION['f_id'];
      if($f_id!="")
      {
      echo '<li><a href="../home.php">Home</a></li>'; 
      echo '<li><a href="dashboard.php">Dashboard</a></li>'; 
      echo '<button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>';
      }
    }
    else{
      echo '<li><a href="../home.php">Home</a></li>'; 
      echo '<button id="modalbtn" class="button" style="padding:10px 20px ">LOGIN</button>';
   }
    ?>
    </ul>
   </div> 
</div>
</div>

<section class="fjsec1">

<?php 
if(!isset($_POST['submit']))
{ 
?>  
<div class="fjcontainer"></div>
<div class="sort">
  <h1>Filter Result</h1>
<form action="jobs.php" method="post">
<label>Location </label>
<select name="j_location">
  <option value="">--- Select Place ---</option>
<?php 
include '../config.php';
$sqlloc="SELECT distinct j_location FROM jobs";
$result=mysqli_query($conn,$sqlloc);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
  <option value="<?php echo $row['j_location'];?>" style="text-transform: capitalize;"><?php echo $row['j_location'];?></option>
<?php }} ?>
</select>

<label>Job type </label>
<select name="j_type">
  <option value="">--- Select Type ---</option>
<?php 
include '../config.php';
$sqltype="SELECT distinct j_type FROM jobs";
$result=mysqli_query($conn,$sqltype);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
  <option value="<?php echo $row['j_type'];?>" style="text-transform: capitalize;"><?php echo $row['j_type'];?></option>
<?php }} ?>
</select>

<label>Organisation </label>
<select name="r_org">
  <option value="">--- Select Organisation ---</option>
<?php 
include '../config.php';
$sqlorg="SELECT distinct r_org FROM recruiters";
$result=mysqli_query($conn,$sqlorg);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
  <option value="<?php echo $row['r_org'];?>" style="text-transform: capitalize;"><?php echo $row['r_org'];?></option>
<?php }} ?>
</select>

<a href="jobs.php">Clear filter <i class="fa fa-refresh"></i></a>
<input type="submit" name="submit" value="Filter" style="float: right;">
</form>
</div>

<div class="jobs" style="background:transparent;">

      <?php 
      include '../config.php';
      $sql="SELECT * FROM jobs";     
      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        $r_id=$row['r_id'];
        $sql2="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
        $result2=mysqli_query($conn,$sql2);
        $row2 = $result2->fetch_assoc();
        ?>

  <div class="job_box" id="<?php echo $row['j_id'];?>">    
    <table id="job_table">
    <a href="org.php?r_id=<?php echo $row['r_id'] ?>"><img src="../recruiter/profile_pictures/<?php echo $row2['r_image']; ?>" style="width: 95px;margin-top: 20px;margin-right: 5px;float: right;"></a>
    <tr><td>Organisation</td><td> : </td><td style="text-transform: capitalize;font-size: 120%"><a href="org.php?r_id=<?php echo $row['r_id'] ?>" id="revlink"><?php echo $row2['r_org'];?></a></td></tr>
    <tr><td>Job ID</td><td> : </td><td> <?php echo $row['j_id'];?></td></tr>
    <tr><td>Job Type</td><td> : </td><td> <?php echo $row['j_type'];?></td></tr>
    <tr><td>Description </td><td> : </td><td><?php echo $row['j_description'];?></td>
    <tr><td>Location    </td><td> : </td><td><?php echo $row['j_location'];?></td>
    <tr><td>Incentive   </td><td> : </td><td>Rs. <?php echo $row['j_sal'];?></td>
    <tr><td>Time        </td><td> : </td><td><?php echo $row['j_time'];?> months</td>
    </table>
    <br>


  <?php 
          @session_start();
          @$f_id=$_SESSION['f_id'];
          $j_id=$row['j_id'];
          $sql3="SELECT * FROM apply WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result3=mysqli_query($conn,$sql3);
          $row3=mysqli_fetch_assoc($result3);
          $check=$row3['app'];

          $sql4="SELECT * FROM reject WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result4=mysqli_query($conn,$sql4);
          $row4=mysqli_fetch_assoc($result4);
          $reject=$row4['rej'];

          $sql5="SELECT * FROM shortlist WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result5=mysqli_query($conn,$sql5);
          $row5=mysqli_fetch_assoc($result5);
          $short=$row5['short'];

          
          if ($check==='1') 
          {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:white;background: orange;">Already Applied</a>
          <?php
          }
          
          else if ($reject==='2') {?>
            <span style="background: #c0392b;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color: #c0392b;background:white;cursor: not-allowed;">Not Selected</a>
          <?php
          }

          else if ($short==='2') {?>
            <span style="background:#009432;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:#009432;background: white;cursor: not-allowed;">Shortlisted</a>
          <?php
          }

          else
          {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" href="apply.php?id=<?php echo $row['j_id'];?>">Apply Now</a>
          <?php
          }
?>
    </span>
  </div>
<?php }}} ?>
<?php 
if(isset($_POST['submit']))
{ 
include '../config.php';
?>
<?php
  $j_type=$_POST['j_type'];
  $j_location=$_POST['j_location'];
  $r_org=$_POST['r_org'];
$sqlorg="SELECT * FROM recruiters where r_org='$r_org'";
$resultorg=mysqli_query($conn,$sqlorg);
$roworg=mysqli_fetch_assoc($resultorg);
$r_id=$roworg['r_id'];
?>
<div class="fjcontainer"></div>
<div class="sort">
  <h1>Filter Result</h1>
<form action="jobs.php" method="post">
<label>Location </label>
<select name="j_location">
  <option value="">--- Select Place ---</option>
<?php 
include '../config.php';
$sqlloc="SELECT distinct j_location FROM jobs";
$result=mysqli_query($conn,$sqlloc);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
  <option value="<?php echo $row['j_location'];?>" <?php if($j_location==$row['j_location']){echo "selected";}?> style="text-transform: capitalize;"><?php echo $row['j_location'];?></option>
<?php }} ?>
</select>

<label>Job type </label>
<select name="j_type">
  <option value="">--- Select Type ---</option>
<?php 
include '../config.php';
$sqltype="SELECT distinct j_type FROM jobs";
$result=mysqli_query($conn,$sqltype);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
  <option value="<?php echo $row['j_type'];?>" <?php if($j_type==$row['j_type']){echo "selected";}?> style="text-transform: capitalize;"><?php echo $row['j_type'];?></option>
<?php }} ?>
</select>

<label>Organisation </label>
<select name="r_org">
  <option value="">--- Select Organisation ---</option>
<?php 
include '../config.php';
$sqlorg="SELECT distinct r_org FROM recruiters";
$result=mysqli_query($conn,$sqlorg);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
  <option value="<?php echo $row['r_org'];?>" <?php if($r_org==$row['r_org']){echo "selected";}?> style="text-transform: capitalize;"><?php echo $row['r_org'];?></option>
<?php }} ?>
</select>

<a href="jobs.php">Clear filter <i class="fa fa-refresh"></i></a>
<input type="submit" name="submit" value="Filter" style="float: right;">
</form>
</div>

<div class="jobs" style="background:transparent;">

<?php
$sql="SELECT * FROM jobs";

if($j_type=="" && $r_org=="")
      $sql="SELECT * FROM jobs WHERE j_location='$j_location'";

else if($j_location=="" && $r_org=="")
      $sql="SELECT * FROM jobs WHERE j_type='$j_type'";

else if($j_location=="" && $j_type=="") 
        $sql="SELECT * FROM jobs WHERE r_id='$r_id'";

else if($j_location=="")
      $sql="SELECT * FROM jobs WHERE j_type='$j_type' AND r_id='$r_id'";

else if($j_type=="")
      $sql="SELECT * FROM jobs WHERE r_id='$r_id' AND j_location='$j_location'";

else if($r_org=="")
      $sql="SELECT * FROM jobs WHERE j_type='$j_type' AND j_location='$j_location'";

else
      $sql="SELECT * FROM jobs WHERE j_type='$j_type' AND j_location='$j_location' AND r_id='$r_id'";


      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        $r_id=$row['r_id'];
        $sql2="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
        $result2=mysqli_query($conn,$sql2);
        $row2 = $result2->fetch_assoc();
        ?>

  <div class="job_box" id="<?php echo $row['j_id'];?>">    
    <table id="job_table">
    <a href="org.php?r_id=<?php echo $row['r_id'] ?>"><img src="../recruiter/profile_pictures/<?php echo $row2['r_image']; ?>" style="width: 95px;margin-top: 20px;margin-right: 5px;float: right;"></a>
    <tr><td>Organisation</td><td> : </td><td style="text-transform: capitalize;font-size: 120%"><a href="org.php?r_id=<?php echo $row['r_id'] ?>" id="revlink"><?php echo $row2['r_org'];?></a></td></tr>
    <tr><td>Job ID</td><td> : </td><td> <?php echo $row['j_id'];?></td></tr>
    <tr><td>Job Type</td><td> : </td><td> <?php echo $row['j_type'];?></td></tr>
    <tr><td>Description </td><td> : </td><td><?php echo $row['j_description'];?></td>
    <tr><td>Location    </td><td> : </td><td><?php echo $row['j_location'];?></td>
    <tr><td>Incentive   </td><td> : </td><td>Rs. <?php echo $row['j_sal'];?></td>
    <tr><td>Time        </td><td> : </td><td><?php echo $row['j_time'];?> months</td>
    </table>
    <br>


  <?php 
          @session_start();
          @$f_id=$_SESSION['f_id'];
          $j_id=$row['j_id'];
          $sql3="SELECT * FROM apply WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result3=mysqli_query($conn,$sql3);
          $row3=mysqli_fetch_assoc($result3);
          $check=$row3['app'];

          $sql4="SELECT * FROM reject WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result4=mysqli_query($conn,$sql4);
          $row4=mysqli_fetch_assoc($result4);
          $reject=$row4['rej'];

          $sql5="SELECT * FROM shortlist WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result5=mysqli_query($conn,$sql5);
          $row5=mysqli_fetch_assoc($result5);
          $short=$row5['short'];
          
          if ($check==='1') 
          {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:white;background: orange;">Already Applied</a>
          <?php
          }
          
          else if ($reject==='2') {?>
            <span style="background: #c0392b;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color: #c0392b;background:white;cursor: not-allowed;">Not Selected</a>
          <?php
          }

          else if ($short==='2') {?>
            <span style="background:#009432;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:#009432;background: white;cursor: not-allowed;">Shortlisted</a>
          <?php
          }

          else
          {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" href="apply.php?id=<?php echo $row['j_id'];?>">Apply Now</a>
          <?php
          }
?>
    </span>
  </div>
<?php }}
else{ echo "<center style='color:white;'>Sorry, No record found !</center>";}
} 

?>
</div>
</div>

</section>



</body>
</html>