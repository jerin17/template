<?php  
    session_start();
    $f_id=$_SESSION['f_id'];
    include '../config.php';
    include 'session.php';
    $sql="SELECT * FROM freelancers INNER JOIN f_details ON freelancers.f_id=$f_id AND f_details.f_id=$f_id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);


if(isset($_POST['submitpicture']))
{
$target = "profile_pictures/".basename($_FILES['image']['name']);
echo $image = $_FILES['image']['name'];
$sql = "UPDATE f_details SET f_image='$image' WHERE f_id='$f_id'" ;

if ($conn->query($sql) === TRUE)
{ 
        @move_uploaded_file($_FILES['image']['tmp_name'] , $target);
}
else 
    echo "Error: " . $sql . "<br>" . $conn->error;
header('Location:dashboard.php');
}


if(isset($_POST['remove_picture'])){  
if ($row['r_image']!="user.png") {
  $file='profile_pictures/'.$row['r_image'];
  unlink($file);
} 
$f_image="user.png";
$sql = "UPDATE f_details SET f_image='$f_image' WHERE f_id='$f_id'" ;
mysqli_query($conn , $sql); 
header('Location:dashboard.php#top');
}

if(isset($_POST['submitbio'])){
$f_bio = mysqli_real_escape_string($conn, $_POST['f_bio']);
$sql = "UPDATE f_details SET f_bio='$f_bio' WHERE f_id='$f_id'" ;
if ($conn->query($sql) === TRUE)
   $msg="Record updated successfully";
else 
    echo "Error: " . $sql . "<br>" . $conn->error;
header('Location:dashboard.php');
}


if(isset($_POST['submitdet1'])){
$f_name = mysqli_real_escape_string($conn, $_POST['f_name']);
$f_phone = mysqli_real_escape_string($conn, $_POST['f_phone']);
$f_gender = mysqli_real_escape_string($conn, $_POST['f_gender']);
$f_age = mysqli_real_escape_string($conn, $_POST['f_age']);
$f_city = mysqli_real_escape_string($conn, $_POST['f_city']);

$sqldet1="UPDATE freelancers SET f_name='$f_name',f_phone='$f_phone',f_age='$f_age',f_gender='$f_gender',f_city='$f_city' WHERE `f_id`=$f_id";

if ($conn->query($sqldet1) === TRUE)
   $msg="Record updated successfully";
else 
    echo "Error: " . $sqldet1 . "<br>" . $conn->error;
header('Location:dashboard.php#details');
}


if(isset($_POST['submitdet2'])){
$f_firm = mysqli_real_escape_string($conn, $_POST['f_firm']);
$f_work = mysqli_real_escape_string($conn, $_POST['f_work']);
$f_project = mysqli_real_escape_string($conn, $_POST['f_project']);
$f_skill = mysqli_real_escape_string($conn, $_POST['f_skill']);
$sqldet2="UPDATE freelancers SET f_firm='$f_firm',f_work='$f_work',f_skill='$f_skill',f_project='$f_project' WHERE `f_id`=$f_id";

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

       $sqldet22="UPDATE f_details SET f_resume='$file' WHERE `f_id`=$f_id";             
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
$file='resume/'.$row['f_resume'];
unlink($file);

$f_resume="";
$sql = "UPDATE f_details SET f_resume='$f_resume' WHERE f_id='$f_id'" ;
mysqli_query($conn , $sql); 
header('Location:dashboard.php#details');
}

if(isset($_POST['submitdet3'])){
$f_linkedin = mysqli_real_escape_string($conn, $_POST['f_linkedin']);
$f_github = mysqli_real_escape_string($conn, $_POST['f_github']);
$f_facebook = mysqli_real_escape_string($conn, $_POST['f_facebook']);
$f_google = mysqli_real_escape_string($conn, $_POST['f_google']);
$f_instagram = mysqli_real_escape_string($conn, $_POST['f_instagram']);
$sqldet3="UPDATE f_details SET f_linkedin='$f_linkedin',f_github='$f_github',f_google='$f_google',f_facebook='$f_facebook',f_instagram='$f_instagram' WHERE `f_id`=$f_id";

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
        <img src="profile_pictures/<?php echo $row['f_image'] ?>" id="pictureimg">
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
    <textarea name="f_bio" cols="60" rows="100" required><?php echo $row['f_bio'] ?></textarea>
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
    <label>Name</label>
    <input type="text" name="f_name" value="<?php echo $row['f_name'] ?>" required>
    <label>Email ID</label>
    <input type="email" style="margin-top: 5px;background: grey;cursor: not-allowed;" name="f_email" value="<?php echo $row['f_email'] ?>" disabled required>
    <label>Contact No.</label>
    <input type="number" name="f_phone" value="<?php echo $row['f_phone'] ?>" required>
    <label>Gender</label>
    <input type="text" name="f_gender" value="<?php echo $row['f_gender'] ?>" required>
    <label>Age</label>
    <input type="number" name="f_age" value="<?php echo $row['f_age'] ?>" required>
    <label>City</label>
    <input type="text" name="f_city" value="<?php echo $row['f_city'] ?>" required>

    <input type="submit" name="submitdet1" value="Update Profile">    

  </form>
</div>
</div>

<div id="det2modal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Personal Details</h1>
    <form action="dashboard.php" method="post" enctype="multipart/form-data">
    <label>School/College/Company</label>
    <input type="text" name="f_firm" value="<?php echo $row['f_firm'] ?>" required>
    <label>Work Profile</label>
    <input type="text" name="f_work" placeholder="student/employee" value="<?php echo $row['f_work'] ?>"  required>
    <label>Project Link</label>
    <input type="text" name="f_project" value="<?php echo $row['f_project'] ?>">
    <label>Skill</label>
    <textarea name="f_skill" id="skills" cols="30" rows="10"><?php echo $row['f_skill'] ?></textarea>
    <label>Attach Resume</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="file" name="file" style="font-size: 70%" /><br>
    <input type="submit" name="submitdet2" value="Update Profile">    
  </form>
  <form action="dashboard.php" method="POST">
    <input type="submit" value="Remove Resume" name="remove_resume" style="position: relative;top: -142px;left: 420px;width: auto;padding-right: 15px;font-size: 80%">
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
    <input type="text" name="f_linkedin" value="<?php echo $row['f_linkedin'] ?>">
    <b class="fa fa-github" id="gitcol"></b><label> Github</label>
    <input type="text" name="f_github"  value="<?php echo $row['f_github'] ?>">
    <b class="fa fa-facebook" id="facecol"></b><label> Facebook</label>
    <input type="text" name="f_facebook"  value="<?php echo $row['f_facebook'] ?>">
    <b class="fa fa-google-plus" id="gpluscol"></b><label> Google Plus</label>
    <input type="text" name="f_google" value="<?php echo $row['f_google'] ?>">
    <b class="fa fa-instagram" id="instacol"></b><label> Instagram</label>
    <input type="text" name="f_instagram"  value="<?php echo $row['f_instagram'] ?>">
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
        <li><a href="jobs.php">Jobs</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>


<section class="fsec1" id="top">
<div class="imgbox">
    <a id="picturebtn"><img src="profile_pictures/<?php echo $row['f_image'] ?>"></a>
    <center id="imgspan">Click on the profile picture to edit</center>
</div>
 </div>
<div class="biobox" id="biobtn">
    <h2 style="text-transform: capitalize;"><?php echo $row['f_name'];?></h2>
    <p>
    <?php if($row['f_bio']!="") echo $row['f_bio'];?>
    <?php if ($row['f_bio']=="") echo 'Biography not available';?>
    </p>
    <b><a id="biobtn" class="editbio">Edit bio</a></b>
<span id="biospan">Click anywhere on the bio to edit</span>
</div>
</section>

<section class="fsec2" id="details">

<div class="detailbox">
  <center class="detailbox-head" >Basic</center>
<table>
<a id="det1btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
    <tr><td><i id="detailbox-icon" class="fa fa-user"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_name'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-envelope"></i></td><td><?php echo $row['f_email'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td><?php echo $row['f_phone'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-neuter"></i></td><td><?php echo $row['f_gender'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-birthday-cake"></i></td><td><?php echo $row['f_age'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-map-marker"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_city'];?></td></tr>
</table>
<a href="password.php" id="passwordbtn"  class="passwordbtn" style="color: white;text-decoration: none;cursor: pointer;margin-right: 20px;margin-top:-20px;margin-bottom: 20px;float: right;">Change password <i class="fa fa-lock"></i></a>
</div>

<div class="detailbox">
  <center class="detailbox-head" >Personal Details</center>
<table>
<a id="det2btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
    <tr><td><i id="detailbox-icon" class="fa fa-graduation-cap"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_firm'];?></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td style="text-transform: capitalize;"><?php echo $row['f_work'];?></td></tr>
    
    <?php if($row['f_resume']!="") {?>
    <tr><td><i id="detailbox-icon" class="fa fa-file"></i></td><td style="color:#1abc9c"><a href="resume/<?php echo $row['f_resume'];?>">Download Resume </a><i class="fa fa-download"></i></td></tr>
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
  <center class="detailbox-head" >Social Links</center>
<table>
<a id="det3btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
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
<tr><td><i id="detailbox-icon" class="fa fa-google-plus"></i></i></i></td><td><a target="blank" href="<?php echo $row["f_google"]?>" id="gpluscol">Connect <?php echo $name ?> on Google <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
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

<section class="fsec3">
<div class="status">
<table border="1" bordercolor="#fff" cellspacing="0">
<caption>Application Status</caption>
<tr> 
  <th>S No.</th>
  <th>Company Name</th>
  <th>Job Type</th>
  <th>Application Status</th>
</tr>

<?php
$count=1;
$sql2="SELECT * FROM shortlist WHERE f_id='$f_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$j_id=$row2['j_id'];
// if ($row2['app']==='1') {
      $sql3="SELECT * FROM jobs WHERE j_id='$j_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);


$r_id=$row3['r_id'];
      $sql4="SELECT * FROM recruiters WHERE r_id='$r_id'";    
      $result4=mysqli_query($conn,$sql4);
      $row4=mysqli_fetch_assoc($result4);

?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><a href="org.php?r_id=<?php echo $row4['r_id'];?>" style="text-transform: uppercase;text-decoration: underline;"><?php echo $row4['r_org'];?></a></td>
  <td><?php echo $row3['j_type']; ?></td>
  <td style="color: #009432;">shortlisted</td>
</tr>

<?php

}}
$sql2="SELECT * FROM apply WHERE f_id='$f_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$j_id=$row2['j_id'];
// if ($row2['app']==='1') {
      $sql3="SELECT * FROM jobs WHERE j_id='$j_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);


$r_id=$row3['r_id'];
      $sql4="SELECT * FROM recruiters WHERE r_id='$r_id'";    
      $result4=mysqli_query($conn,$sql4);
      $row4=mysqli_fetch_assoc($result4);

?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><a href="org.php?r_id=<?php echo $row4['r_id'];?>" style="text-transform: uppercase;text-decoration: underline;"><?php echo $row4['r_org'];?></a></td>
    <td><?php echo $row3['j_type']; ?></td>
<td style="color: #1abc9c">applied</td>
</tr>

<?php

// }
}}

$sql2="SELECT * FROM reject WHERE f_id='$f_id'";
$result2=mysqli_query($conn,$sql2);
if ($result2->num_rows > 0) {
while($row2 = $result2->fetch_assoc()) {

$j_id=$row2['j_id'];
// if ($row2['app']==='1') {
      $sql3="SELECT * FROM jobs WHERE j_id='$j_id'";    
      $result3=mysqli_query($conn,$sql3);
      $row3=mysqli_fetch_assoc($result3);


$r_id=$row3['r_id'];
      $sql4="SELECT * FROM recruiters WHERE r_id='$r_id'";    
      $result4=mysqli_query($conn,$sql4);
      $row4=mysqli_fetch_assoc($result4);

?>
<tr>
  <td><?php echo $count++; ?></td>
  <td><a href="org.php?r_id=<?php echo $row4['r_id'];?>" style="text-transform: uppercase;text-decoration: underline;"><?php echo $row4['r_org'];?></a></td>
  <td><?php echo $row3['j_type']; ?></td>
  <td style="color: red;">not selected</td>
</tr>

<?php

}}?>



</table>    
</div>
</section>

</body>
<script src="dash.js"></script>
</html>