<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$stdid=$_POST['studentid'];
$lname=ucfirst(mysqli_real_escape_string($con,$_POST['lname']));
$fname=ucfirst(mysqli_real_escape_string($con,$_POST['fname']));
$oname=ucfirst(mysqli_real_escape_string($con,$_POST['oname']));
$email=mysqli_real_escape_string($con,$_POST['email']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$pdisable=mysqli_real_escape_string($con,$_POST['pdisable']);
$nation=mysqli_real_escape_string($con,$_POST['nation']);
$stdreligion=mysqli_real_escape_string($con,$_POST['stdreligion']);
$stdaddress=mysqli_real_escape_string($con,$_POST['stdaddress']);
$stdcity=mysqli_real_escape_string($con,$_POST['stdcity']);
$state=mysqli_real_escape_string($con,$_POST['state']);
$class=mysqli_real_escape_string($con,$_POST['stdclass']);
$stdarm=ucfirst(mysqli_real_escape_string($con,$_POST['stdarm']));
$stdhobby=mysqli_real_escape_string($con,$_POST['stdhobby']);
//$profileImg = $_FILES['profileImg'];
$pname=mysqli_real_escape_string($con,$_POST['pname']);
$poname=mysqli_real_escape_string($con,$_POST['poname']);
$pemail=mysqli_real_escape_string($con,$_POST['pemail']);
$ptitle=mysqli_real_escape_string($con,$_POST['ptitle']);
$pmobile=mysqli_real_escape_string($con,$_POST['pmobile']);
$paddress=mysqli_real_escape_string($con,$_POST['paddress']);
$pcity=mysqli_real_escape_string($con,$_POST['pcity']);
$occup=mysqli_real_escape_string($con,$_POST['occup']);
$rel=mysqli_real_escape_string($con,$_POST['rel']);
if($lname && $stdid && $clientid)
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
			if (file_exists("stdimage/" . $_FILES["profileImg"]["name"])) 
			{
			echo $_FILES["profileImg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
		else
		{			
		$path="stdimage/" . $_FILES["profileImg"]["name"];//$rollnum="STD".$rollnum;
			
			$update="update student_tab set lname='$lname',fname='$fname',oname='$oname', semail='$email', gender='$gender', disability='$pdisable', nationality='$nation',religion='$stdreligion',student_address='$stdaddress',city='$stdcity', state_origin='$state', current_class='$class', current_arm='$stdarm', std_hobby='$stdhobby', parent_name='$pname', parent_oname='$poname', pemail='$pemail', parent_title='$ptitle', parent_phone='$pmobile', address='$paddress', current_city='$pcity', occupation='$occup', relationship='$rel',pics='$path' where student_id='$stdid' and clientapp_id='$clientid'";
			$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../stdimage/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;	
		//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
		$result2=mysqli_query($con,$update);
			if($result2)
			{
				echo 'OK';
			}else {echo 'NOTOK'; die (mysqli_error($con));}
		}
	}
}
	}
	else
	{
		$update="update student_tab set lname='$lname',fname='$fname',oname='$oname', semail='$email', gender='$gender', disability='$pdisable', nationality='$nation',religion='$stdreligion',student_address='$stdaddress',city='$stdcity', state_origin='$state', current_class='$class', current_arm='$stdarm', std_hobby='$stdhobby', parent_name='$pname', parent_oname='$poname', pemail='$pemail', parent_title='$ptitle', parent_phone='$pmobile', address='$paddress', current_city='$pcity', occupation='$occup', relationship='$rel' where student_id='$stdid' and clientapp_id='$clientid'";
		//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
		$result2=mysqli_query($con,$update);
			if($result2)
			{
				echo 'OK';
			}else {echo 'NOTOK'; die (mysqli_error($con));}
	}
}
?>