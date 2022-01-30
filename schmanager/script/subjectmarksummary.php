<?php
require_once('../../req/config.php');
session_start();
$selectquery = "select clientapp_name,clientapp_logo from setting_tab where clientapp_id='".$_SESSION['clientappid']."'";
$selectData=mysqli_query($con,$selectquery) or die("database error:". mysqli_error($con));			
	if(mysqli_num_rows($selectData))
	   {
		   echo '	<div class="table-responsive"><table width="70%">
								<thead><tr align="center">
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								</thead>';
		   while($rows=mysqli_fetch_assoc($selectData))
		   {	
		   echo '<thead><tr align="center"><strong><font style="font-size:20px"><img src="../'.$rows['clientapp_logo'].'" width="100px" height="100px" class="img-thumbnail"></strong></font></tr></thead>	
							<tbody>
								<tr>
									<td align="center"><strong>'.$rows['clientapp_name'].'</strong></td>
									</tr>
							</tbody>';
		   }
		   
								
							echo '</table></div><p>&nbsp;</p>';
	   }
	   
if(isset ($_POST["atarm"]) && isset ($_POST["atclass"]) && isset ($_POST["newdata"]))
{	
$stdclass=$_POST["atclass"];
$examsession=$_POST["atsession"];
$examterm=$_POST["atterm"];
$arm=$_POST["atarm"];
$examsubject=$_POST["newdata"];
echo '<div class="row"><div class="col-md-2"></div><div class="col-md-3">Class: <strong>'.$stdclass.'</strong></div><div class="col-md-2">Arm/Section: <strong>'.$arm.'</strong></div><div class="col-md-3">Subject: <strong>'.$examsubject.'</strong></div></div><div class="col-md-2"></div><p>&nbsp;</p>';
if ($examterm=="First")
{
$squery="SELECT Concat(student_tab.lname,' ',student_tab.fname) AS 'Student', student_tab.student_id AS 'ID',student_tab.rollnum AS 'Number', SUM(CASE WHEN scoresheet_tab.exam_type = 'FirstCA' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstTest',SUM(CASE WHEN scoresheet_tab.exam_type = 'SecondCA' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'SecondTest', SUM(CASE WHEN scoresheet_tab.exam_type = 'termexam' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'Examscore', SUM(CASE WHEN exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) as 'Total' FROM student_tab inner join scoresheet_tab on student_tab.student_id=scoresheet_tab.student_id where scoresheet_tab.student_class ='$stdclass' and scoresheet_tab.exam_session='$examsession' and scoresheet_tab.exam_term='$examterm' and scoresheet_tab.exam_subject='$examsubject' and student_tab.current_arm='$arm' and scoresheet_tab.clientapp_id='".$_SESSION['clientappid']."' GROUP BY scoresheet_tab.student_id" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			
			$count=mysqli_num_rows($result);
			echo '<div class="table-responsive"><table width="70%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td>&nbsp;</td><td colspan="5">First Term Report</td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Student Name</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total(%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				$student=$rows['Student'];
				$fFirstca=$rows['FirstTest'];
				$fSecondca=$rows['SecondTest'];
				$fExamscore=$rows['Examscore'];
				$fTotal=$rows['Total'];
				
				$cum=round($fTotal,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
				echo '<tr><td>'.$student.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$fTotal.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
			
				//echo '<tr>'.$rw.$rw2.$rw3.$rw1.$rw4.$rw5.'</tr>';
			}
			
			echo '</tbody>
				<tr align="center"><td colspan="18"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
			</table><div>';
		}
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Mark Recorded For Selected Class or Wrong Filter Selected</td></tr></table></div>';//die (mysqli_error($con));
		}
}
else if($examterm=="Second")
{
	$squery="SELECT Concat(student_tab.lname,' ',student_tab.fname) AS 'Student', student_tab.student_id AS 'ID',student_tab.rollnum AS 'Number', SUM(CASE WHEN scoresheet_tab.exam_type = 'FirstCA' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstTermCA1',SUM(CASE WHEN scoresheet_tab.exam_type = 'SecondCA' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstTermCA2',SUM(CASE WHEN scoresheet_tab.exam_type = 'termexam' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstExamscore', SUM(CASE WHEN exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) as 'FirstTotal', SUM(CASE WHEN scoresheet_tab.exam_type = 'FirstCA' and scoresheet_tab.exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) AS 'SedcondTermCA1',SUM(CASE WHEN scoresheet_tab.exam_type = 'SecondCA' and scoresheet_tab.exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) AS 'SedcondTermCA2', SUM(CASE WHEN scoresheet_tab.exam_type = 'termexam' and scoresheet_tab.exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) AS 'SecondExamscore', SUM(CASE WHEN exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) as 'SecondTotal' FROM student_tab inner join scoresheet_tab on student_tab.student_id=scoresheet_tab.student_id where scoresheet_tab.student_class ='$stdclass' and scoresheet_tab.exam_session='$examsession' and scoresheet_tab.exam_subject='$examsubject' and student_tab.current_arm='$arm' and scoresheet_tab.clientapp_id='".$_SESSION['clientappid']."' GROUP BY scoresheet_tab.student_id" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			
			$count=mysqli_num_rows($result);
			echo '<table width="70%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr align="center"><td>&nbsp;</td><td colspan="4"><strong>First Term Report</strong></td><td colspan="5"><strong>Second Term Report</strong></td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Student Name</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td><strong>Avg (%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				$student=$rows['Student'];
				$fFirstca=$rows['FirstTermCA1'];
				$fSecondca=$rows['FirstTermCA2'];
				$fExamscore=$rows['FirstExamscore'];
				$fTotal=$rows['FirstTotal'];
				
				$sFirstca=$rows['SedcondTermCA1'];
				$sSecondca=$rows['SedcondTermCA2'];
				$sExamscore=$rows['SecondExamscore'];
				$sTotal=$rows['SecondTotal'];
				
				$cum=($fTotal+$sTotal)/2;				
				$cum=round($cum,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
		echo '<tr><td>'.$student.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong><strong>'.$fTotal.'</strong></strong></td><td align="center">'.$sFirstca.'</td><td align="center">'.$sSecondca.'</td><td align="center">'.$sExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong><strong>'.$sTotal.'</strong></strong></td><td align="center"><strong>'.$cum.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
			
				//echo '<tr>'.$rw.$rw2.$rw3.$rw1.$rw4.$rw5.'</tr>';
			}
			
			echo '</tbody>
				<tr align="center"><td colspan="18"><strong>Grade Scale<br>70-100=A,   60-69.9=B,   50-59.9=C,   40-49.9=D,   30-39.9=E,   <30=F</strong> </td></tr>
			</table><div>';
		}
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Mark Recorded For Selected Class or Wrong Filter Selected</td></tr></table></div>';//die (mysqli_error($con));
		}
}

else if ($examterm=="Third")
{
$squery="SELECT Concat(student_tab.lname,' ',student_tab.fname) AS 'Student', student_tab.student_id AS 'ID',student_tab.rollnum AS 'Number', SUM(CASE WHEN scoresheet_tab.exam_type = 'FirstCA' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstTermCA1',SUM(CASE WHEN scoresheet_tab.exam_type = 'SecondCA' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstTermCA2',SUM(CASE WHEN scoresheet_tab.exam_type = 'termexam' and scoresheet_tab.exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) AS 'FirstExamscore', SUM(CASE WHEN exam_term='First' THEN scoresheet_tab.mark ELSE '0' END) as 'FirstTotal', SUM(CASE WHEN scoresheet_tab.exam_type = 'FirstCA' and scoresheet_tab.exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) AS 'SedcondTermCA1',SUM(CASE WHEN scoresheet_tab.exam_type = 'SecondCA' and scoresheet_tab.exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) AS 'SedcondTermCA2', SUM(CASE WHEN scoresheet_tab.exam_type = 'termexam' and scoresheet_tab.exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) AS 'SecondExamscore', SUM(CASE WHEN exam_term='Second' THEN scoresheet_tab.mark ELSE '0' END) as 'SecondTotal', SUM(CASE WHEN scoresheet_tab.exam_type = 'FirstCA' and scoresheet_tab.exam_term='Third' THEN scoresheet_tab.mark ELSE '0' END) AS 'ThirdTermCA1',SUM(CASE WHEN scoresheet_tab.exam_type = 'SecondCA' and scoresheet_tab.exam_term='Third' THEN scoresheet_tab.mark ELSE '0' END) AS 'ThirdTermCA2', SUM(CASE WHEN scoresheet_tab.exam_type = 'termexam' and scoresheet_tab.exam_term='Third' THEN scoresheet_tab.mark ELSE '0' END) AS 'ThirdExamscore', SUM(CASE WHEN exam_term='Third' THEN scoresheet_tab.mark ELSE '0' END) as 'ThirdTotal' FROM student_tab inner join scoresheet_tab on student_tab.student_id=scoresheet_tab.student_id where scoresheet_tab.student_class ='$stdclass' and scoresheet_tab.exam_session='$examsession' and scoresheet_tab.exam_subject='$examsubject' and student_tab.current_arm='$arm' and scoresheet_tab.clientapp_id='".$_SESSION['clientappid']."' GROUP BY scoresheet_tab.student_id" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			$count=mysqli_num_rows($result);
			
			echo '<div class="table-responsive"><table width="70%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr align="center"><td>&nbsp;</td><td colspan="4"><strong>First Term Report</strong></td><td colspan="4"><strong>Second Term Report</strong></td><td colspan="6"><strong>Third Term Report</strong></td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Student Name</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td><strong>Avg (%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				$student=$rows['Student'];				
				$fFirstca=$rows['FirstTermCA1'];
				$fSecondca=$rows['FirstTermCA2'];
				$fExamscore=$rows['FirstExamscore'];
				$fTotal=$rows['FirstTotal'];
				//$FirstExamscore[]=$rows['FirstExamscore'];
				//$FirstTotal[]=$rows['Total'];
				
				
				$sFirstca=$rows['SedcondTermCA1'];
				$sSecondca=$rows['SedcondTermCA2'];
				$sExamscore=$rows['SecondExamscore'];
				$sTotal=$rows['SecondTotal'];
				
				$tFirstca=$rows['ThirdTermCA1'];
				$tSecondca=$rows['ThirdTermCA2'];
				$tExamscore=$rows['ThirdExamscore'];
				$tTotal=$rows['ThirdTotal'];
				
				$cum=($fTotal+$sTotal+$tTotal)/3;
				$cum=round($cum,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
		echo '<tr><td width="15%">'.$student.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$fTotal.'</strong></td><td align="center">'.$sFirstca.'</td><td align="center">'.$sSecondca.'</td><td align="center">'.$sExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$sTotal.'</strong></td><td align="center">'.$tFirstca.'</td><td align="center">'.$tSecondca.'</td><td align="center">'.$tExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$tTotal.'</strong></td><td align="center"><strong>'.$cum.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
				
		
			}
			echo '</tbody>
				<tr align="center"><td colspan="18"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
			</table></div>';
			//echo '<table class="table"></table>';
		}
			
		
		else {
			echo '<table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table>'; //die (mysqli_error($con));
		}
 }

}
else
{
	echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data Fetched From Database, Select Options To Fetch Data</td></tr></table></div>';
}
?>