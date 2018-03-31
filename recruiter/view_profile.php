<!DOCTYPE html>
<html>
<head>
  <title>Dashboard | Hireling</title>
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
<b style="position: absolute;top:65px;left:10px;font-size: 60%;"><a class="editbio" href="view_job.php">Back <i class="fa fa-reply" aria-hidden="true"></i></a></b>

<section class="fsec1">
    
<div class="imgbox">
    <a id="picturebtn"><img src="profile_pictures/jerin.jpg"></a>
    <center id="imgspan">Click on the profile picture to edit</center>
</div>
 </div>
<div class="biobox" id="biobtn">
    <h2>Name name</h2>
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    <b><a id="biobtn" class="editbio">Edit bio</a></b>
<span id="biospan">Click anywhere on the bio to edit</span>
</div>
</section>

<section class="fsec2">

<div class="detailbox">
  <center class="detailbox-head" id="det1btn">Basic</center>
<table>
<a id="det1btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
    <tr><td><i id="detailbox-icon" class="fa fa-user"></i></td><td>Jerin Thomas</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-envelope"></i></td><td>jerinthomas17@gmail.com</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td>9990480663</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-neuter"></i></td><td>Male</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-birthday-cake"></i></td><td>22</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-map-marker"></i></td><td>Delhi</td></tr>
</table>
<a id="passwordbtn" class="passwordbtn" style="margin-right: 20px;margin-top:-20px;margin-bottom: 20px;float: right;">Change password <i class="fa fa-lock"></i></a>
</div>

<div class="detailbox" id="det2btn">
  <center class="detailbox-head">Personal Details</center>
<table>
<a id="det2btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
    <tr><td><i id="detailbox-icon" class="fa fa-graduation-cap"></i></td><td>Jamia Hamdard</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td>Student</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-suitcase"></i></td><td><a target="blank" href="">Project link availabe <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-file"></i></td><td>Resume not availabe</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-superpowers"></i></td><td>web development, c++, java</td></tr>
</table>
</div>

<div class="detailbox" id="det3btn">
  <center class="detailbox-head">Social Links</center>
<table>
<a id="det3btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
    <tr><td><i id="detailbox-icon" class="fa fa-linkedin"></i></td><td><a target="blank" href="" id="linkcol">Connect jerin on LinkedIn <i class="fa fa-external-link" style="font-size: 12px;"></i></a></td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-github"></i></td><td id="gitcol">Github link not available</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-facebook"></i></td><td id="facecol">Facebook link not available</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-google-plus"></i></td><td id="gplus">Google Plus link not available</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-instagram"></i></td><td id="instacol">Instagram link not available</td></tr>
</table>
</div>
</section>


  <!-- <hr size="1" color="#1abc9c" width="60%" style="background: url(css/background/back6.png));"> -->
</body>
<script src="dash.js"></script>
</html>