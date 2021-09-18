<?php
require 'conn.php';
session_start();
if(!isset($_SESSION['ID']))
{
  header('location:Login.php');
}
else {
	if(isset($_SESSION['ID'])){
		$id=$_SESSION['ID'];
		$sql = "SELECT * FROM users WHERE ID='$id'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>
	


<!DOCTYPE html>
<html>
<head>
<im>
<a><img src="images\Layer2.png" alt="بذرة خير" width="200" height="200"></a>
</im>
<div class="inp">
<a href="log_out.php"><input type="submit" style="float:right" name="s"  value="Log out"></a>
<a href="user.php"><input type="submit" style="float:right" name="s"  value=" اهل بك ( <?php echo $row['ID']; ?> )"></a>
</div>

<style>
.inp input:hover{box-shadow:0 0 20px 0 rgba(0,0,0,.07);background:#29C811 }
input[type=submit] {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  border-radius:10px;
font-family: "Lucida Console", "Courier New", monospace;
}

nav {
  float: left;
  width: 30%;
  height: 300px; 

 background-repeat:no-repeat;
  border: 2px solid black;
  padding: 60px;
  border-radius:30px;
  
  position: absolute;
  right: 100px;
  bottom: 350px;
}
im {
  position: absolute;
  right: 900px;
  bottom: 700px;
}
body {background-image: url(images/Landing.webp);
background-repeat:no-repeat;
}

.right {
  position: absolute;
  right: 20px;
  bottom: 50px;
  }
  pp{
  text-align:center;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 20px;
text-shadow: 2px 2px green;
  }

</style>
</head>
<body>


<div class="right">
<h1 style="color:green";><span style="font-size:200%";> فَمَن تَطَوَّعَ خَيْرًا<br> فَهُوَ خَيْرٌ لَّهُ -<span style="font-size:30%;"> سورة البقرة (184)</span></h1>
</div>
<nav>

<br>
<pp>
<div class="inp">

</div>
<br> 
<br>
<div class="inp">
<a href="Volunteer.php"><input type="submit" name="sub2" value="تسجيل دخول"></a>
</div>
<br><br>
<div class="inp">
<a href="Needs.php"><input type="submit" name="sub3" value="طلب بطاقة"></a>
</div>
</pp>
</nav>
</body>
</html>
