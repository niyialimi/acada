<?php
require_once('../../req/config.php');
session_start();
$clientid=$_SESSION['clientappid'];
$clientname=ucfirst(mysqli_real_escape_string($con,$_POST['clientname']));
$clientemail=mysqli_real_escape_string($con,$_POST['clientemail']);
$clientnation=mysqli_real_escape_string($con,$_POST['nation']);
$clientstate=mysqli_real_escape_string($con,$_POST['state']);
$clientaddress=mysqli_real_escape_string($con,$_POST['schaddress']);
$clientcity=mysqli_real_escape_string($con,$_POST['schcity']);
$clientweb=mysqli_real_escape_string($con,$_POST['schweb']);
$clientmobile=mysqli_real_escape_string($con,$_POST['clientmobile']);
$csession=mysqli_real_escape_string($con,$_POST['csession']);
$cterm=mysqli_real_escape_string($con,$_POST['cterm']);
$tbegin=mysqli_real_escape_string($con,$_POST['tbegin']);
$tend=mysqli_real_escape_string($con,$_POST['tend']);
//$schpath="";
//$signature="";
if($clientname && $clientid)
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
			if (file_exists("schlogo/" . $_FILES["profileImg"]["name"])) 
			{
			echo $_FILES["profileImg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
		else
		{			
		$schpath="schlogo/" . $_FILES["profileImg"]["name"];
		$signature="schlogo/" . $_FILES["signImg"]["name"]; 
	$update="update setting_tab set clientapp_name='$clientname',clientapp_logo='$schpath',clientapp_sign='$signature',clientapp_email='$clientemail', clientapp_mobile='$clientmobile', clientapp_address='$clientaddress', clientapp_country='$clientnation',clientapp_state='$clientstate',clientapp_city='$clientcity',clientapp_web='$clientweb',current_session='$csession',current_term='$cterm',clientapp_tbegin='$tbegin',clientapp_tend='$tend' where clientapp_id='$clientid'";
					$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../schlogo/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;
					
					$sourcePath = $_FILES['signImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../schlogo/".$_FILES['signImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'School Updated Succesfully';
		}else {echo 'Error Updating Schoo Please Try Again';} //die (mysqli_error($con));}
	}
	   }
 }
}
else if(($_FILES['signImg']['name'])!='')
{

$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["signImg"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["signImg"]["type"] == "image/png") || ($_FILES["signImg"]["type"] == "image/jpg") || ($_FILES["signImg"]["type"] == "image/jpeg")
) && ($_FILES["signImg"]["size"] < (100000*1024))//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions))

{
	if ($_FILES["signImg"]["error"] > 0)
	{
	echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
	}
		else
		{
			if (file_exists("schlogo/" . $_FILES["signImg"]["name"])) 
			{
			echo $_FILES["signImg"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
			}
		else
		{			
		$signature="schlogo/" . $_FILES["signImg"]["name"]; 
	$update="update setting_tab set clientapp_name='$clientname',clientapp_sign='$signature',clientapp_email='$clientemail', clientapp_mobile='$clientmobile', clientapp_address='$clientaddress', clientapp_country='$clientnation',clientapp_state='$clientstate',clientapp_city='$clientcity',clientapp_web='$clientweb',current_session='$csession',current_term='$cterm',clientapp_tbegin='$tbegin',clientapp_tend='$tend' where clientapp_id='$clientid'";
					
					$sourcePath = $_FILES['signImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../schlogo/".$_FILES['signImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'School Updated Succesfully';
		}else {echo 'Error Updating Schoo Please Try Again';} //die (mysqli_error($con));}
	}
	   }
 }
}
	
else if(($_FILES['signImg']['name'])=='')
{
	
	$clientappsign=(mysqli_real_escape_string($con,$_POST['signImg1']));	
	$update="update setting_tab set clientapp_name='$clientname',clientapp_sign='$clientappsign',clientapp_email='$clientemail', clientapp_mobile='$clientmobile', clientapp_address='$clientaddress', clientapp_country='$clientnation',clientapp_state='$clientstate',clientapp_city='$clientcity',clientapp_web='$clientweb',current_session='$csession',current_term='$cterm',clientapp_tbegin='$tbegin',clientapp_tend='$tend' where clientapp_id='$clientid'";
					
	//$update="update sms_emptab set emp_lname='$lname' where emp_id='$empid'";
	$result2=mysqli_query($con,$update);
		if($result2)
		{
			echo 'School Updated Succesfully';
		}else {echo 'Error Updating Schoo Please Try Again';} //die (mysqli_error($con));}
	}
		
}
?>