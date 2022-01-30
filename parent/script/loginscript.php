<?php
session_start();
require_once("../../req/config.php");

$parentlogid=mysqli_real_escape_string($con,$_POST['parentlogid']);
$parentpass=mysqli_real_escape_string($con,$_POST['parentpass']);

if($parentlogid && $parentpass )
{
	$logsql="select parent_login.*,student_tab.* from parent_login inner join student_tab on parent_login.parent_phone=student_tab.parent_phone where parent_login.parent_username='$parentlogid'";
	$result=mysqli_query($con,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			
			$_SESSION['parentusername']=$rows['parent_username'];
			$_SESSION['parentpassword']=$rows['parent_password'];
			$_SESSION['parentphone']=$rows['parent_phone'];	
			$_SESSION['parentname']=$rows['parent_name'];
			$_SESSION['parentoname']=$rows['parent_oname'];
			$_SESSION['pemail']=$rows['pemail'];			
			$_SESSION['parentid']=$rows['parent_id'];
			$_SESSION['clientappid']=$rows['clientapp_id'];
			$_SESSION['parentname']=$_SESSION['parentname']." ".$_SESSION['parentoname'];
			//echo $_SESSION['parentpassword'];
			
if (password_verify($parentpass,$_SESSION['parentpassword'])) {
			//if($_SESSION['staffid']){$_SESSION['login']=true;}
					echo 'valid';
					
					
				
} else {
					
					echo 'notvalid';
					
					
}
			
			
		}
	}
	else 
			{					
				echo 'itsnotvalid';				
			}
	
}

?>