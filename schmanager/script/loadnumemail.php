<?php
require_once('../../req/config.php');
session_start();
if (isset($_POST["receiver"]))
 {
	if($_POST["receiver"]=='parent')
	{
	 $numquery="select  parent_phone from student_tab where clientapp_id='".$_SESSION['clientappid']."' ";
		 $result=mysqli_query($con,$numquery);
		 while($rows=mysqli_fetch_array($result))
		 {
			 $num=$rows['parent_phone'];
			 echo $num.',';
		 }
		 
	}else if($_POST["receiver"]=='staff')
	{
		$numquery="select  staff_phone from staff_tab where clientapp_id='".$_SESSION['clientappid']."' ";
		 $result=mysqli_query($con,$numquery);
		 while($rows=mysqli_fetch_array($result))
		 {
			 $num=$rows['staff_phone'];
			 echo $num.',';
		 }
	}
		// $array=mysqli_fetch_row($result);
		// echo json_encode($array);
	 
	 //$output.='here';
	 //echo $output;
 }
?>