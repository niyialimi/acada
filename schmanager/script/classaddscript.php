<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$clname=ucfirst(mysqli_real_escape_string($con,$_POST['clname']));
$clalias=ucfirst(mysqli_real_escape_string($con,$_POST['clalias']));
$clcategory=ucfirst(mysqli_real_escape_string($con,$_POST['clcategory']));
$clteacher=mysqli_real_escape_string($con,$_POST['clteacher']);
if($clteacher=='None'){$clteacher=0;}else {$clteacher=$clteacher;}
$clarm=ucfirst(mysqli_real_escape_string($con,$_POST['clarm']));
if($clarm==''){$clarm='None';}else {$clarm=$clarm;}
//$clnum=ucfirst(mysqli_real_escape_string($con,$_POST['clnum']));
$status=true;
$date=date('Y-m-d');


if($_POST['clalias']!='' || $_POST['clnum']!='')
//if(count($_POST) < 4)
{


$classinsert="INSERT INTO class_tab (clientapp_id,class_name,class_alias,class_category,staff_id,class_arm,status,date) VALUES('$clientid','$clname','$clalias','$clcategory','$clteacher','$clarm','$status','$date')";
					
					
						if(mysqli_query($con,$classinsert))
						{
							//echo 'true';
							//echo "<span id='success'><b>New Class Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'New Class Added to School Succesfully!';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
							//echo 'success';*/
			
							
						}
						else{	
							$response['status'] = 'error';  
							$response['message'] = 'Adding New Class Failed,check all input and try again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);										
								// die(mysqli_error($con));
	
 }

}
else
{
							$response['status'] = 'error';  
							$response['message'] = 'Adding New Class Failed,check all input and try again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
	//die(mysqli_error($con));
}
?>

