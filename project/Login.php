<?php
session_start();

if( isset( $_SESSION['ID'])){
header("Location: home1.php");
}

?>
<!--log in page-->
<!DOCTYPE html>
<php>

<head>
<im>
<a><img src="images\Layer2.png" alt="بذرة خير" width="200" height="200"></a>
</im>
<style>
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

.inp input:hover{box-shadow:0 0 20px 0 rgba(0,0,0,.07);background:#29C811 }
nn{
	  content: '* '; color: #F00; font-weight: 'bold';
}
nav {
  float: left;
  width: 30%;
  height: 350px; 

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
  bottom:  10px;
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


<form action="Login.php"  method='POST' style="text-align:center" autocomplete="off">
<h1 style="color:green" class="p2">تسجيل دخول</h1>


 <label for="ID Number" class="p3">USER:</label><br>
  <input type="text" id="Number" name="ID" maxlength="10" size="10" placeholder="" style="text-align:center">
  <nn> *</nn>
  <br><br>


 <label for="Password" class="p3" >Password:</label><br>
  <input type="Password" id="text" placeholder="" name="Password" style="text-align:center">
  <nn> *</nn>
  <br><br>


<div class="inp">

<input type="submit" name="login" value="تسجيل الدخول">
</div>


</form>
</nav>
<?php

	

	if($_SERVER["REQUEST_METHOD"] == 'POST'){

		$ID = $_POST['ID'];
		$password = $_POST['Password'];

   
   
 

   $conn = new mysqli("localhost" , "root", "", "project");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



		$userInfo = $conn->query('select ID ,Pass from users where ID = \''.$ID.'\'');
		if($userInfo->num_rows > 0){
			$userInfo = $userInfo->fetch_assoc();
			if($userInfo['Pass'] == $password){

				$_SESSION['ID'] = $userInfo['ID'];

				header('REFRESH:2,URL=home1.php');
				echo '<script>swal("اهلا بك")</script>';
			}else{
				echo '<script>swal("!رقم السري خطا")</script>';
			}

		}else{
			echo '<script>swal("! رقم الهوية خطا")</script>';
		}

	}
	
	?>
</body>
</php>