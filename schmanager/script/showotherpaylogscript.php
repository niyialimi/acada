<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
//$atclass=mysql_real_escape_string($con,$_POST['attclass']);
if(isset($_POST['schclass']))
{
	$count=0;
	$sn=1;
  // $classselect=$_POST['classselect'];	
	$searchquery = "select * from setpayment where pay_class='".$_POST['schclass']."' and pay_name='".$_POST['paytype']."' and clientapp_id='".$_SESSION['clientappid']."'";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   	{
		while($rows=mysqli_fetch_assoc($searchData))
	   {	
		    $payclass=$rows['pay_class'];
			$amount=$rows['pay_amount'];
			$searchpay = "select * from student_tab where current_class='$payclass' and clientapp_id='".$_SESSION['clientappid']."'";
			$searchpay=mysqli_query($con,$searchpay);
			if(mysqli_num_rows($searchpay))
			{
	   		$output .='<thead style="background:#39C; color:#FFF;">
                      <tr>
                      	
                        <th class="text-center">S/N</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Student Roll</th>
						<th class="text-center"">Student Class</th>
						<th class="text-center">Arm</th>
                        <th class="text-center">Amount Due</th>
						<th class="text-center">Payment Status</th>
                        <th class="text-center">Action</th>
                      
                      </tr>
                    </thead>';
		   while($rows=mysqli_fetch_assoc($searchpay))
		   {	
				$clientid=$rows['clientapp_id'];
				$studentid=$rows['student_id'];	
				$class=$rows['current_class'];
				$_SESSION['lname']=$rows['lname'];
				$_SESSION['fname']=$rows['fname'];
				$_SESSION['oname']=$rows['oname'];
				$_SESSION['rollnum']=$rows['rollnum'];
				$fullname=$_SESSION['lname']." ".$_SESSION['fname'];
				$paymentstatus=$rows['payment_status'];
				if($paymentstatus ==0){$mystat= "<span data-toggle= tooltip class=label label-danger style=background:#e50613; color:#FFF;>Unpaid</span>"; $button="<a href=# data-id=$studentid data-amount=$amount data-name=$fullname name=confirm id=confirm class=btn btn-info><i class=fa fa-credit-card></i> <span data-toggle= tooltip class=label label-danger style=background:#39C; color:#FFF;>Confirm Payment</span></a>";}else{$mystat= "<span data-toggle=tooltip  class=label label-success style=background:#07a436; color:#FFF;>Paid</span>";$button="<span data-toggle= tooltip class=label label-danger style=background:#07a436; color:#FFF;>Payment Confirmed</span>"; }
				
				
				$date=date('l');
				 $output.='<tbody>
						<tr>
							<td align="center">'.$sn.'</td>
							<td align="center">'.$fullname.'</td>
							<td align="center">'.$rows['rollnum'].'</td>
							<input type="hidden" name="stdname[]" id="stdname" value="'.$fullname.'">
							<input type="hidden" name="studentid[]" id="studentid" value="'.$studentid.'">							
							<td align="center">'.$class.'<input type="hidden" name="class[]" id="class" value="'.$class.'"></td>
							<td align="center">'.$rows['current_arm'].'</td>
							<td align="center">'.$amount.'</td>
							<td align="center">'.$mystat.'</td>
							<td align="center">'.$button.'</td>
							 </tr>';
						  
		   $count++;  $sn++;
		   }
	   
	   $output .='<tfoot style="background:#39C; color:#FFF;">
                      <tr>
                       
                       <th class="text-center">S/N</th>
                        <th class="text-center">Student Name</th>
                        <th class="text-center">Student Roll</th>
						<th class="text-center">Student Class</th>
						<th class="text-center">Arm</th>
                        <th class="text-center">Amount Due</th>
						<th class="text-center">Payment Status</th>
                        <th class="text-center">Action</th>                   
                      </tr>
                     
                    </tfoot>';
			}
			else{$output.='<tr>
    <td colspan="8" align="center"><i class="fa fa-times"></i>No Payment Data Set for the Class Selected Yet</td>
    </tr> </tbody>';}
	   }
   }else {
   
   $output.='<tr>
    <td colspan="8" align="center"><i class="fa fa-times"></i>No Payment Data Set for the Class Selected Yet</td>
    </tr> </tbody>';
    
    } 
	
}

echo $output;
//script/makepayment.php?id=$studentid&amount=$amount
?>