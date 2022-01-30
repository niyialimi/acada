<?php 
session_start();
require_once("../../req/config.php");
		 $numquery="select MAX(staff_id) as count from staff_tab";
		 $result=mysqli_query($con,$numquery);
		 $array=mysqli_fetch_row($result);
		 
					echo json_encode($array);
					
		 ?>