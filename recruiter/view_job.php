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
    <span><a href="dashboard.php#job_status"><i class="fa fa-close"  style="float: right;font-size: 25px;color: white;"></i></a></span>
    <center class="capt"><caption class="capt">Hireling</caption></center>
    <table id="job_table">
    <img src="profile_pictures/logo.png" style="width: 95px;margin-top: 20px;margin-right: 5px;float: right;">
    <tr><td>Organisation</td><td> : </td><td> Google</td></tr>
    <tr><td>Location    </td><td> : </td><td> Work form home</td>
    <tr><td>Incentive   </td><td> : </td><td> Rs. 3000</td>
    <tr><td>Description </td><td> : </td><td> description</td>
    <tr><td>Time        </td><td> : </td><td> 1 month</td>
    </table>
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
  <th>View profile</th>
  <th>Reject</th>
</tr>

<tr>
  <td>1</td>
  <td>jerin</td>
  <td>jerinthomas17@gmail.com</td>
  <td>9990480663</td>
  <td><a href="view_profile.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
  <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
</tr>
<tr>
  <td>2</td>
  <td>new</td>
  <td>new@gmail.com</td>
  <td>123</td>
  <td><a href="view_profile.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
  <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
</tr>
<tr>
  <td>3</td>
  <td>abc</td>
  <td>abc@gmail.com</td>
  <td>123</td>
  <td><a href="view_profile.php"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
  <td><i class="fa fa-trash-o" aria-hidden="true"></i></td>
</tr>
</table>    
</div>
</section>

</body>
</html>