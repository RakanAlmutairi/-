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
<!doctype html>
<html>
<head>

<im>
<a><img src="images\Layer2.png" alt="بذرة خير" width="200" height="200"></a>
</im>
<a href="home1.php"><input type="submit" style="float:right" name="s"  value="الصفحة الرئيسية"></a>
<a href="log_out.php"><input type="submit" style="float:right" name="s"  value="Log out"></a>
<style>
.inp input:hover{box-shadow:0 0 20px 0 rgba(0,0,0,.07);background:#29C811 }
nav {
  float: left;
  width: 30%;
  height: 500px; 
 background-image: url(images/R1.jpg);
 background-repeat:no-repeat;
  border: 2px solid black;
  padding: 60px;
  border-radius:30px;
  
  position: absolute;
  right: 100px;
  bottom: 250px;
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
  input[type=text], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

  input[type=Password], select {
  width: 40%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;

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
.p2 {
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 30px;
}
.p3 {
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 25px;
text-shadow: 2px 2px green;
}

</style>

</head>
<body>
<div class="right">
<h1 style="color:green;"><span style="font-size:200%;"> فَمَن تَطَوَّعَ خَيْرًا<br> فَهُوَ خَيْرٌ لَّهُ -<span style="font-size:30%;"> سورة البقرة (184)</span></h1>
</div>
<nav>
						<form style="text-align:center">
					   	<label class="p3">Name:</label><br>
						<input type="text" name="Name" value="<?php echo $row['Name']; ?>">
						  <br><br>
						<label class="p3">ID Number:</label><br>
						<input type="text" name="ID" value="<?php echo $row['ID']; ?>" >
						  <br><br>
						<label class="p3">Phone Number:</label><br>
						<input type="text" name="Phone_Number" value="<?php echo $row['Phone_number']; ?>" >
						  <br><br>
						<label class="p3">Password:</label><br>
						<input type="text" name="Password" value="<?php echo $row['Pass']; ?>" >
					   </form>

</nav>


</body>
</html>
