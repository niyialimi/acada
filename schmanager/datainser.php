<?php
require_once('../req/config.php');
session_start();
	//$clientid=$_SESSION['clientappid'];
	$username='gloriousadmin';
	//$password='quivaclient#60';
	$password='myclient#60';
	$password=password_hash($password,PASSWORD_BCRYPT);
	$role='Systemadmin';
	/*$sql="INSERT INTO schadmin_tab (clientapp_id,username,password,role) VALUES ('$clientid','$username','$password','$role')";
					
						if(mysqli_query($con,$sql))
						{
							//echo 'SENT';
							$response_array['status'] = 'success'; /* match error string in jquery if/else 
							$response_array['message'] = 'message sent!';   /* add custom message  
							header('Content-type: application/json');
							echo json_encode($response_array);
						}
						else{
								 				
								 $response_array['status'] = 'error'; /* match error string in jquery if/else  
								 $response_array['message'] = 'message not sent!';   /* add custom message 
								  header('Content-type: application/json');
								  json_encode($response_array);							
								 die(mysqli_error($con));
						}

*/
$clientname='HoneyGold International';
$clientlogo='';
$clientemail='hn@gmail.com';
$clientmobile='08168905925';
$cterm='First';
$csession=date('Y')."/".date('Y',strtotime('+1 year'));
$csession='2018/2019';
$address='#38, Precious Lodge, Apena, Oganla, Off Wire and Cable Apata Ibadan';
$regdate=date('Y-m-d');
$clientstate='Oyo';
$clientnation='Nigeria';
$insertsql="INSERT INTO setting_tab (clientapp_name,clientapp_logo,clientapp_email,clientapp_mobile,clientapp_address,clientapp_country,clientapp_state,current_term,current_session,reg_date) VALUES ('$clientname','$clientlogo','$clientemail','$clientmobile','$address','$clientnation','$clientstate','$cterm','$csession','$regdate')";
					
						if(mysqli_query($con,$insertsql))
						{
							$selectsql='select * from setting_tab order by clientapp_id desc limit 1';
							$result=mysqli_query($con,$selectsql);
								if (mysqli_num_rows($result))
								{
									while($rows=mysqli_fetch_assoc($result))
									{
										
										$clientid=$rows['clientapp_id'];
							//echo 'SENT';
							$sql="INSERT INTO schadmin_tab (clientapp_id,username,password,role) VALUES ('$clientid','$username','$password','$role')";
					
									if(mysqli_query($con,$sql))
									{
										//echo 'SENT';
										$response_array['status'] = 'admin success'; 
										$response_array['message'] = 'School Created!';  
										header('Content-type: application/json');
										echo json_encode($response_array);
									}
									else{
														
										 $response_array['status'] = 'error';  
										 $response_array['message'] = 'Error Creating New School!';  
										  header('Content-type: application/json');
										  json_encode($response_array);							
										 die(mysqli_error($con));
										}
							
									}
								}
						else{
								 				
								 $response_array['status'] = 'error'; /* match error string in jquery if/else */ 
								 $response_array['message'] = 'message not sent!';   /* add custom message */ 
								  header('Content-type: application/json');
								  json_encode($response_array);							
								 die(mysqli_error($con));
						}
					}

?>

