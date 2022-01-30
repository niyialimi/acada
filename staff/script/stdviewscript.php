<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
$stdclass=mysqli_real_escape_string($con,$_POST['stdclass']);
//$stdclass=24;
//$_SESSION['staffid']=2;
//$_SESSION['clientappid']=1;
$output='';
if($stdclass)
{
$logsql="select * from class_tab where class_id='$stdclass' and staff_id='".$_SESSION['staffid']."' and clientapp_id='".$_SESSION['clientappid']."' ";
$result=mysqli_query($con,$logsql);

while($rows=mysqli_fetch_array($result))
		 {
									  
				 $_SESSION['classname']=$rows['class_name'];
				 $_SESSION['classarm']=$rows['class_arm'];
				echo $_SESSION['classname'].$_SESSION['classarm'];
		
	$searchquery = "select concat(lname,' ',fname) as Name,current_class as Class, gender as Gender, payment_status as Payment, rollnum as Roll, age as Age, status as Status,pics as imageurl,student_id as stid from student_tab where current_class='".$_SESSION['classname']."' and current_arm='".$_SESSION['classarm']."' and clientapp_id='".$_SESSION['clientappid']."' order by student_id";
	$searchData=mysqli_query($con,$searchquery) or die("database error:". mysqli_error($con));
	$data = array();
	 if(mysqli_num_rows($searchData))
   {$sn=0;
   		$output .='<thead style="background:#39C; color:#FFF;">
                      <tr>
                      	
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Class</th>                        
                        <th>Gender</th>                        
                        <th>Age</th>
                        <th>Status</th>
                        <th>Payment</th>
                      	<th>Image</th>
                        <th>Action</th>
                        
                      </tr></thead><tbody>';
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	$sn++;
	   		//$data[] = $rows;
			if ($rows['Status']==1){$rows['Status']='Active';}else{$rows['Status']='Inactive';}
			if ($rows['Payment']==1){$rows['Payment']='Payed';}else{$rows['Payment']='Not-Paid';}
		    $output .='<tr><td>'.$rows['Name'].'</td><td>'.$rows['Roll'].'</td><td>'.$rows['Class'].'</td><td>'.$rows['Gender'].'</td><td>'.$rows['Age'].'</td><td>'.$rows['Status'].'</td><td>'.$rows['Payment'].'</td><td><img src="../'.$rows['imageurl'].'" width="50px" height="50px" class="hoverImage img-circle"></td><td><a href="#" class="add btn btn-xs btn-primary" id="viewbut" data-id="'.$rows['stid'].'" data-toggle="tooltip" data-placement="bottom" title="View Full Record"><i class="fa fa-eye"></i></a></td></tr>';
		}
		/*$searchData=array("sEcho" => 1,
			"iTotalRecords" => count($data),
			"iTotalDisplayRecords" => count($data),
			"aaData"=>$data);
	   echo json_encode($searchData);*/
	   $output .='</tbody>';
 		$output .='<tfoot style="background:#39C; color:#FFF;">
                      <tr>
                       
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Class</th>                        
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Image</th>
                        <th>Action</th>
                       
                      </tr>
                    </tfoot>';
   }
   
   else {
	   $output .= "<tr><td>No Record Yet</td></tr>";
   }
		
		echo $output;
	 }
}
	?>    