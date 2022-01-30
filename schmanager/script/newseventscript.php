<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
$nebody=mysqli_real_escape_string($con,ucfirst($_POST['nebody']));
$netitle=mysqli_real_escape_string($con,ucfirst($_POST['netitle']));
$netype=mysqli_real_escape_string($con,ucfirst($_POST['netype']));
$nedate=date('Y-m-d');
$netime=date('h:i a');
$clientid=$_SESSION['clientappid'];
$status=1;
$output='';
//echo $msgtime;
//$msg=STR_To_DATE($date)
if($netype=='News')
{


					
					$msqsl="INSERT INTO newsevent_tab (clientapp_id,ne_title,ne_body,ne_type,Publish_date,publish_time,publish_status) VALUES ('$clientid','$netitle','$nebody','$netype','$nedate','$netime','$status')";
					
						$qry=mysqli_query($con,$msqsl);		
						if($qry)
						{			
						
						    $output= "News Published And Now Visible";
						     
					
						}
						else{
							$output= "News Not published; Please try Again Later";
							//die('Error : ' . mysqli_error($con));
							}
				echo $output;	 
	
}
else if($netype=='Event')
{
	$msqsl="INSERT INTO newsevent_tab (clientapp_id,ne_title,ne_body,ne_type,Publish_date,publish_time,publish_status) VALUES ('$clientid','$netitle','$nebody','$netype','$nedate','$netime','$status')";
					
						$qry=mysqli_query($con,$msqsl);		
						if($qry)
						{			
						
						    $output= "Event Published And Now Visible";
						     
					
						}
						else{
							$output= "Event Not published; Please try Again Later";
							//die('Error : ' . mysqli_error($con));
							}
							echo $output;
}
?>

