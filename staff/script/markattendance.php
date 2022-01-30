<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');	

	$week= date('D');
	$day=date('w');//0=sun & 6=sat
	$wkstart=date('Y-m-d',strtotime('-'.$day.'days'));
	$wkend=date('Y-m-d',strtotime('+'.(6-$day).'days'));
	$date = date('Y-m-d');
	$dayOfWeek = date("l", strtotime($date));
	$year =date('Y');
	//$month=date('F, Y', strtotime($date));//shows January, 2018
	$month=date('F', strtotime($date));
	$currentsession=date('Y')."/".date('Y',strtotime('+1 year'));
	//echo $dayOfWeek." ".$month;
	$notice='';
	$sn=1;	
if(isset ($_POST['studentid']))
{
	foreach( ($_POST['attstatus']) as $key=>$attstatus)
	{
		$clientappid=$_SESSION['clientappid'];
		$stdname=$_POST['stdname'][$key];
		$studentid=$_POST['studentid'][$key];
		$class=$_POST['class'][$key];
		$date=date('Y-m-d');
		
		$sl="INSERT INTO stdattend_tab (clientapp_id,student_id,student_class,month,year,day,date,csession,attendance_status) VALUES ('$clientappid','$studentid','$class','$month','$year','$dayOfWeek','$date','$currentsession','$attstatus')";
		if(mysqli_query($con,$sl))
		{
			$notice="Student attendance taken for ".$dayOfWeek." ".date('F, Y', strtotime($date));			
		}
		else
		{
			$notice="Student attendance not taken; error";
		}
		
	}
	//echo $notice;
	echo '<span id="success"><b>'.$notice.'</b></span>';
}
?>