<?php
require_once('../../req/config.php');
session_start();
$prefix='STD';
$clientid=$_SESSION['clientappid'];
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
$class=mysqli_real_escape_string($con,$_POST['class']);
$stdarm=ucfirst(mysqli_real_escape_string($con,$_POST['stdarm']));
$stdhobby=mysqli_real_escape_string($con,$_POST['stdhobby']);
$rollnum=mysqli_real_escape_string($con,$_POST['rollnum']);
$age=mysqli_real_escape_string($con,$_POST['age']);
$term=mysqli_real_escape_string($con,$_POST['term']);
$dob=mysqli_real_escape_string($con,$_POST['dob']);
$admyear=mysqli_real_escape_string($con,$_POST['admyear']);
$csession=mysqli_real_escape_string($con,$_POST['csession']);
$gradyear=mysqli_real_escape_string($con,$_POST['gradyear']);
$profileImg = $_FILES['profileImg'];
$pname=mysqli_real_escape_string($con,$_POST['pname']);
$poname=mysqli_real_escape_string($con,$_POST['poname']);
$pemail=mysqli_real_escape_string($con,$_POST['pemail']);
$ptitle=mysqli_real_escape_string($con,$_POST['ptitle']);
$pmobile=mysqli_real_escape_string($con,$_POST['pmobile']);
$paddress=mysqli_real_escape_string($con,$_POST['paddress']);
$pcity=mysqli_real_escape_string($con,$_POST['pcity']);
$occup=mysqli_real_escape_string($con,$_POST['occup']);
$rel=mysqli_real_escape_string($con,$_POST['rel']);
$date=date('Y-m-d');
$paystatus=0;
$status=true;

if(isset ($_POST['regbut']) || $_FILES['profileImg']!='' || $_POST['state']!='')
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
		$path="stdimage/" . $_FILES["profileImg"]["name"];$rollnum="STD".$rollnum;
					$sl="INSERT INTO student_tab (clientapp_id,lname,fname,oname,semail,admission_year, grad_year, current_class,current_arm,rollnum,age, current_session, current_term, gender, nationality, state_origin, religion, student_address, city, dob, disability, payment_status, parent_name, parent_oname, parent_title,pemail, address, parent_phone,current_city,occupation,relationship,pics,regdate,status,std_hobby) VALUES ('$clientid','$lname','$fname','$oname','$email','$admyear','$gradyear','$class','$stdarm','$rollnum','$age','$csession','$term','$gender','$nation','$state','$stdreligion','$stdaddress','$stdcity','$dob','$pdisable','$paystatus','$pname','$poname','$ptitle','$pemail','$paddress','$pmobile','$pcity','$occup','$rel','$path','$date','$status','$stdhobby')";
					$sourcePath = $_FILES['profileImg']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../stdimage/".$_FILES['profileImg']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ;					
					
				//	move_uploaded_file($_FILES["file"]["tmp_name"],"../empimage/".$_FILES["file"]["name"]);
					
						if(mysqli_query($con,$sl))
						{
							//echo "<span id='success'><b>Registration Successful</b></span>	";		
							$response['status'] = 'success';  
							$response['message'] = 'New Student Added Successfully!';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
			
							
						}
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							/*$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding New Student; Please Try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);		*/			
								 die(mysqli_error($con));
						}
			  }
		}
 }
}
else
{
	//echo "<span id='invalid'><b>There are errors with the input fields; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Adding New Student; Please Try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);
}
?>

