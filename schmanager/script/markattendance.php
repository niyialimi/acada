<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
$slquery="select current_term,current_session from setting_tab where clientapp_id='".$_SESSION['clientappid']."'";
$slresult=mysqli_query($con,$slquery);
if(mysqli_num_rows($slresult))
{
	while($rows=mysqli_fetch_array($slresult))
	{
		$_SESSION['csession']=$rows['current_session'];
		$_SESSION['cterm']=$rows['current_term'];
	}
	//echo $_SESSION['csession']." ".$_SESSION['cterm'];
}	
	$week= date('D');
	$day=date('w');//0=sun & 6=sat
	$wkstart=date('Y-m-d',strtotime('-'.$day.'days'));
	$wkend=date('Y-m-d',strtotime('+'.(6-$day).'days'));
	$date = date('Y-m-d');
	//$dayOfWeek = date("l", strtotime($date));
	$year =date('Y');
	$dayOfMonth=date('d');
	//$month=date('F, Y', strtotime($date));//shows January, 2018
	$month=date('F', strtotime($date));
	$currentsession=$_SESSION['csession'];//date('Y')."/".date('Y',strtotime('+1 year'));	
	$currentterm=$_SESSION['cterm'];	
	$notice='';
	$sn=1;	
if(isset($_POST['staffid']))
{
foreach( ($_POST['attstatus']) as $key=>$attstatus)
	{
		$clientappid=$_SESSION['clientappid'];
		$staffname=$_POST['staffname'][$key];
		$staffid=$_POST['staffid'][$key];
		$date=date('Y-m-d');
		$sl="INSERT INTO staffattend_tab (clientapp_id,staff_id,attendance_status,month,year,day_of_week,day_of_month,date,csession,cterm) VALUES ('$clientappid','$staffid','$attstatus','$month','$year','$day','$dayOfMonth','$date','$currentsession','$currentterm')";
		if(mysqli_query($con,$sl))
		{
			$notice="Staff attendance taken";
		}
		else
		{
			$notice="Staff attendance not taken; An error just occured,Please try again";
		}
		
	}
	//echo $notice;
	echo '<span id="success"><b>'.$notice.'</b></span>';
}
else if(isset ($_POST['studentid']))
{
	foreach( ($_POST['attstatus']) as $key=>$attstatus)
	{
		$clientappid=$_SESSION['clientappid'];
		$stdname=$_POST['stdname'][$key];
		$studentid=$_POST['studentid'][$key];
		$class=$_POST['class'][$key];
		$date=date('Y-m-d');
		$sl="INSERT INTO stdattend_tab (clientapp_id,student_id,attendance_status,student_class,month,year,day_of_week,day_of_month,date,csession,cterm) VALUES ('$clientappid','$studentid','$attstatus','$class','$month','$year','$day','$dayOfMonth','$date','$currentsession','$currentterm')";
		if(mysqli_query($con,$sl))
		{
			$notice="Student attendance taken";			
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