<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
$id=$_GET['id'];
//$kidclass=$_GET['kidclass'];
$amount=$_GET['amount'];
$for='School Fees';
$output='';
//echo $id.$kidclass.$amount;
$csession= $_SESSION['csession'];
$cterm= $_SESSION['cterm'];
//echo $cterm;
$date=date('Y-m-d');
$makepay = "select * from student_tab where student_id='$id' and payment_status=0 and clientapp_id='".$_SESSION['clientappid']."'";
$makepay=mysqli_query($con,$makepay);
if(mysqli_num_rows($makepay))
	{
		 while($rows=mysqli_fetch_assoc($makepay))
		   {	
				$clientid=$rows['clientapp_id'];
				$studentid=$rows['student_id'];
				$kidclass=$rows['current_class'];
				$payinsert="INSERT INTO payment_tab (clientapp_id,student_id,student_class,payment_session,payment_term,payment_for,payment_amount,payment_date) VALUES('$clientid','$id','$kidclass','$csession','$cterm','$for','$amount','$date')";
					
						if(mysqli_query($con,$payinsert))
						{
							$payupdate="UPDATE student_tab SET payment_status=1 where student_id=$id and clientapp_id='".$_SESSION['clientappid']."'";					$result2=mysqli_query($con,$payupdate);
							if($result2)
							{
								$output='Payment Confirmed';
							}else
							{
								$output='No Payment';
							}
						}else
						{
							$output='An Error Just Occured';
						}
						echo $output;
		   }
	}
?>