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
        <li><a href="../home.php">Home</a></li>         
        <li><a href="dashboard.php">Dashboard</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>

<section class="fjsec1">

<div class="fjcontainer"></div>
<div class="sort">
  <h1>Filter Result</h1>
<form action="" method="post">
<label>Location </label>
<select name="j_location">
  <option value="">--- select place ---</option>
  <option value="delhi">delhi</option>
  <option value="california">california</option>
  <option value="work from home">work from home</option>
  <option value="noida">noida</option>
</select>

<label>Job type </label>
<select name="j_type" id="">
  <option value="">--- select type ---</option>
  <option value="IT">IT</option>
  <option value="web dev">web dev</option>
  <option value="android">android</option>
  <option value="design">design</option>
</select>

<label>Organisation </label>
<select name="j_type" id="">
  <option value="">--- select Organisation ---</option>
  <option value="IT">IT</option>
  <option value="web dev">Hireling</option>
  <option value="android">Google</option>
  <option value="design">new</option>
</select>
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
          $f_id=$_SESSION['f_id'];
          $j_id=$row['j_id'];
          $sql3="SELECT * FROM apply WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result3=mysqli_query($conn,$sql3);
          $row3=mysqli_fetch_assoc($result3);
          $check=$row3['app'];

          $sql4="SELECT * FROM reject WHERE f_id='$f_id' AND j_id='$j_id' ";
          $result4=mysqli_query($conn,$sql4);
          $row4=mysqli_fetch_assoc($result4);
          $reject=$row4['rej'];

          
          if ($check==='1') 
          {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:white;background: orange;">Already Applied</a>
          <?php
          }
          
          else if ($reject==='2') {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:white;background: #c0392b;cursor: not-allowed;">Not Selected</a>
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
<?php }} ?>


</section>

</body>
</html>