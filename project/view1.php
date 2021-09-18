<?php
require 'conn.php';
session_start();
if(!isset($_SESSION['ID']))
{
  header('location:Login.php');
}


$join_select = "select * from join_need ";
?>

<!DOCTYPE html>
<html>
<head>
<im>
<a><img src="images\Layer2.png" alt="بذرة خير" width="200" height="200"></a>
</im>
<div class="inp">
<a href="home1.php"><input type="button" style="float:right" name="s"  value="الصفحة الرئيسية"></a>

</div>
<style>
.inp input:hover{box-shadow:0 0 20px 0 rgba(0,0,0,.07);background:#29C811 }
nav {
  float: left;
  width: 30%;
  height: 300px; 
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
body {background-image: url(images/Landing.webp);
background-repeat:no-repeat;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 50%;
 font-size:130%;

}

td, th {
  border: 1px solid black;
  text-align: left;
  padding: 8px;
  border-collapse: collapse;
}


tr:nth-child(even) {
  background-color: MediumSeaGreen;

}
tr:nth-child(odd) {
  background-color: white;
}
input[type=button]{
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
<input type="button" onclick="myfunction()" style="float:right" name="print"  value="print">
<script>
function myfunction(){
	window.print();
}

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<table align="right";>
  <tr style="background-color:LightGray;">
    <th>رقم التسجيل</th>
    <th>الاسم</th>
    <th>رقم الهوية</th>
    <th>رقم الجوال</th>
	<th>رقم الطلب</th>
  </tr>
<?php

$result = $con->query($join_select);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) { ?>

<tr>
        <td> <?php echo $row['join_need']; ?> </td> 
        <td> <?php echo $row['Name']; ?> </td>
        <td> <?php echo $row['ID']; ?> </td>
        <td> <?php echo $row['phone_number']; ?> </td> 
		<td> <?php echo $row['num_need']; ?> </td> 
        
      </tr>
<?php } ?>

<?php } ?>

</table>



</body>
</html>