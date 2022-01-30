<?php
require_once('../../req/config.php');
session_start();
	$staffid=mysqli_real_escape_string($con,$_POST['staffname']);  
	//$sid=4;
 $xquery="select * from staff_tab where staff_id='$staffid'";
 $output=mysqli_query($con,$xquery);
 if(mysqli_num_rows($output))
   {
	   while($rows=mysqli_fetch_array($output))
		   {
			   $staffphone=$rows['staff_phone'];
			   
			   echo $staffphone;
		   }
 }
?>