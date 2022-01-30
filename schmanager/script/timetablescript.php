<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];

$tableclass=ucfirst(mysqli_real_escape_string($con,$_POST['tableclass']));
$tablesubject=ucfirst(mysqli_real_escape_string($con,$_POST['tablesubject']));
$tableteacher=ucfirst(mysqli_real_escape_string($con,$_POST['tableteacher']));
$tableday=mysqli_real_escape_string($con,$_POST['tableday']);
$tableperiod=mysqli_real_escape_string($con,$_POST['tableperiod']);
$tablestart=mysqli_real_escape_string($con,$_POST['tablestart']);
$tableend=mysqli_real_escape_string($con,$_POST['tableend']);
$cterm=mysqli_real_escape_string($con,$_POST['cterm']);
$csession=mysqli_real_escape_string($con,$_POST['csession']);

if($_POST['tableclass']!='' || $_POST['tablesubject']!='' || $_POST['tablestart']!='' || $_POST['tableend']!='')

{

$timeinsert="INSERT INTO timetable_tab (clientapp_id,class_id,subject_name,period,start_time,end_time,current_term,current_session,staff_id,day_of_week) VALUES('$clientid','$tableclass','$tablesubject','$tableperiod','$tablestart','$tableend','$cterm','$csession','$tableteacher','$tableday')";
					
					
						if(mysqli_query($con,$timeinsert))
						{
							
							$response['status'] = 'success';  
							$response['message'] = 'Data Added to Class Succesfully!';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{	
							$response['status'] = 'error';  
							$response['message'] = 'Adding Data Failed,check all input and try again';  
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
							echo json_encode($response);}
?>

