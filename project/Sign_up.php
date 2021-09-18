<!doctype html>
<php>
<head>


<im>
<a><img src="images\Layer2.png" alt="بذرة خير" width="200" height="200"></a>
</im>
<div class="inp">
<a href="home1.php"><input type="submit" style="float:right" name="s"  value="الصفحة الرئيسية"></a>
</div>
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
nn{
	  content: '* '; color: #F00; font-weight: 'bold';
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="right">
<h1 style="color:green;"><span style="font-size:200%;"> فَمَن تَطَوَّعَ خَيْرًا<br> فَهُوَ خَيْرٌ لَّهُ -<span style="font-size:30%;"> سورة البقرة (184)</span></h1>
</div>
<nav>

<form action="Sign_up.php" method="post" style="text-align:center">
<h1 style="color:green" class="p2" >تسجيل</h1>

 <label for="Name" class="p3" >Name:</label><br>
  <input type="text" id="Name" name="Name" maxlength="50" size="20" style="text-align:center" placeholder="الاسم">
    <nn> *</nn>
  <br><br>

 <label for="ID Number" class="p3">ID Number:</label><br>
  <input type="text" id="Number" name="ID" maxlength="10" size="10" style="text-align:center" placeholder="الهوية" >
    <nn> *</nn>
  <br><br>


 <label for="Phone Number" class="p3">Phone Number:</label><br>
  <input type="text" id="number" name="Phone_Number" value="05" maxlength="10" size="10" style="text-align:center" >
  <nn> *</nn>
  <br><br>



 <label for="Password" class="p3">Password:</label><br>
  <input type="Password" id="text" name="Password" style="text-align:center" placeholder="***********">
    <nn> *</nn>
  <br><br>

<div class="inp">
<input type="submit"  name="sub"  value="تسجيل">
</div>

</form>
</nav>
<?php 
require 'conn.php';

	if(isset($_POST['sub'])){
	$Name = $_POST['Name'];
	$ID = $_POST['ID'];
	$Phone_Number = $_POST['Phone_Number'];
	$Password = $_POST['Password'];
	
	$sql = mysqli_query($con,"SELECT ID FROM users WHERE ID = '$ID'");

        if(mysqli_num_rows($sql)>0){
			
	echo '<script>swal("رقم الهوية مسجل مسبقا")</script>';
}else{

	    if (!empty ($Name)&&($ID)&&($Phone_Number)&&($Password)){ 
		
	$qu = "insert into users (Name,ID,Phone_number,Pass) value ('$Name','$ID','$Phone_Number','$Password')";

	if(mysqli_query($con,$qu)){
		header('REFRESH:2,URL=home1.php');
		
		echo '<a href="home1.php"><script>swal("تم تسجيل بنجاح")</script></a>';

	}

		}
		else{
			echo '<script>swal("اكمل بيانات")</script>';
		}
 }
	}	



 ?>


</body>
</php>