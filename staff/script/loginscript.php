<?php
session_start();
require_once("../../req/config.php");

$stafflogid=mysqli_real_escape_string($con,$_POST['stafflogid']);
$staffpass=mysqli_real_escape_string($con,$_POST['staffpass']);
//$stafflogid='boluwaji';
//$staffpass='boluwaji';

if($stafflogid && $staffpass )
{
	$logsql="select staff_tab.*,staff_login.* from staff_tab inner join staff_login on staff_tab.staff_id=staff_login.staff_id where staff_username='$stafflogid'";
	$result=mysqli_query($con,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			
			$_SESSION['staffusername']=$rows['staff_username'];
			$_SESSION['staffpassword']=$rows['staff_password'];
			$_SESSION['stafflname']=$rows['staff_lname'];
			$_SESSION['stafffname']=$rows['staff_fname'];
			$_SESSION['staffpics']=$rows['staff_pics'];
			$_SESSION['staffnum']=$rows['staff_num'];
			$_SESSION['stafftype']=$rows['staff_type'];
			$_SESSION['staffid']=$rows['staff_id'];
			$_SESSION['clientappid']=$rows['clientapp_id'];
			
			
if (password_verify($staffpass,$_SESSION['staffpassword'])) {
			//if($_SESSION['staffid']){$_SESSION['login']=true;}
					echo 'valid';
					
					
				
} else {
					
					echo 'notvalid';
					
					
}
			
			
		}
	}
	else 
			{					
				echo 'notvalid';				
			}
	
}

?>