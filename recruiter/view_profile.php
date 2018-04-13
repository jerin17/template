<?php  
    session_start();
    $f_id=$_GET['f_id'];
    include '../config.php';
    $sql="SELECT * FROM freelancers INNER JOIN f_details ON freelancers.f_id=$f_id AND f_details.f_id=$f_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
  <title><?php echo $row['f_name'];?> | Hireling</title>
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
        <li><a href="jobs.php">Jobs</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>


<section class="fsec1" id="top">
<div class="imgbox">
    <a id="picturebtn"><img src="../freelancer/profile_pictures/<?php echo $row['f_image'] ?>"></a>
</div>
 </div>
<div class="biobox" id="biobtn">
    <h2 style="text-transform: capitalize;"><?php echo $row['f_name'];?></h2>
    <p>
    <?php if($row['f_bio']!="") echo $row['f_bio'];?>
    <?php if ($row['f_bio']=="") echo 'Resume not available';?>
    </p>
    <b><a id="biobtn" class="editbio">Edit bio</a></b>
</div>
</section>

<section class="fsec2" id="details">

<div class="detailbox">
  <center class="detailbox-head" id="det1btn">Basic</center>
<table>
<a id="det1btn" class="editbtn"></a>
    <tr><td><i id="detailbox-icon" class="fa fa-user"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_name'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-envelope"></i></td><td><?php echo $row['f_email'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td><?php echo $row['f_phone'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-neuter"></i></td><td><?php echo $row['f_gender'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-birthday-cake"></i></td><td><?php echo $row['f_age'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-map-marker"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_city'];?></td></tr>
</table>
</div>

<div class="detailbox">
  <center class="detailbox-head" id="det2btn">Personal Details</center>
<table>
<a id="det2btn" class="editbtn"></a>
    <tr><td><i id="detailbox-icon" class="fa fa-graduation-cap"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_firm'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_work'];?></td></tr>
    
    <?php if($row['f_resume']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-file"></i></td><td style="color:#1abc9c"><a href="../freelancer/resume/<?php echo $row['f_resume'];?>">Download Resume </a><i class="fa fa-download"></i></td></tr>
    <?php } ?>
    <?php if ($row['f_resume']=="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-file"></i></td><td style="color:grey">Resume not availabe</td></tr>
    <?php } ?>

    <?php if($row['f_project']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-suitcase"></i></td><td><a target="blank" href="<?php echo $row["f_project"]?>" > Project link availabe <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
    <?php } ?>
    <?php if ($row['f_project']=="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-suitcase"></i></td><td style="color: grey"> Project link not availabe </td></tr>
    <?php } ?>    

    
    <tr><td><i id="detailbox-icon" class="fa fa-superpowers"></i></td><td><?php echo $row['f_skill'];?></td></tr>
</table>
</div>

<div class="detailbox" >
  <center class="detailbox-head" id="det3btn">Social Links</center>
<table>
<a id="det3btn" class="editbtn"></a>
<?php   
$str = $row['f_name'];
$name=explode(" ",$str)[0];
?>
<?php if($row['f_linkedin']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-linkedin"></i></td><td><a target="blank" href="<?php echo $row["f_linkedin"]?>" id="linkcol">Connect <?php echo $name ?> on LinkedIn <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['f_linkedin']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-linkedin"></i></td><td style="color: grey;">LinkedIn profile not available</td></tr>
<?php } ?>

<?php if($row['f_github']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-github"></i></td><td><a target="blank" href="<?php echo $row["f_github"]?>" id="gitcol">Connect <?php echo $name ?> on Github <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['f_github']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-github"></i></td><td style="color: grey;">Github link not available</td></tr>
<?php } ?>

<?php if($row['f_facebook']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-facebook"></i></i></td><td><a target="blank" href="<?php echo $row["f_facebook"]?>" id="facecol">Connect <?php echo $name ?> on Facebook <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['f_facebook']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-facebook"></i></td><td style="color: grey">Facebook link not available</td></tr>
<?php } ?>


<?php if($row['f_google']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-google-plus"></i></i></i></td><td><a target="blank" href="<?php echo $row["f_google"]?>" id="gpluscol">Connect <?php echo $name ?> on Google Plus <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['f_google']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-google-plus"></i></td><td style="color: grey">Google Plus link not available</td></tr>
<?php } ?>
    

<?php if($row['f_instagram']!="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-instagram"></i></i></i></i></td><td><a target="blank" href="<?php echo $row["f_instagram"]?>" id="instacol">Connect <?php echo $name ?> on Instagram <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
<?php } ?>
<?php if ($row['f_instagram']=="") {?>
<tr><td><i id="detailbox-icon" class="fa fa-instagram"></i></td><td  style="color: grey">Instagram link not available</td></tr>
<?php } ?>
    

</table>
</div>
</section>


</body>
<script src="dash.js"></script>
</html>