<?php
require_once("../../req/config.php");
session_start();

//$stdid=80;
if(isset ($_GET["stdid"]))
{
	$stdid=$_GET["stdid"];
	$dquery = "delete from student_tab where student_id='$stdid' and clientapp_id='".$_SESSION['clientappid']."'";
	 $result = mysqli_query($con,$dquery) or die(mysqli_error($con));
	 if($result)
	 {
		 echo 'deleted';
	 
	 }else
	 {
		 echo 'not-deleted';
	 }
}

else if(isset ($_GET["staffid"]))
{
	$staffid=$_GET["staffid"];
	$zquery = "delete from staff_tab where staff_id='$staffid' and clientapp_id='".$_SESSION['clientappid']."'";
	 $result = mysqli_query($con,$zquery) or die(mysqli_error($con));
	 if($result)
	 {
		 echo 'deleted';
	 
	 }else
	 {
		 echo 'not-deleted';
	 }
}
else if(isset ($_GET["classid"]))
{
	$classid=$_GET["classid"];
	$zquery = "delete from class_tab where class_id='$classid' and clientapp_id='".$_SESSION['clientappid']."'";
	 $result = mysqli_query($con,$zquery) or die(mysqli_error($con));
	 if($result)
	 {
		 echo 'deleted';
	 
	 }else
	 {
		 echo 'not-deleted';
	 }
}
else if(isset ($_GET["subjectid"]))
{
	$subjectid=$_GET["subjectid"];
	$zquery = "delete from subject_tab where subject_id='$subjectid' and clientapp_id='".$_SESSION['clientappid']."'";
	 $result = mysqli_query($con,$zquery) or die(mysqli_error($con));
	 if($result)
	 {
		 echo 'deleted';
	 
	 }else
	 {
		 echo 'not-deleted';
	 }
}
?>