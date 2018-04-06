<?php  
    session_start();
    $r_id=$_SESSION['r_id'];
    include '../config.php';
    include 'session.php';
    $sql="SELECT * FROM recruiters INNER JOIN r_details ON recruiters.r_id=$r_id AND r_details.r_id=$r_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);


if(isset($_POST['submitpicture']))
{
$target = "profile_pictures/".basename($_FILES['image']['name']);
$image = $_FILES['image']['name'];
$sql = "UPDATE r_details SET r_image='$image' WHERE r_id='$r_id'" ;

if ($conn->query($sql) === TRUE)
{ 
        @move_uploaded_file($_FILES['image']['tmp_name'] , $target);
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;
 header('Location:dashboard.php');
}


if(isset($_POST['remove_picture'])){
  
if ($row['r_image']!="avatar.png") {
  $file='profile_pictures/'.$row['r_image'];
  unlink($file);
} 

$r_image="avatar.png";
$sql = "UPDATE r_details SET r_image='$r_image' WHERE r_id='$r_id'" ;
mysqli_query($conn , $sql); 
header('Location:dashboard.php#top');
}


if(isset($_POST['submitbio'])){
$r_bio = mysqli_real_escape_string($conn, $_POST['r_bio']);
$sql = "UPDATE r_details SET r_bio='$r_bio' WHERE r_id='$r_id'" ;
if ($conn->query($sql) === TRUE)
   $msg="Record updated successfully";
else 
    echo "Error: " . $sql . "<br>" . $conn->error;
header('Location:dashboard.php');
}


if(isset($_POST['submitdet1'])){
$r_org = mysqli_real_escape_string($conn, $_POST['r_org']);
$r_name = mysqli_real_escape_string($conn, $_POST['r_name']);
$r_phone = mysqli_real_escape_string($conn, $_POST['r_phone']);
$r_city = mysqli_real_escape_string($conn, $_POST['r_city']);
$r_website = mysqli_real_escape_string($conn, $_POST['r_website']);

$sqldet1="UPDATE recruiters SET r_org='$r_org',r_name='$r_name', r_phone='$r_phone',r_city='$r_city' WHERE `r_id`=$r_id";
        mysqli_query($conn , $sqldet1); 

$sqldet11="UPDATE r_details SET r_website='$r_website' WHERE `r_id`=$r_id";
        mysqli_query($conn , $sqldet11); 

// if ($conn->query($sqldet1) === TRUE)
//    $msg="Record updated successfully";
// else 
//     echo "Error: " . $sqldet1 . "<br>" . $conn->error;
header('Location:dashboard.php#details');
}


if(isset($_POST['submitdet2'])){
$r_firm = mysqli_real_escape_string($conn, $_POST['r_firm']);
$r_work = mysqli_real_escape_string($conn, $_POST['r_work']);
$r_project = mysqli_real_escape_string($conn, $_POST['r_project']);
$r_skill = mysqli_real_escape_string($conn, $_POST['r_skill']);
$sqldet2="UPDATE freelancers SET r_firm='$r_firm',r_work='$r_work',r_skill='$r_skill',r_project='$r_project' WHERE `r_id`=$r_id";

  if ($conn->query($sqldet2) === TRUE)
     echo $msg="Record updated successfully<br>";
  else 
      echo "Error: " . $sqldet2 . "<br>" . $conn->error;

$target = "resume/".basename($_FILES['file']['name']);
$file = $_FILES['file']['name'];
$FileType = pathinfo($target,PATHINFO_EXTENSION);
if($file!="")
{
 if($FileType != "doc" && $FileType != "docx" && $FileType != "pdf")
    {$msg= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";}

       $sqldet22="UPDATE r_details SET r_resume='$file' WHERE `r_id`=$r_id";             
          if ($conn->query($sqldet22) === TRUE)
             echo $msg="Resume updated successfully<br>";
          else 
              echo "Error: " . $sqldet22 . "<br>" . $conn->error;            
        if (@move_uploaded_file($_FILES['file']['tmp_name'] , $target))
           echo "uploaded";

        else
            echo "error ".$conn->error;
}
header('Location:dashboard.php#details');
}

if(isset($_POST['remove_resume'])){
$r_resume="";
$sql = "UPDATE r_details SET r_resume='$r_resume' WHERE r_id='$r_id'" ;
mysqli_query($conn , $sql); 
header('Location:dashboard.php#details');
}

if(isset($_POST['submitdet3'])){
$r_linkedin = mysqli_real_escape_string($conn, $_POST['r_linkedin']);
$r_github = mysqli_real_escape_string($conn, $_POST['r_github']);
$r_facebook = mysqli_real_escape_string($conn, $_POST['r_facebook']);
$r_google = mysqli_real_escape_string($conn, $_POST['r_google']);
$r_instagram = mysqli_real_escape_string($conn, $_POST['r_instagram']);
$sqldet3="UPDATE r_details SET r_linkedin='$r_linkedin',r_github='$r_github',r_google='$r_google',r_facebook='$r_facebook',r_instagram='$r_instagram' WHERE `r_id`=$r_id";

if ($conn->query($sqldet3) === TRUE)
   $msg="Record updated successfully";
else 
    echo "Error: " . $sqldet3 . "<br>" . $conn->error;
header('Location:dashboard.php#details');
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard | Hireling</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">  
    <link rel="icon" type="image/gif" href="../css/images/logo.png"/>
</head>
<body>
<div id="picturemodal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Profile Picture</h1>

    <form action="dashboard.php" method="POST">
    <input type="submit" value="X" name="remove_picture" style="background: transparent;color: red;font-size: 150%;font-weight: bolder;position: relative;top: 52px;left: 320px;width: auto;">
    </form>

      <form action="dashboard.php" method="post" enctype="multipart/form-data">
        <div class="pictureimg">
        <img src="profile_pictures/<?php echo $row['r_image'] ?>" id="pictureimg">
        </div>
        <label>Update picture :</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" style="font-size: 70%" name="image" required /><br>
        <input type="submit" name="submitpicture" value="Update Profile">    
      </form>
</div>
</div>

<div id="biomodal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Biography</h1>
  <form action="dashboard.php" method="POST">
    <textarea name="r_bio" cols="60" rows="100" required><?php echo $row['r_bio'] ?></textarea>
    <input type="submit" name="submitbio" value="Update Profile">    
  </form>
</div>
</div>

<div id="det1modal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Basic Information</h1>
  <form action="dashboard.php" method="POST">
    <label>Organisation Name</label>
    <input type="text" name="r_org" value="<?php echo $row['r_org'] ?>" required>
    <label>Name</label>
    <input type="text" name="r_name" value="<?php echo $row['r_name'] ?>" required>
    <label>Email ID</label>
    <input type="email" style="background: grey;cursor: not-allowed;" name="r_email" value="<?php echo $row['r_email'] ?>" disabled required>
    <label>Contact No.</label>
    <input type="number" name="r_phone" value="<?php echo $row['r_phone'] ?>" required>
    <label>City</label>
    <input type="text" name="r_city" value="<?php echo $row['r_city'] ?>" required>
    <label>Website</label>
    <input type="text" name="r_website" value="<?php echo $row['r_website'] ?>">
    <input type="submit" name="submitdet1" value="Update Profile">    

  </form>
</div>
</div>

<div id="det3modal" class="dashmodal">
  <div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Social Links</h1>
  <form action="dashboard.php" method="POST">
    <b class="fa fa-linkedin" id="linkcol"></b><label> LinkedIn</label>
    <input type="text" name="r_linkedin" value="<?php echo $row['r_linkedin'] ?>">
    <b class="fa fa-github" id="gitcol"></b><label> Github</label>
    <input type="text" name="r_github"  value="<?php echo $row['r_github'] ?>">
    <b class="fa fa-facebook" id="facecol"></b><label> Facebook</label>
    <input type="text" name="r_facebook"  value="<?php echo $row['r_facebook'] ?>">
    <b class="fa fa-google-plus" id="gpluscol"></b><label> Google Plus</label>
    <input type="text" name="r_google" value="<?php echo $row['r_google'] ?>">
    <b class="fa fa-instagram" id="instacol"></b><label> Instagram</label>
    <input type="text" name="r_instagram"  value="<?php echo $row['r_instagram'] ?>">
    <input type="submit" name="submitdet3" value="Update Profile">    
  
  </form>
</div>
</div>

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


<section class="fsec1" id="top">
<div class="imgbox">
    <a id="picturebtn"><img src="profile_pictures/<?php echo $row['r_image'] ?>"></a>
    <center id="imgspan">Click on the profile picture to edit</center>
</div>
 </div>
<div class="biobox" id="biobtn">
    <h2 style="text-transform: capitalize;"><?php echo $row['r_org'];?></h2>
    <p>
    <?php if($row['r_bio']!="") echo $row['r_bio'];?>
    <?php if ($row['r_bio']=="") echo 'Resume not available';?>
    </p>
    <b><a id="biobtn" class="editbio">Edit bio</a></b>
<span id="biospan">Click anywhere on the bio to edit</span>
</div>
</section>

<section class="fsec2" id="details" >

<div class="detailbox">
  <center class="detailbox-head">Basic / HR</center>
<table>
<a id="det1btn" class="editbtn"><i class="fa fa-pencil-square-o" id="det1btn"></i></a>
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
<a href="password.php" id="passwordbtn"  class="passwordbtn" style="color: white;text-decoration: none;cursor: pointer;margin-right: 20px;margin-top:-20px;margin-bottom: 20px;float: right;">Change password <i class="fa fa-lock"></i></a>
</div>

<div class="detailbox" style="display: none">
  <center class="detailbox-head" id="det2btn">Personal Details</center>
<table>
<a id="det2btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
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
  <center class="detailbox-head" >Social Links</center>
<table>
<a id="det3btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
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


<section class="fsec3" id="jobs">
<div class="status">
<table border="1" bordercolor="#fff" cellspacing="0">
<caption>My Jobs</caption>
<tr> 
  <th>Job ID</th>
  <th>Job Type</th>
  <th>Posted On</th>
  <th>Action</th>
</tr>

      <?php 
      $sql="SELECT * FROM jobs WHERE r_id='$r_id'";    
      $result=mysqli_query($conn,$sql);
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      ?>

<tr>
  <td><?php echo $row['j_id'];?></td>
  <td><?php echo $row['j_type'];?></td>
  <td><?php echo $row['j_date'];?></td>
  <td>
      <a href="view_job.php?j_id=<?php echo $row['j_id'];?>" style="padding: 2px 10px;" id="link">View Job</a>
  </td>
</tr>
<?php }} ?>

<?php
if ($result->num_rows== 0){?>
<tr>
  <td colspan="4">No record to display :( <a href="post_job.php" id="revlink">Click here</a> to Post job</td>
</tr>

<?php }?>

</table>    
</div>
</section>

</body>
<script src="dash.js"></script>
</html>

