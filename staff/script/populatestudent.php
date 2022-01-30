<?php
require_once('../../req/config.php');
session_start();
$stdselectclass=mysqli_real_escape_string($con,$_POST['stdselectclass']); 
if($stdselectclass)
{
	$logsql="select * from class_tab where class_id='$stdselectclass' and clientapp_id='".$_SESSION['clientappid']."'";
	$result=mysqli_query($con,$logsql);
	while($rows=mysqli_fetch_array($result))
		 {
									  
									   $_SESSION['classname']=$rows['class_name'];
									   $_SESSION['classarm']=$rows['class_arm'];

							 $xquery="select * from student_tab where current_class='".$_SESSION['classname']."' and current_arm='".$_SESSION['classarm']."'";
							 $output=mysqli_query($con,$xquery);
							  if(mysqli_num_rows($output))
							   {
								   echo "<option>Select</option>";
								   while($rows=mysqli_fetch_array($output))
								   {
									   $_SESSION['sid']=$rows['student_id'];
									   $_SESSION['stdlname']=$rows['lname'];
									   $_SESSION['stdfname']=$rows['fname'];
									   $_SESSION['parentphone']=$rows['parent_phone'];
					
   										  echo '<option value="'.$_SESSION['sid'].'">'.$_SESSION['stdlname']." ".$_SESSION['stdfname'].'</option>';
   	                      
                         
							   }
						   }
						   else'';
		 }
}
?>