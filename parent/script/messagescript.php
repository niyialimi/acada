<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
$msgbody=mysqli_real_escape_string($con,ucfirst($_POST['msgbody']));
$msgto=mysqli_real_escape_string($con,ucfirst($_POST['msgto']));
$msgsubject=mysqli_real_escape_string($con,ucfirst($_POST['msgsubject']));
$msgsendertype='Parent';
$msgsenderid=$_SESSION['parentid'];
$msgdate=date('Y-m-d');
$msgtime=date('h:i a');
$clientid=$_SESSION['clientappid'];
$output='';
//echo $msgtime;
//$msg=STR_To_DATE($date)



					
					$msqsl="INSERT INTO message_tab (clientapp_id,msg_subject,msg_to,msg_body,msg_sender,msg_senderid,msg_date,msg_time) VALUES ('$clientid','$msgsubject','$msgto','$msgbody','$msgsendertype','$msgsenderid','$msgdate','$msgtime')";
					
						$qry=mysqli_query($con,$msqsl);		
						if($qry)
						{			
						
						    $output= "Message Sent ";
						     
					
						}
						else{
							$output= "Message Not Sent; Please try Again Later";
							//die('Error : ' . mysqli_error($con));
							}
					 
					echo $output;
	
?>

