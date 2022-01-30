<?php
require_once('../../req/config.php');
session_start();
$staffid=mysqli_real_escape_string($con,$_POST['staffname']);
$staffuname=mysqli_real_escape_string($con,$_POST['staffuname']);
$staffpass=mysqli_real_escape_string($con,$_POST['staffpass']);
$staffpass=password_hash($staffpass,PASSWORD_BCRYPT);
$clientid=$_SESSION['clientappid'];

$logsql="select staff_id from staff_login where staff_id='$staffid' ";
$result=mysqli_query($con,$logsql);
if (mysqli_num_rows($result)>0)
{
	$response['status'] = 'error';  
	$response['message'] = 'Staff Already Assigned Login';  
	header('Content-type: application/json'); 							
	echo json_encode($response);
}else
{
$sql="INSERT INTO staff_login (clientapp_id,staff_id,staff_username,staff_password) VALUES ('$clientid','$staffid','$staffuname','$staffpass')";
		// OREDER BY id DESC is order result by descending
			if(mysqli_query($con,$sql))
						{
							
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'Login Created Succesfully';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Creating Login, Please try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
								 die(mysqli_error($con));
						}
}
?>