<?php
session_start();
require_once("../../req/config.php");

$adminlogid=mysqli_real_escape_string($con,$_POST['adminlogid']);
$adminpassword=mysqli_real_escape_string($con,$_POST['adminpassword']);

if($adminlogid && $adminpassword )
{
	$logsql="select * from schadmin_tab where username='$adminlogid' ";
	$result=mysqli_query($con,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			
			$_SESSION['username']=$rows['username'];
			$_SESSION['password']=$rows['password'];
			$_SESSION['adminid']=$rows['adm_id'];
			$_SESSION['adminrole']=$rows['role'];
			$_SESSION['clientappid']=$rows['clientapp_id'];
			
if (password_verify($adminpassword,$_SESSION['password'])) {
			if($_SESSION['adminrole']=="Systemadmin"){$_SESSION['login']=true;}
					//echo "<span id='success'><b>Logged In</b></span>	";	
					echo 'valid';
					
					
				
} else {
					
					//echo "<span id='invalid'><b>Invalid Credientials Supplied, Please Check</b></span>	";
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