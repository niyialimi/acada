<?php
require_once('../../req/config.php');
session_start();
$prefix='STD';
$clientid=$_SESSION['clientappid'];
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
$stafnum=mysqli_real_escape_string($con,$_POST['stafnum']);
$stafdob=mysqli_real_escape_string($con,$_POST['stafdob']);
$stafyear=mysqli_real_escape_string($con,$_POST['stafyear']);
$stafaddress=mysqli_real_escape_string($con,$_POST['stafaddress']);
$spostaddress=mysqli_real_escape_string($con,$_POST['spostaddress']);
$staffmstatus=mysqli_real_escape_string($con,$_POST['staffmstatus']);
$staffreligion=mysqli_real_escape_string($con,$_POST['staffreligion']);
$staffqualify=mysqli_real_escape_string($con,$_POST['staffqualify']);
$stafaddress=mysqli_real_escape_string($con,$_POST['stafaddress']);
$spdisable=mysqli_real_escape_string($con,$_POST['spdisable']);
$profileImg = $_FILES['profileImg'];
$gname=mysqli_real_escape_string($con,$_POST['gname']);
$goname=mysqli_real_escape_string($con,$_POST['goname']);
$gemail=mysqli_real_escape_string($con,$_POST['gemail']);
$gtitle=mysqli_real_escape_string($con,$_POST['gtitle']);
$gmobile=mysqli_real_escape_string($con,$_POST['gmobile']);
$gaddress=mysqli_real_escape_string($con,$_POST['gaddress']);
$gcity=mysqli_real_escape_string($con,$_POST['gcity']);
$goccup=mysqli_real_escape_string($con,$_POST['goccup']);
$grel=mysqli_real_escape_string($con,$_POST['grel']);
$cstatus=true;

if($_FILES['profileImg']!='' || $_POST['state']!='')
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
		$stafpath="staffimage/" . $_FILES["profileImg"]["name"]; $stafnum="STAFF".$stafnum;
$sl="INSERT INTO staff_tab (clientapp_id,staff_lname,staff_fname,staff_oname,staff_title,staff_year,staff_nation,staff_state,staff_dob,staff_email,staff_phone,staff_gender,staff_address,staff_postaladdress,staff_type,staff_num,staff_mstatus,staff_religion,sdisability,staff_qualify,gfullname,gothername,gtitle,gmobile,gemail,gaddress,grelationship,gcity,goccupation,staff_pics,cstatus)VALUES('$clientid','$staflname','$staffname','$stafoname','$staftitle','$stafyear','$stafnation','$stafstate','$stafdob','$stafemail','$stafmobile','$stafgender','$stafaddress','$spostaddress','$staftype','$stafnum','$staffmstatus','$staffreligion','$spdisable','$staffqualify','$gname','$goname','$gtitle','$gmobile','$gemail','$gaddress','$grel','$gcity','$goccup','$stafpath','$cstatus')";
					$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../staffimage/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;					
					
				//	move_uploaded_file($_FILES["file"]["tmp_name"],"../empimage/".$_FILES["file"]["name"]);
					
						if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'New Staff Added Successfully!';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding New Staff; Please Try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
								 //die(mysqli_error($con));
						}
			  }
		}
 }

}
else
{
	//echo "<span id='invalid'><b>There are errors with the input fields; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding New Staff; Please Try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
}
?>
