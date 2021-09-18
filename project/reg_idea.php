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
  height: 580px; 
 background-image: url(images/R1.jpg);
 background-repeat:no-repeat;
  border: 2px solid black;
  padding: 60px;
  border-radius:30px;
  
  position: absolute;
  right: 100px;
  bottom: 150px;
}
im {
  position: absolute;
  right: 900px;
  bottom: 700px;
}
body {background-image: url(images/Landing.webp);
background-repeat:no-repeat;
}
h1{
color:green;
text-align: center;
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 25px;
}
  input[type=Time], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;

}
  input[type=text], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
  input[type=date], select {
  width: 30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
  input[type=number], select {
  width: 30%;
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

.p3 {
  font-family: "Lucida Console", "Courier New", monospace;
  font-size: 25px;
text-shadow: 2px 2px green;
}

</style>
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<nav>
<h1 class="h1">صاحب الفكرة</h1>
<form action="reg_idea.php" method="post" style="text-align:center">

<label  for="jobDes" class="p3">Job description:</label><br>
  <input  type="text" id="jobDes" name="jobDes" maxlength="50" size="20" style="text-align:center" placeholder="وصف العمل" >
  <br><br>
  
 <label  for="Place" class="p3">Place:</label><br>
  <input  type="text" id="Place" name="Place" maxlength="50" size="20" style="text-align:center" placeholder="المكان" >
  <br><br>

 <label for="Date" class="p3">Date:</label><br>
  <input type="date" id="Number" name="date" maxlength="10" size="10"  placeholder="التاريخ"  min="2021-04-02" >
  <br><br>


 <label for="Time" class="p3">Time:</label><br>
  <input type="Time" id="number" name="time" maxlength="10" size="10"  placeholder="الوقت">
  <br><br>



 <label for="number_of_people" class="p3">number of people:</label><br>
  <input type="text" id="number_of_people" name="number_of_people" placeholder="عدد الاشخاص">
  <br><br>

<div class="inp">
<input type="submit" name="sub1" value="ارسال">
</div>
</form>
</nav>
<?php 
require 'conn.php';

if(isset($_POST['sub1'])){
	$jobDes = $_POST['jobDes'];
	$Place = $_POST['Place'];
	$date = $_POST['date'];
	$time = $_POST['time'];
	$number_of_people = $_POST['number_of_people'];

	    if (!empty ($jobDes)&&($Place)&&($date)&&($time)&&($number_of_people)){ 
		
	$qu = "insert into job_type (job_des,place,date,time,num_people) value ('$jobDes','$Place','$date','$time','$number_of_people')";

	if(mysqli_query($con,$qu)){
		echo '<script>swal("تم ارسال طلبك")</script>'; 
	}

		}else{
			echo '<script>swal("اكمل بيانات")</script>'; 
		}
}

 ?>

</body>
</html>

