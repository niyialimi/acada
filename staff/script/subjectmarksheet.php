<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
$stdclasspick=mysqli_real_escape_string($con,$_POST['stdclasspick']);  
$msatterm=mysqli_real_escape_string($con,$_POST['msatterm']);
$msattsession=mysqli_real_escape_string($con,$_POST['msattsession']);
$msscoretype=mysqli_real_escape_string($con,$_POST['msscoretype']);
$clsubname=mysqli_real_escape_string($con,$_POST['clsubname']);  

if($clsubname)
{
	$logsql="select * from class_tab where class_id='$stdclasspick' and staff_id='".$_SESSION['staffid']."' and clientapp_id='".$_SESSION['clientappid']."'";
	$result=mysqli_query($con,$logsql);
	while($rows=mysqli_fetch_array($result))
		 {
									  
									   $_SESSION['classname']=$rows['class_name'];
									   $_SESSION['classarm']=$rows['class_arm'];
									   
	$count=0;
	$sn=1;
  // $classselect=$_POST['classselect'];	
	$searchquery = "select student_tab.*,scoresheet_tab.* from student_tab inner join scoresheet_tab on student_tab.student_id=scoresheet_tab.student_id where scoresheet_tab.student_class='".$_SESSION['classname']."' and student_tab.current_arm='".$_SESSION['classarm']."' and scoresheet_tab.exam_session='$msattsession' and scoresheet_tab.exam_term='$msatterm' and scoresheet_tab.exam_subject='$clsubname' and scoresheet_tab.exam_type='$msscoretype' and scoresheet_tab.clientapp_id='".$_SESSION['clientappid']."' group by scoresheet_tab.student_id";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   {
	   $output .='<thead>
                      <tr style="background:#39C; color:#FFF;">
                      	<th>S/N</th>
                        <th width="15%">Roll Number</th>
                        <th>Student Name</th>
                        <th width="20%">Mark Obtained</th>
						<th width="20%">Action</th>
                      
                      </tr>
                    </thead>';
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	
		   	$studentid=$rows['student_id'];
			$_SESSION['rollnum']=$rows['rollnum'];
			$_SESSION['lname']=$rows['lname'];
			$_SESSION['fname']=$rows['fname'];
			$_SESSION['rollnum']=$rows['rollnum'];
			$fullname=$_SESSION['lname']." ".$_SESSION['fname'];
			$msclass=$rows['current_class'];
			$msclassarm=$rows['current_arm'];
			
	         $output.='<tbody>
                    <tr>
                        <td>'.$sn.'</td>
                        <td>'.$_SESSION['rollnum'].'<input type="hidden" name="studentid" id="studentid" value="'.$studentid.'"></td>
                        <td>'.$_SESSION['lname']." ".$_SESSION['fname'].'
						<input type="hidden" name="stdname" id="stdname" value="'.$fullname.'">
						</td>
                        <td>'.$rows['mark'].'
						<input type="hidden" name="msclass" id="msclass" value="'.$msclass.'">
						<input type="hidden" name="msclassarm" id="msclasssrm" value="'.$msclassarm.'">
						<input type="hidden" name="scoreid" id="scoreid" value="'.$rows['score_id'].'">
						</td>
						<td><a href="#" class="add btn btn-xs btn-info" id="scoreeditbut" data-id="'.$studentid.'" data-scoreid="'.$rows['score_id'].'" data-toggle="tooltip" data-placement="bottom" title="Edit Student Mark"><i class="fa fa-pencil-square-o"></i></a></td>
                         </tr>';
                      
       $count++;  $sn++;
	   }
	  
	  
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