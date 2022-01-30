<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$subname=ucfirst(mysqli_real_escape_string($con,$_POST['subname']));
$subalias=ucfirst(mysqli_real_escape_string($con,$_POST['subalias']));
$subcategory=ucfirst(mysqli_real_escape_string($con,$_POST['subcategory']));
$submark=mysqli_real_escape_string($con,$_POST['submark']);
$substatus=true;
$date=date('Y-m-d');


if($_POST['subname']!='' || $_POST['submark']!='')
//if(count($_POST) < 4)
{


$classinsert="INSERT INTO subject_tab (clientapp_id,subject_name,subject_category,subject_alias,subject_mark,subject_status,date) VALUES('$clientid','$subname','$subcategory','$subalias','$submark','$substatus','$date')";
					
					
						if(mysqli_query($con,$classinsert))
						{
							//echo 'true';
							//echo "<span id='success'><b>New Class Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'New Subject Added to School Succesfully!';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
							//echo 'success';*/
			
							
						}
						else{	
							$response['status'] = 'error';  
							$response['message'] = 'Adding New Subject Failed,check all input and try again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);										
								 die(mysqli_error($con));
	
 }

}
else
{
							$response['status'] = 'error';  
							$response['message'] = 'Adding New Subject Failed,check all input and try again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
	die(mysqli_error($con));
}
?>

