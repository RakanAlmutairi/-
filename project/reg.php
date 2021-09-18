<?php
require 'conn.php';
session_start();
if(!isset($_SESSION['ID']))
{
  header('location:Login.php');
}



if(isset($_GET["work"]) && !empty(trim($_GET["work"]))){
	


    require_once 'conn.php';

	$id = $_SESSION['ID'];
	$sql_user="select * from users where ID = $id ";
	$res_user =mysqli_query($con,$sql_user);
	$row_user =mysqli_fetch_array($res_user);
	
	$Name=$row_user['Name'];
	$phone=$row_user['Phone_number'];
    $work_data ="SELECT * FROM job_type WHERE work_num = ? ";

    if($stmt = mysqli_prepare($con,$work_data)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["work"]);


        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $job_des  = $row['job_des'];
            $place = $row['place'];
            $date  = $row['date'];
			$time = $row['time'];
			$num_people = $row['num_people'];
			$num = $num_people -1;
			

			if($num >=0){
				
			$n_database ="select * from join_work where ID = $id ";
            $res_ndata =mysqli_query($con,$n_database);
			$count_data = mysqli_num_rows($res_ndata);
			
			if($count_data > 0){
				
			echo "<script>swal('تم التسجيل مسبقا')</script>";

				header('location:Volunteer.php');
			}else{

				$join_ins="insert into join_work (Name,ID,phone_number,work_id) values('$Name',$id,$phone,$param_id)";
				$res_join =mysqli_query($con,$join_ins);
				if($res_join){
				
				$up = "UPDATE job_type SET num_people = $num   WHERE work_num= $param_id  ";
				$res_up =mysqli_query($con,$up);
				
				echo "<script>swal('تم التسجيل')</script>";
				
				header('location:Volunteer.php');
				}else{
				echo "<script>swal('لم يتم التسجيل')</script>";
				
			}
			}header('location:Volunteer.php');
        }else {
			echo "<script>swal('تسجيل مكتمل')</script>";
			header('location:Volunteer.php');
		}
        }else {
			
            echo "There Is SomeThing Wrong ! ";
            echo "Something's wrong with the query: " . mysqli_error($con);
        }
		
			}else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_stmt_close($stmt);


}		

}

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>