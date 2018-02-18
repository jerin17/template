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
      <form action="#" method="post" enctype="multipart/form-data">
        <a href=""><img src="../css/images/x.png" class="xpng"></a>
        <div class="pictureimg">
        <img src="profile_pictures/jerin.jpg" id="pictureimg">
        </div>
        <label>Update picture :</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
        <input type="file" name="image" required /><br>
        <input type="submit" value="Update">
      </form>
</div>
</div>

<div id="biomodal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Biography</h1>
  <form action="#">
    <textarea name="" cols="60" rows="100" required>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
    <input type="submit" value="Update">    
  </form>
</div>
</div>

<div id="det1modal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Basic Information</h1>
  <form action="#">
    <label>Name</label>
    <input type="text" name="f_name" value="jerin" required>
    <label>Email ID</label>
    <input type="email" name="f_email" required>
    <label>Contact No.</label>
    <input type="number" name="f_phone" required>
    <label>Gender</label>
    <input type="text" name="f_gender" required>
    <label>Age</label>
    <input type="number" name="f_age" required>
    <label>City</label>
    <input type="text" name="f_city" required>
    <input type="submit" value="Update">
  </form>
</div>
</div>

<div id="det2modal" class="dashmodal">
<div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Personal Details</h1>
    <form action="#" method="post" enctype="multipart/form-data">
    <label>School/College/Company</label>
    <input type="text" name="f_firm" required>
    <label>Work Profile</label>
    <input type="text" name="f_work" required>
    <label>Project Link</label>
    <input type="text" name="f_project" required>
    <label>Skill</label>
    <textarea name="" id="skills" cols="30" rows="10"></textarea>
    <label>Attach Resume</label>
    <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
    <input type="file" name="file" required /><br>
    <input type="submit" value="Update">
  </form>
</div>
</div>




<div id="det3modal" class="dashmodal">
  <div class="dashbox">
  <a href=""><i class="fa fa-close" id="closebtn" style="font-size: 22px;"></i></a>
  <img src="../css/images/logo.png" class="dashlogo"> 
  <h1>Edit Social Links</h1>
  <form action="#">
    <b class="fa fa-linkedin" id="linkcol"></b><label> LinkedIn</label>
    <input type="text" name="f_linkedin">
    <b class="fa fa-github" id="gitcol"></b><label> Github</label>
    <input type="text" name="f_github" >
    <b class="fa fa-facebook" id="facecol"></b><label> Facebook</label>
    <input type="text" name="f_facebook" >
    <b class="fa fa-instagram" id="instacol"></b><label> Instagram</label>
    <input type="text" name="f_instagram">
    <input type="submit" value="Update">
    
  </form>
</div>
</div>


<div id="header">
  <a href="../index.php"><img src="../css/images/logo.png"></a>
    <h1><a href="../home.php">Hireling</a></h1>
    <div id="navbar">
      <ul>
        <li><a href="../home.php">Home</a></li>         
        <li><a href="#jobs">Jobs</a></li>         
        <button class="button" style="background:#e74c3c;"><a href="../logout.php" style="color:white;text-decoration:none;">LOGOUT</a></button>
    </ul>
   </div> 
</div>
</div>

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

<div class="detailbox" id="det1btn">
  <center class="detailbox-head">Basic</center>
<table>
<a id="det1btn" class="editbtn"><i class="fa fa-pencil-square-o"></i></a>
    <tr><td><i id="detailbox-icon" class="fa fa-user"></i></td><td>Jerin Thomas</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-envelope"></i></td><td>jerinthomas17@gmail.com</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-phone"></i></td><td>9990480663</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-neuter"></i></td><td>Male</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-birthday-cake"></i></td><td>22</td></tr>
    <tr><td><i id="detailbox-icon" class="fa fa-map-marker"></i></td><td>Delhi</td></tr>
</table>
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
    <tr><td><i id="detailbox-icon" class="fa fa-instagram"></i></td><td id="instacol">Instagram link not available</td></tr>
</table>
</div>
</section>


  <!-- <hr size="1" color="#1abc9c" width="60%" style="background: url(css/background/back6.png));"> -->
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

<tr>
  <td>1</td>
  <td><a href="#">Google</a></td>
  <td>Web Development</td>
  <td>applied</td>
</tr>
<tr>
  <td>1</td>
  <td><a href="#">Google</a></td>
  <td>Web Development</td>
  <td>applied</td>
</tr>
<tr>
  <td>1</td>
  <td><a href="#">Google</a></td>
  <td>Web Development</td>
  <td>applied</td>
</tr>
</table>    
</div>
</section>

</body>
<script src="dash.js"></script>
</html>