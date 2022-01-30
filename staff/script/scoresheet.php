<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
$clname=mysqli_real_escape_string($con,$_POST['clname']);  
$classarm=mysqli_real_escape_string($con,$_POST['classarm']);
$subname=mysqli_real_escape_string($con,$_POST['subname']);  

if($clname)
{
	$logsql="select * from class_tab where class_id='$clname' and staff_id='".$_SESSION['staffid']."' ";
	$result=mysqli_query($con,$logsql);
	while($rows=mysqli_fetch_array($result))
		 {
									  
									   $_SESSION['classname']=$rows['class_name'];
									   $_SESSION['classarm']=$rows['class_arm'];
									   
	$count=0;
	$sn=1;
  // $classselect=$_POST['classselect'];	
	$searchquery = "select * from student_tab where current_class='".$_SESSION['classname']."' and current_arm='".$_SESSION['classarm']."'";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   {
	   $output .='<thead style="background:#39C; color:#FFF;">
                      <tr>
                      	<th>S/N</th>
                        <th width="15%">Roll Number</th>
                        <th>Student Name</th>
                        <th width="20%">Mark Obtained</th>
                      
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
			$class=$rows['current_class'];
			$classarm=$rows['current_arm'];
			
	         $output.='<tbody>
                    <tr>
                        <td>'.$sn.'</td>
                        <td>'.$_SESSION['rollnum'].'<input type="hidden" name="studentid[]" id="studentid" value="'.$studentid.'"></td>
                        <td>'.$_SESSION['lname']." ".$_SESSION['fname'].'
						<input type="hidden" name="stdname[]" id="stdname" value="'.$fullname.'">
						</td>
                        <td><input type="text" class="form-control" name="mark[]" id="mark" value="" required>
						<input type="hidden" name="class[]" id="class" value="'.$class.'">
						<input type="hidden" name="classarm[]" id="class" value="'.$classarm.'">
						</td>
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