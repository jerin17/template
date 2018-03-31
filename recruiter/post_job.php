<!DOCTYPE html>
<html>
<head>
  <title>Post Job | Hireling</title>
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

<section class="psec1" style="min-height: 100vh;">
<div id="post_job">
  <center style="font-weight: bolder;font-size: 120%;">POST JOB</center>
  <form action="r_post.php" method="POST">
  <input type="hidden" name="r_id" value="<?php echo $_SESSION['r_id'];?>">
  
  <label>JOB TYPE :</label><br>
  <input type="text" name="j_type" placeholder="eg : IT / web design/ andorid app / graphic design" required>
  <br><label>DESCRIPTION :</label><br>
  <input type="text" name="j_description" placeholder="a brief description about the expected work" required>
  <br><label>SALARY :</label><br>
  <input type="text" name="j_sal" placeholder="sptipend /certificate / or any other incentives" required>
  <br><label>LOCATION :</label><br>
  <input type="text" name="j_location" placeholder="work form home / any other location" required>
  <br><label>TIME :</label><br>
  <input type="text" name="j_time" placeholder="in months" required>

  <br><br><input type="submit" name="submit" value="POST"><br>

</form>

</div>
</section>
</body>
</html>