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
<a href="home1.php"><input type="button" style="float:right" name="s"  value="الصفحة الرئيسية"></a>
<a href="log_out.php"><input type="button" style="float:right" name="s1"  value="Log out"></a>
<a href="user.php"><input type="button" style="float:right" name="s"  value=" اهل بك ( <?php echo $row['ID']; ?> )"></a>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<table action="Volunteer.php" method='POST' align="right";>
  <tr style="background-color:LightGray;">
    <th >اسم الموظف</th>
    <th>رقم الهوية</th>
    <th>القسم</th>
    <th>تاريخ الميلاد</th>
    <th>فصيلة الدم</th>
    <th></th>
  </tr>
<?php

$sql ="SELECT * FROM job_type ";
$result = $con->query($sql);
if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) { ?>
<tr>
        <td><?php echo $row['work_num'];?></td> 
        <td><?php echo $row['job_des'];?></td>
        <td><?php echo $row['place'];?></td>
        <td><?php echo $row['date'];?></td> 
        <td><?php echo $row['time'];?></td>

        <td><a href="reg.php?work=<?php echo $row['work_num']; ?> " ><button >طباعة</button></a> <a href="view.php?work1=<?php echo $row['work_num']; ?>" ><button >رفض</button></a></td>
      </tr>
<?php } ?>

<?php } ?>

</table>



<br><br><br><br><br><br><br><br><br><br><br><br><br><br>



</body>
</html>