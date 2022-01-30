<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$staffid=$_POST['staffid'];
$staflname=ucfirst(mysqli_real_escape_string($con,$_POST['staflname']));
$staffname=ucfirst(mysqli_real_escape_string($con,$_POST['staffname']));
$stafoname=ucfirst(mysqli_real_escape_string($con,$_POST['stafoname']));
$stafemail=mysqli_real_escape_string($con,$_POST['stafemail']);
$stafmobile=mysqli_real_escape_string($con,$_POST['stafmobile']);
$stafgender=mysqli_real_escape_string($con,$_POST['stafgender']);
$stafnation=mysqli_real_escape_string($con,$_POST['nation']);
$stafstate=mysqli_real_escape_string($con,$_POST['state']);
$staftitle=mysqli_real_escape_string($con,$_POST['staftitle']);
$staftype=mysqli_real_escape_string($con,$_POST['staftype']);
$stafaddress=mysqli_real_escape_string($con,$_POST['stafaddress']);
$spostaddress=mysqli_real_escape_string($con,$_POST['spostaddress']);
$staffmstatus=mysqli_real_escape_string($con,$_POST['staffmstatus']);
$staffreligion=mysqli_real_escape_string($con,$_POST['staffreligion']);
$staffqualify=mysqli_real_escape_string($con,$_POST['staffqualify']);
$stafaddress=mysqli_real_escape_string($con,$_POST['stafaddress']);
$spdisable=mysqli_real_escape_string($con,$_POST['spdisable']);
$gname=mysqli_real_escape_string($con,$_POST['gname']);
$goname=mysqli_real_escape_string($con,$_POST['goname']);
$gemail=mysqli_real_escape_string($con,$_POST['gemail']);
$gtitle=mysqli_real_escape_string($con,$_POST['gtitle']);
$gmobile=mysqli_real_escape_string($con,$_POST['gmobile']);
$gaddress=mysqli_real_escape_string($con,$_POST['gaddress']);
$gcity=mysqli_real_escape_string($con,$_POST['gcity']);
$goccup=mysqli_real_escape_string($con,$_POST['goccup']);
$grel=mysqli_real_escape_string($con,$_POST['grel']);
if($staflname && $staffid && $clientid)
{
if(($_FILES['profileImg']['name'])!='')
{

$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["profileImg"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["profileImg"]["type"] == "image/png") || ($_FILES["profileImg"]["type"] == "image/jpg") || ($_FILES["profileImg"]["type"] == "image/jpeg")
) && ($_FILES["profileImg"]["size"] < (100000*1024))//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions))

{
	if ($_FILES["profileImg"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
	}
		else
		{
			if (file_exists("staffimage/" . $_FILES["profileImg"]["name"])) 
			{
			echo $_FILES["profileImg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
		else
		{			
		$stafpath="staffimage/" . $_FILES["profileImg"]["name"]; 
	$update="update staff_tab set staff_lname='$staflname',staff_fname='$staffname',staff_oname='$stafoname', staff_email='$stafemail', staff_gender='$stafgender', sdisability='$spdisable',staff_phone='$stafmobile',staff_nation='$stafnation',staff_religion='$staffreligion',staff_address='$stafaddress',staff_postaladdress='$spostaddress',staff_state='$stafstate', staff_type='$staftype', staff_mstatus='$staffmstatus', staff_qualify='$staffqualify', gfullname='$gname', gothername='$goname', gemail='$gemail', gtitle='$gtitle', gmobile='$gmobile', gaddress='$gaddress', gcity='$gcity', goccupation='$goccup', grelationship='$grel',staff_pics='$stafpath' where staff_id='$staffid' and clientapp_id='$clientid'";
					$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../staffimage/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;	
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'OK';
		}else {echo 'NOTOK'; die (mysqli_error($con));}
	}
	}
}else
{
	$update="update staff_tab set staff_lname='$staflname',staff_fname='$staffname',staff_oname='$stafoname', staff_email='$stafemail', staff_gender='$stafgender', sdisability='$spdisable',staff_phone='$stafmobile',staff_nation='$stafnation',staff_religion='$staffreligion',staff_address='$stafaddress',staff_postaladdress='$spostaddress',staff_state='$stafstate', staff_type='$staftype', staff_mstatus='$staffmstatus', staff_qualify='$staffqualify', gfullname='$gname', gothername='$goname', gemail='$gemail', gtitle='$gtitle', gmobile='$gmobile', gaddress='$gaddress', gcity='$gcity', goccupation='$goccup', grelationship='$grel' where staff_id='$staffid' and clientapp_id='$clientid'";
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'OK';
		}else {echo 'NOTOK'; die (mysqli_error($con));}
}
}
		
}
?>