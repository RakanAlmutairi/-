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
<a href="home1.php"><input type="submit" style="float:right" name="s"  value="الصفحة الرئيسية"></a>
<a href="log_out.php"><input type="submit" style="float:right" name="s1"  value="Log out"></a>
<a href="user.php"><input type="submit" style="float:right" name="s"  value=" اهل بك ( <?php echo $row['ID']; ?> )"></a>
</div>
<style>
.inp input:hover{box-shadow:0 0 20px 0 rgba(0,0,0,.07);background:#29C811 }
nav {
  float: left;
  width: 30%;
  height: 350px; 
 background-image: url(images/R1.jpg);
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

  input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
.p2 {
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 30px;
}
.p3 {
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 25px;
text-shadow: 2px 2px green;
}

body {background-image: url(images/Landing.webp);

background-repeat:no-repeat;
}
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


</style>
</head>

<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<nav>
<form action="Needs.php" method="post" style="text-align:center">
<h1 style="color:green" class="p2">المحتاج</h1>

 <label  for="Place" class="p3">Place:</label><br>

  <input  type="text" id="Place" name="Place" maxlength="50" size="20" style="text-align:center" placeholder="الموقع" >

  <br><br><br><br>
  <label  for="Needs" class="p3">Needs:</label><br>

  <textarea id="Needs" name="Needs" rows="5" cols="50" style="text-align:center" placeholder="وصف الاحتياج"></textarea>


  <br><br>


<div class="inp">
<input type="submit" name="submit" value="طلب">
</div>

</form>
</nav>
<?php 
require 'conn.php';

if(isset($_POST['submit'])){
	$Place = $_POST['Place'];
	$Needs = $_POST['Needs'];

	    if (!empty ($Place)&&($Needs)){ 
		
	$qu = "insert into need (place,type_need) value ('$Place','$Needs')";

	if(mysqli_query($con,$qu)){
		echo '<script>swal("تم ارسال طلبك")</script>';
	}

		}
				else{
			echo '<script>swal("اكمل بيانات")</script>';
		}
}
 ?>
</body>

</html>


