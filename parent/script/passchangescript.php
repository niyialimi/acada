<?php
require_once('../../req/config.php');
session_start();
$parentid=$_SESSION['parentid'];
$parentpass=mysqli_real_escape_string($con,$_POST['oldpwd']);
if( isset ($parentid))
{
	//echo $parentid;
	$pselect="select parent_id,parent_password from parent_login where parent_id='$parentid' and clientapp_id='".$_SESSION['clientappid']."'"; 
	$output=mysqli_query($con,$pselect);
	if(mysqli_num_rows($output))
	{
		while($rows=mysqli_fetch_array($output))
		{
		$oldpwd=$rows['parent_password'];
			if (password_verify($parentpass,$oldpwd)) {
				$newpwd=mysqli_real_escape_string($con,$_POST['newpwd']);
				//echo $newpwd;
				$newpwd=password_hash($newpwd,PASSWORD_BCRYPT);
				$update="update parent_login set parent_password='$newpwd' where parent_id='$parentid' and parent_password='$oldpwd' and clientapp_id='".$_SESSION['clientappid']."'";
				$result=mysqli_query($con,$update);
					if($result)
					{	
						echo 'Password Changed';
						
					
					}else {
						echo 'Error Changing Password';//die (mysqli_error($con));
					}
					
			}
			else {echo 'Wrong Old Password Entered';}
			
		}
	}
}
?>