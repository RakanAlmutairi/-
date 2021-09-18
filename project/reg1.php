<?php
require 'conn.php';
session_start();
if(!isset($_SESSION['ID']))
{
  header('location:Login.php');
}



if(isset($_GET["work1"]) && !empty(trim($_GET["work1"]))){
	


    require_once 'conn.php';
	$id=$_SESSION['ID'];
	$sql_user="select * from users where ID=$id";
	$res_user =mysqli_query($con,$sql_user);
	$row_user =mysqli_fetch_array($res_user);
	$Name=$row_user['Name'];
	$phone=$row_user['Phone_number'];
    $work_data ="SELECT * FROM need WHERE num_need = ? ";

    if($stmt = mysqli_prepare($con,$work_data)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_GET["work1"]);


        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $place = $row['place'];
			$type_need = $row['type_need'];

			
			$up = "delete from need  WHERE num_need= $param_id  ";
			$res_up =mysqli_query($con,$up);
			if($res_up){
				$join_ins="insert into join_need (Name,ID,phone_number,num_need) values('$Name',$id,$phone,$param_id)";
				$res_join =mysqli_query($con,$join_ins);
				echo "تم تسجيل";
				header('location:Volunteer.php');
			}else{
				echo "لم يتم تسجيل ";
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