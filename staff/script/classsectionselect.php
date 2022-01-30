<?php
require_once('../../req/config.php');
session_start();
	$clname=mysqli_real_escape_string($con,$_POST['clname']);  
	
if($clname)
{
 $xquery="select * from class_tab where class_id='$clname'";
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