<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';

if(isset($_POST['stafftype']))
{
	$count=0;
	$sn=1;
	if($_POST['stafftype']=="All Staff")
	{
	$searchquery = "select * from staff_tab where clientapp_id='".$_SESSION['clientappid']."' order by staff_id";
  // $classselect=$_POST['classselect'];	
	
	}else
	{		
	$searchquery = "select * from staff_tab where clientapp_id='".$_SESSION['clientappid']."' and staff_type='".$_POST['stafftype']."' order by staff_id";
	}
	$searchData=mysqli_query($con,$searchquery);
 if(mysqli_num_rows($searchData))
   {
	   $output .='
	   			<thead>
                      <tr>
                      	
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Staff Number</th>
                        <th>Day</th>
                        <th>Attendance Status</th>
                      
                      </tr>
                    </thead>';
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	
		    $studentid=$rows['clientapp_id'];
		    $staffid=$rows['staff_id'];			
			$_SESSION['staflname']=$rows['staff_lname'];
			$_SESSION['staffname']=$rows['staff_fname'];
			$_SESSION['stafoname']=$rows['staff_oname'];
			$_SESSION['stafnum']=$rows['staff_num'];
			$date=date('l');
					
			$fullname=$_SESSION['staflname']." ".$_SESSION['staffname'];
			
	         $output.='<tbody>
                    <tr>
                        <td>'.$sn.'</td>
                        <td>'.$fullname.'</td>
                        <input type="hidden" id="staffname" name="staffname[]" id="staffname" value="'.$fullname.'">
                        <input type="hidden" id="staffid" name="staffid[]" id="staffid" value="'.$staffid.'">
                        <td>'.$rows['staff_num'].'</td>
                        <td>'.$date.'</td>
                        <td>                 
                      <input type="radio" id="attstatus" name="attstatus['.$count.']" class="minimal" value="P" checked>                      
                     	Present                    
                    &nbsp;&nbsp;                    
                      <input type="radio" id="attstatus" name="attstatus['.$count.']" class="minimal" value="A">
                      Absent</td>
                         </tr>';
                      
         $count++;$sn++;
	   }
	   $output .='<tfoot>
                      <tr>
                       
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Staff Number</th>
                        <th>Day</th>
                        <th>Attendance Status</th>                   
                      </tr>
                      ';
	   
   }else {
   
   $output.='<tr>
    <td colspan="8" align="center"><i class="fa fa-times"></i>No Data for Employee Type Selected Yet</td>
    </tr> </tbody>';
    
    } 
	
}
else
{
	$output.="No data Available";
}
echo $output;

?>