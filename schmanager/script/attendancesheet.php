<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
if(isset($_POST['stdatclass']) && isset($_POST['stdatarm']))
{
	$count=0;
	$sn=1;
  // $classselect=$_POST['classselect'];	
	$searchquery = "select * from student_tab where clientapp_id='".$_SESSION['clientappid']."' and current_class='".$_POST['stdatclass']."' and current_arm='".$_POST['stdatarm']."' order by student_id";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   {
	   $output .='<thead style="background:#39C; color:#FFF;">
                      <tr>
                      	
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Student Roll</th>
                        <th>Day</th>
                        <th>Attendance Status</th>
                      
                      </tr>
                    </thead>';
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	
		    $studentid=$rows['clientapp_id'];
		    $studentid=$rows['student_id'];			
			$_SESSION['lname']=$rows['lname'];
			$_SESSION['fname']=$rows['fname'];
			$_SESSION['oname']=$rows['oname'];
			$_SESSION['rollnum']=$rows['rollnum'];
			$class=$rows['current_class'];
			$date=date('l');
					
			$fullname=$_SESSION['lname']." ".$_SESSION['fname'];
			
	         $output.='<tbody>
                    <tr>
                        <td>'.$sn.'</td>
                        <td>'.$fullname.'</td>
                        <input type="hidden" name="stdname[]" id="stdname" value="'.$fullname.'">
                        <input type="hidden" name="studentid[]" id="studentid" value="'.$studentid.'">
                        <td>'.$rows['rollnum'].'</td>
                        <td>'.$date.'</td>
						<input type="hidden" name="class[]" id="class" value="'.$class.'">
                        <td>                 
                      <input type="radio" name="attstatus['.$count.']" class="minimal" value="P" checked>                      
                     	Present                    
                    &nbsp;&nbsp;                    
                      <input type="radio" name="attstatus['.$count.']" class="minimal" value="A">
                      Absent</td>
                         </tr>';
                      
       $count++;  $sn++;
	   }
	   
	   $output .='<tfoot style="background:#39C; color:#FFF;">
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
else
{
	$output.="No data Available";
}

echo $output;

?>