<?php  
    session_start();
    $r_id=$_GET['r_id'];
    include '../config.php';
    $sql="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Organisation Details | Hireling</title>
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

<section class="fsec1" id="top">
<div class="imgbox">
    <a id="picturebtn"><img src="../recruiter/profile_pictures/<?php echo $row['r_image'] ?>"></a>
</div>
 </div>
<div class="biobox" id="biobtn">
    <h2 style="text-transform: capitalize;"><?php echo $row['r_org'];?></h2>
    <p>
    <?php if($row['r_bio']!="") echo $row['r_bio'];?>
    <?php if ($row['r_bio']=="") echo 'Resume not available';?>
    </p>
    <b><a id="biobtn" class="editbio">Edit bio</a></b>
</div>
</section>

<section class="fsec2" id="details" >

<div class="detailbox">
  <center class="detailbox-head" id="det1btn">Basic / HR</center>
<table>
    <tr><td><i id="detailbox-icon" class="fa fa-users"></i></td><td style="text-transform: capitalize;"><?php echo $row['r_org'];?></td><td>( Organisation name )</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-user"></i></td><td style="text-transform: capitalize;"><?php echo $row['r_name'];?></td><td>( HR )</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-envelope"></i></td><td><?php echo $row['r_email'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td><?php echo $row['r_phone'];?></td></tr>

    <?php if($row['r_city']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-map-marker"></i></td><td style="text-transform: capitalize;"><?php echo $row['r_city'];?></td></tr>
    <?php } ?>
    <?php if ($row['r_city']=="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-map-marker"></i></td><td style="color: grey">city not availabe </td></tr>
    <?php } ?>    

    <?php if($row['r_website']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-laptop"></i></td><td><a target="blank" href="<?php echo $row["r_website"]?>" ><?php echo $row["r_website"]?> <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
    <?php } ?>
    <?php if ($row['r_website']=="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-laptop"></i></td><td style="color: grey"> website not availabe </td></tr>
    <?php } ?>    


  
</table>
</div>

<div class="detailbox" style="display: none">
  <center class="detailbox-head" id="det2btn">Personal Details</center>
<table>
    <tr><td><i id="detailbox-icon" class="fa fa-graduation-cap"></i></td><td style="text-transform: capitalize;"><?php echo $row['r_firm'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td style="text-transform: capitalize;"><?php echo $row['r_work'];?></td></tr>
    
    <?php if($row['r_resume']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-file"></i></td><td style="color:#1abc9c"><a href="resume/<?php echo $row['r_resume'];?>">Download Resume </a><i class="fa fa-download"></i></td></tr>
    <?php } ?>
    <?php if ($row['r_resume']=="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-file"></i></td><td style="color:grey">Resume not availabe</td></tr>
    <?php } ?>

    <?php if($row['r_project']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-suitcase"></i></td><td><a target="blank" href="<?php echo $row["r_project"]?>" > Project link availabe <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
    <?php } ?>
    <?php if ($row['r_project']=="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-suitcase"></i></td><td style="color: grey"> Project link not availabe </td></tr>
    <?php } ?>    

    
    <tr><td><i id="detailbox-icon" class="fa fa-superpowers"></i></td><td><?php echo $row['r_skill'];?></td></tr>
</table>
</div>

<div class="detailbox" >
  <center class="detailbox-head" id="det3btn">Social Links</center>
<table>
<?php   
$str = $row['r_org'];
$name=explode(" ",$str)[0];
?>
<?php if($row['r_linkedin']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-linkedin"></i></td><td><a target="blank" href="<?php echo $row["r_linkedin"]?>" id="linkcol">Connect <?php echo $name ?> on LinkedIn <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['r_linkedin']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-linkedin"></i></td><td style="color: grey;">LinkedIn profile not available</td></tr>
<?php } ?>

<?php if($row['r_github']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-github"></i></td><td><a target="blank" href="<?php echo $row["r_github"]?>" id="gitcol">Connect <?php echo $name ?> on Github <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['r_github']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-github"></i></td><td style="color: grey;">Github link not available</td></tr>
<?php } ?>

<?php if($row['r_facebook']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-facebook"></i></i></td><td><a target="blank" href="<?php echo $row["r_facebook"]?>" id="facecol">Connect <?php echo $name ?> on Facebook <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['r_facebook']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-facebook"></i></td><td style="color: grey">Facebook link not available</td></tr>
<?php } ?>


<?php if($row['r_google']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-google-plus"></i></i></i></td><td><a target="blank" href="<?php echo $row["r_google"]?>" id="gpluscol">Connect <?php echo $name ?> on Google Plus <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['r_google']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-google-plus"></i></td><td style="color: grey">Google Plus link not available</td></tr>
<?php } ?>
    

<?php if($row['r_instagram']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-instagram"></i></i></i></i></td><td><a target="blank" href="<?php echo $row["r_instagram"]?>" id="instacol">Connect <?php echo $name ?> on Instagram <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['r_instagram']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-instagram"></i></td><td  style="color: grey">Instagram link not available</td></tr>
<?php } ?>
    

</table>
</div>
</section>


<section class="fsec3" id="jobs" style="  background: url('../css/background/back10.jpg');background-size: 1400px">

<div class="jobs" style="background:transparent;">
  <?php 
          $r_id=$_GET['r_id'];
          $sql3="SELECT * FROM recruiters WHERE r_id='$r_id'";
          $result3=mysqli_query($conn,$sql3);
          $row3=mysqli_fetch_assoc($result3);

  ?>
<h1 style="color: white;text-transform: capitalize;">Jobs from <?php echo $row3['r_org']; ?></h1>
      <?php 
      include '../config.php';
      $r_id=$_GET['r_id'];
      $sql="SELECT * FROM jobs WHERE r_id=$r_id";     
      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        $r_id=$row['r_id'];
        $sql2="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
        $result2=mysqli_query($conn,$sql2);
        $row2 = $result2->fetch_assoc();
        ?>

  <div class="job_box" style="width: 150%">    
    <table id="job_table">
    <a href="org.php?r_id=<?php echo $row['r_id'] ?>"><img src="../recruiter/profile_pictures/<?php echo $row2['r_image']; ?>" style="width: 95px;margin-top: 20px;margin-right: 5px;float: right;"></a>
    <tr><td>Organisation</td><td> : </td><td style="text-transform: capitalize;font-size: 120%"><a href="org.php?r_id=<?php echo $row['r_id'] ?>" id="revlink"><?php echo $row2['r_org'];?></a></td></tr>
    <tr><td>Job ID</td><td> : </td><td> <?php echo $row['j_id'];?></td></tr>
    <tr><td>Job Type</td><td> : </td><td> <?php echo $row['j_type'];?></td></tr>
    <tr><td>Description </td><td> : </td><td><?php echo $row['j_description'];?></td>
    <tr><td>Location    </td><td> : </td><td><?php echo $row['j_location'];?></td>
    <tr><td>Incentive   </td><td> : </td><td><?php echo $row['j_sal'];?></td>
    <tr><td>Time        </td><td> : </td><td><?php echo $row['j_time'];?></td>
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
            <a class="job_app" style="color:white;background: orange">Already Applied</a>
          <?php
          }
          
          else if ($reject==='2') {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" style="color:white;background: #c0392b">Not Selected</a>
          <?php
          }

          else
          {?>
            <span style="background: #444;color: white;padding: 10px 20px;display: block;"> Posted on : <?php echo $row['j_date'];?>
            <a class="job_app" href="f_apply.php?id=<?php echo $row['j_id'];?>">Apply Now</a>
          <?php
          }
          ?>




    </span>
  </div>
<?php }} ?>
</section>

</body>
<script src="dash.js"></script>
</html>

