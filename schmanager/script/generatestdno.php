<?php 
session_start();
require_once("../../req/config.php");
		 $numquery="select MAX(student_id) as count from student_tab";
		 $result=mysqli_query($con,$numquery);
		 $array=mysqli_fetch_row($result);
		 //if (mysqli_num_rows($result))
			//{
				//while($rows=mysqli_fetch_assoc($result))
				//{
					echo json_encode($array);
					//$count=$rows['count'];
					 //$count=mysqli_num_rows($result);
					 //echo $count;
					/* if($count==0)
					 { $count='000'.($count+1);
			
					 }else if($count>=10)
					 {
						 $count='00'.($count+1);
					 }else if($count>=100)
					 {
						 $count='0'.($count+1);
					 }else
					 {
						 $count=($count+1);
					 }*/
				//}
			//}
		 ?>