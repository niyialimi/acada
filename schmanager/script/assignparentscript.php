<?php
require_once('../../req/config.php');
session_start();
$parentphone=mysqli_real_escape_string($con,$_POST['parentphone']);
$parentuname=mysqli_real_escape_string($con,$_POST['parentuname']);
$parentpass=mysqli_real_escape_string($con,$_POST['parentpass']);
$parentpass=password_hash($parentpass,PASSWORD_BCRYPT);
$stduname=mysqli_real_escape_string($con,$_POST['stduname']);
$stdlogpassword=mysqli_real_escape_string($con,$_POST['stdlogpassword']);
$stdlogpassword=password_hash($stdlogpassword,PASSWORD_BCRYPT);
$clientid=$_SESSION['clientappid'];
$stdid=mysqli_real_escape_string($con,$_POST['stdid']);
$unencodeparentpass=mysqli_real_escape_string($con,$_POST['parentpass']);
$unencodestdlogpassword=mysqli_real_escape_string($con,$_POST['stdlogpassword']);
$logsql="select parent_phone from parent_login where parent_phone='$parentphone' ";
$result=mysqli_query($con,$logsql);
if (mysqli_num_rows($result)>0)
{
	$response['status'] = 'error';  
	$response['message'] = 'Parent already Assigned to Kids';  
	header('Content-type: application/json'); 							
	echo json_encode($response);
}else
{
$sql="INSERT INTO parent_login (clientapp_id,parent_phone,parent_username,parent_password) VALUES ('$clientid','$parentphone','$parentuname','$parentpass')";
		// OREDER BY id DESC is order result by descending
			if(mysqli_query($con,$sql))
						{
							
							
							//echo "<span id='success'><b>New Staff Added Successfully</b></span>	";									
							$uptodate="update student_tab set std_password='$stdlogpassword' where student_id='$stdid'";
							$result2=mysqli_query($con,$uptodate);
								if($result2)
								{
									$username="nathanieladeniran"; $api_password="instinct141"; $sender=$_SESSION['clientname'];
								$message='Login Details to Your Account on The School Portal are'.' | '.'Username: '.$parentuname.'  Password:'.$unencodeparentpass.' | '.'Your Kid Account Detail Username: '.$stduname.'  Password: '.$unencodestdlogpassword.' | '.' Logon to '.$_SESSION['clientname'].'.eriditeportal.com';
								$username=urlencode($username);
								$api_password=urlencode($api_password);
								$sender=urlencode($sender);
								$message=urlencode($message);
								$priority="2";// 1-Normal,2-Priority,3-Marketing
						
								$parameters="username=$username&password=$api_password&sender=$sender&mobiles=$parentphone&message=$message&priority=$priority";
								$url="http://portal.bulksmsnigeria.net/api/";
								$ch = curl_init($url);
								$get_url=$url."?".$parameters;

								curl_setopt($ch, CURLOPT_POST,0);
								curl_setopt($ch, CURLOPT_URL, $get_url);
						  

							curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
							curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
							curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
							$return_val = curl_exec($ch);
							
							if($return_val==000)
							
							{
								//echo 'OK'; echo $return_val;
										$response['status'] = 'success';  
										$response['message'] = 'Parent and Student Login Succesfully Assigned And Login Details Sent as SMS To Parent Mobile';  
										header('Content-type: application/json'); 							
										echo json_encode($response);
							}
							
							else if($return_val=="")
							{
							echo 'Message Not Sent Please Check Your Network And Make Sure The Numbers Are in Correct Format.';
							}
							else
							{
								echo 'Error Sending Message';
							}
										
									}
									else {echo 'NOTOK'; die (mysqli_error($con));}
									
										
							}
							
						else{
							//echo "<span id='invalid'><b>An Error just occured; please try again</b></span>	";
							$response['status'] = 'error';  
							$response['message'] = 'An Error Occured While Assigning, Please try Again';  
							header('Content-type: application/json'); 							
							echo json_encode($response);						
								 die(mysqli_error($con));
						}
}
?>