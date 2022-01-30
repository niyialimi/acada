<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
$attclass=mysqli_real_escape_string($con,$_POST['attclass']);  
$attmonth=mysqli_real_escape_string($con,$_POST['attmonth']);  
//$attclass='Junior Secondary School 1';
//$attmonth='January';
$attsession='2018/2019';
if($attclass)
{
	$logsql="select * from class_tab where class_id='$attclass' and staff_id='".$_SESSION['staffid']."' ";
$result=mysqli_query($con,$logsql);

while($rows=mysqli_fetch_array($result))
		 {
									  
									   $_SESSION['classname']=$rows['class_name'];
									   $_SESSION['classarm']=$rows['class_arm'];
									   
									   echo $_SESSION['classname'].$_SESSION['classarm'];

	$count=0;
	$sn=1;
  // $classselect=$_POST['classselect'];	
	//$searchquery = "select * from student_tab where current_class='".$_SESSION['classname']."' and current_arm='".$_SESSION['classarm']."' and clientapp_id='".$_SESSION['clientappid']."' ";
	$searchquery = "select student_tab.*,stdattend_tab.* from student_tab inner join stdattend_tab on student_tab.student_id=stdattend_tab.student_id where student_tab.current_class='".$_SESSION['classname']."' and stdattend_tab.month='$attmonth' and stdattend_tab.csession='$attsession' and stdattend_tab.clientapp_id='".$_SESSION['clientappid']."' ";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   {
	   $output .='<thead>
                     
                    <tr>
						<th>S/N</th>
                    	<th>Student Number</th>
                        <th>Student Name</th>
						<th>Current Session</th>
                        <th>Week Day</th>
                        <th>Attendance Status</th>
                    </tr>
                    </thead>
                      
                      </tr>
					  
                    </thead>';
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	
		    //$studentid=$rows['clientapp_id'];
		    $studentid=$rows['student_id'];			
			$_SESSION['lname']=$rows['lname'];
			$_SESSION['fname']=$rows['fname'];
			$_SESSION['rollnum']=$rows['rollnum'];
			$_SESSION['attstatus']=$rows['attendance_status'];
			if ($_SESSION['attstatus']==1){$_SESSION['attstatus']='Present';}else{$_SESSION['attstatus']='Absent';}
			$class=$rows['current_class'];
			$date=date('l');
					
			$fullname=$_SESSION['lname']." ".$_SESSION['fname'];
			
	         $output.='<tbody>
			 	
                    <tr>
                        <td>'.$sn.'</td>
                        <td>'.$_SESSION['rollnum'].'</td>
						<td>'.$fullname.'</td>
						<td>'.$rows['csession'].'</td>
                        <td>'.$rows['day'].'</td>
						
                        <td> '.$_SESSION['attstatus'].' </td>
                         </tr>';
                      
       $count++;  $sn++;
	   }
	   
	   $output .='<tfoot>
                      <tr>
                       
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Student Roll</th>
                        <th>Day</th>
                        <th>Attendance Status</th>                   
                      </tr>
                     
                    </tfoot>';
   }else {
   
   $output.='<tr>
    <td colspan="8" align="center"><i class="fa fa-times"></i>No Data for Class Selected Yet</td>
    </tr> </tbody>';
    
   	}
    } 
}
else
{
	$output.="No data Available";
}
echo $output;

?>