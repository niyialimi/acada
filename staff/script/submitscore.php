<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');			
	$notice='';
	$rowCount = count($_POST["studentid"]);
	$sn=1;	
	$examdate=$_POST['examdate'];
	$session=$_POST['session'];
	$subject=$_POST['subject'];
	$term=$_POST['term'];
	$examtype='termexam';
if(isset ($_POST['studentid']) && ($_POST['subject']))
{
	foreach( ($_POST['studentid']) as $key=>$attstatus)
	{
		$clientappid=$_SESSION['clientappid'];
		$mark=$_POST['mark'][$key];
		$studentid=$_POST['studentid'][$key];
		$class=$_POST['class'][$key];
		$classarm=$_POST['classarm'][$key];
		$date=date('Y-m-d');
		$sl="INSERT INTO scoresheet_tab (clientapp_id,student_id,student_class,exam_session,exam_term,exam_type,exam_subject,mark,exam_date,reg_date) VALUES ('$clientappid','$studentid','$class','$session','$term','$examtype','$subject','$mark','$examdate','$date')";
		if(mysqli_query($con,$sl))
		{
			$notice="Mark Submitted Succesfully for ".$rowCount." Students in ".$class." ".$classarm;			
		}
		else
		{
			$notice="Error Submitting Mark";
			//die(mysqli_error($con));
		}
		
	}
	//echo $notice;
	echo '<span id="success"><b>'.$notice.'</b></span>';
}
?>