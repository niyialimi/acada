<?php
session_start();
require_once("../../req/config.php");

$stdlogid=mysqli_real_escape_string($con,$_POST['stdlogid']);
$stdpassword=mysqli_real_escape_string($con,$_POST['stdpassword']);

if($stdlogid && $stdpassword )
{
	$logsql="select * from student_tab where rollnum='$stdlogid'";
	$result=mysqli_query($con,$logsql);
	if (mysqli_num_rows($result))
	{
		while($rows=mysqli_fetch_assoc($result))
		{
			
			$_SESSION['stdpassword']=$rows['std_password'];
			$_SESSION['stdnumber']=$rows['rollnum'];
			$_SESSION['parentphone']=$rows['parent_phone'];	
			$_SESSION['parentname']=$rows['parent_name'];
			$_SESSION['parentoname']=$rows['parent_oname'];
			$_SESSION['pemail']=$rows['pemail'];	
			$_SESSION['clientappid']=$rows['clientapp_id'];
			$_SESSION['fname']=$rows['fname'];
			$_SESSION['lname']=$rows['lname'];
			$_SESSION['oname']=$rows['oname'];
			$_SESSION['pics']=$rows['pics'];
			//echo $_SESSION['stdpassword']." ".$stdpassword;
			
if (password_verify($stdpassword,$_SESSION['stdpassword'])) {
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