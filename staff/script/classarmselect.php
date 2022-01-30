<?php
require_once('../../req/config.php');
session_start();
	$attclass=mysqli_real_escape_string($con,$_POST['attclass']);  
	//$clname=mysqli_real_escape_string($con,$_POST['clname']);  
	//$sid=4;
if($attclass)
{
 $xquery="select * from class_tab where class_id='$attclass'";
 $output=mysqli_query($con,$xquery);
 if(mysqli_num_rows($output))
   {
	   while($rows=mysqli_fetch_array($output))
		   {
			   $classarm=$rows['class_arm'];
			   
			   echo $classarm;
		   }
 }


}
?>