<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$payname=ucfirst(mysqli_real_escape_string($con,$_POST['payname']));
$payclass=ucfirst(mysqli_real_escape_string($con,$_POST['payclass']));
$payamount=ucfirst(mysqli_real_escape_string($con,$_POST['payamount']));
$paydesc=mysqli_real_escape_string($con,$_POST['paydesc']);
$status=true;
$date=date('Y-m-d');


if($_POST['payname']!='' || $_POST['payclass']!='')
{


$payinsert="INSERT INTO setpayment (clientapp_id,pay_name,pay_class,pay_amount,pay_desc,status,payadd_date) VALUES('$clientid','$payname','$payclass','$payamount','$paydesc','$status','$date')";
					
					
						if(mysqli_query($con,$payinsert))
						{
							//echo 'true';
							//echo "<span id='success'><b>New Class Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'New Payment Added to School Succesfully!';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
							//echo 'success';*/
			
							
						}
						else{	
							$response['status'] = 'error';  
							$response['message'] = 'Adding New Payment Failed,check all input and try again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);										
								//die(mysqli_error($con));
	
 }

}
else
{
							$response['status'] = 'error';  
							$response['message'] = 'Parse Error,check all input and try again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
	//die(mysqli_error($con));
}
?>

