<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
$stdid=$_POST['id'];
$stdscoreid=$_POST['scoreid'];  
//$stdid=53;
//$stdscoreid=1; 

if($stdid && $stdscoreid)
{
	
	$searchquery = "select * from scoresheet_tab  where score_id='".$stdscoreid."' and student_id='".$stdid."'  and clientapp_id='".$_SESSION['clientappid']."'";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   {
	   $output .='<form action="eachmarkedit.php" id="markform" method="post" enctype="multipart/form-data">
	   <table class="table table-bordered">';
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	
		   	$studentid=$rows['student_id'];
	         $output.='<tbody>
			 <tr style="background:#39C; color:#FFF;">
                      	<td colspan="2">'.$rows['exam_type'].' Score</td> 
                      </tr>
                    <tr><td>Old Score</td><td><input type="text" name="oldscore" id="oldscore" value="'.$rows['mark'].'" readonly></td></tr>
					<tr><td>New Score</td><td><input type="text" name="newscore" id="newscore" value="">
					<input type="hidden" name="stdid" id="stdid" value="'.$stdid.'">
					<input type="hidden" name="oldscoreid" id="oldscoreid" value="'.$stdscoreid.'">
					</td></tr>';
                      
	   }
	  
	  
   }else {
   
   $output.='<tr>
    <td colspan="8" align="center"><i class="fa fa-times"></i>No Data for Class Selected Yet</td>
    </tr> </tbody></table></form>';
    
    } 
	
}
else
{
	$output.="No data Available";
}
echo $output;

?>