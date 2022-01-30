<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$subjectid=$_POST['subjectid'];
$subname=ucfirst(mysqli_real_escape_string($con,$_POST['subname']));
$subalias=ucfirst(mysqli_real_escape_string($con,$_POST['subalias']));
$subcategory=ucfirst(mysqli_real_escape_string($con,$_POST['subcategory']));
$submark=mysqli_real_escape_string($con,$_POST['submark']);
if($subname && $subjectid && $clientid)
{
	$update="update subject_tab set subject_name='$subname',subject_category='$subcategory',subject_alias='$subalias', subject_mark='$submark' where subject_id='$subjectid' and clientapp_id='$clientid'";
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'OK';
		}else {echo 'NOTOK'; die (mysqli_error($con));}
}
?>