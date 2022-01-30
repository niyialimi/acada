<?php
require_once('../../req/config.php');
session_start();
$selectquery = "select * from student_tab where student_id='".$_POST["stdid"]."' and clientapp_id='".$_SESSION['clientappid']."'";
					$selectData=mysqli_query($con,$selectquery) or die("database error:". mysqli_error($con));
					
					if(mysqli_num_rows($selectData))
					   {
						   while($rows=mysqli_fetch_assoc($selectData))
							   {	
							   		$_SESSION['lname']=$rows['lname'];
									$_SESSION['fname']=$rows['fname'];
									$_SESSION['pics']=$rows['pics'];
									$_SESSION['csession']=$rows['current_session'];
									$_SESSION['admyear']=$rows['admission_year'];
									$_SESSION['cterm']=$rows['current_term'];
									$_SESSION['stdno']=$rows['rollnum'];
									$_SESSION['cclass']=$rows['current_class'];
									
							   }
						echo '	<div class="table-responsive"><table width="75%" class="" style="width:75%">	
								<thead><tr align="center"><strong><font style="font-size:20px">'.$_SESSION['lname']." ".$_SESSION['fname'].'</strong></font></tr></thead>
								<thead><tr align="center">
									<td colspan="3">&nbsp;</td>									
								</tr>
								</thead>	
							<tbody>
								<tr>
									<td width="24%" rowspan="5" align="left"><img src="../'.$_SESSION['pics'].'" width="100px" height="100px" class="img-thumbnail"></td>
									<td width="38%">Student Number:   <strong>'.$_SESSION['stdno'].'</strong></td>
									<td width="38%">Session:<strong>'.$_POST["attendsession"].' Academic Year</strong></td>
								</tr>
								<tr>
									<td>Admission Year:  <strong>'.$_SESSION['admyear'].'</strong></td>
									<td>Term: <strong>'.$_POST["attendterm"].'</strong></td>
								</tr>
								<tr>
									<td>Class:  <strong>'.$_POST["attendclass"].'</strong></td>
									<td>Cummulative Average: </td>
								</tr>
								
								<tr>
								
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								</tbody>
								</table></div>
							<p>&nbsp;</p>
							';
				 	  }
if(isset ($_POST["attendterm"]) && isset ($_POST["attendclass"]) && isset ($_POST["stdid"]) && isset ($_POST["attendsession"]))
{	
$class=$_POST["attendclass"];
$examsession=$_POST["attendsession"];
$examterm=$_POST["attendterm"];
if ($examterm=="First")
{
	 
$id=$_POST["stdid"];

$squery="SELECT exam_subject AS 'Subject', SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTest',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='First' THEN mark ELSE '0' END) AS 'SecondTest',SUM(CASE WHEN exam_type = 'termexam' and exam_term='First' THEN mark ELSE '0' END) AS 'Examscore', SUM(mark) as 'Total' FROM scoresheet_tab where student_id = '$id' and student_class ='$class' and exam_session='$examsession' and exam_term='$examterm' and clientapp_id='".$_SESSION['clientappid']."' GROUP BY exam_subject" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			
			$count=mysqli_num_rows($result);
			echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td>&nbsp;</td><td colspan="5">First Term Report</td></tr>';
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Subject</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total(%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				
				$subject=$rows['Subject'];
				$fFirstca=$rows['FirstTest'];
				$fSecondca=$rows['SecondTest'];
				$fExamscore=$rows['Examscore'];
				$fTotal=$rows['Total'];
				
				$cum=round($fTotal,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
				echo '<tr><td>'.$subject.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$fTotal.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
			
				//echo '<tr>'.$rw.$rw2.$rw3.$rw1.$rw4.$rw5.'</tr>';
			}
			
			echo '</tbody>
				<tr align="center"><td colspan="15"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
				
			</table></div>';
		}
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table></div>';//die (mysqli_error($con));
		}
}
else if ($examterm=="Second")
{
	$id=$_POST["stdid"];
$squery="SELECT exam_subject AS 'Subject',SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA1',
SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA2',SUM(CASE WHEN exam_type = 'termexam' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstExamscore',SUM(CASE WHEN exam_term='First' THEN mark ELSE '0' END)  as 'FirstTotal', SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA1',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA2', SUM(CASE WHEN exam_type = 'termexam' and exam_term='Second' THEN mark ELSE '0' END) AS 'SecondExamscore', SUM(CASE WHEN exam_term='Second' THEN mark ELSE '0' END)  as 'SecondTotal' FROM scoresheet_tab where student_class ='$class' and student_id = '$id' and exam_session='$examsession' and clientapp_id='".$_SESSION['clientappid']."' Group By exam_subject" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			$count=mysqli_num_rows($result);
			
			echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr align="center"><td>&nbsp;</td><td colspan="4"><strong>First Term Report</strong></td><td colspan="4"><strong>Second Term Report</strong></td><td colspan="6"><strong>&nbsp;</strong></td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Subject</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td><strong>Avg (%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				
				$subject=$rows['Subject'];
				
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
				
		echo '<tr><td>'.$subject.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong><strong>'.$fTotal.'</strong></strong></td><td align="center">'.$sFirstca.'</td><td align="center">'.$sSecondca.'</td><td align="center">'.$sExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong><strong>'.$sTotal.'</strong></strong></td><td align="center"><strong>'.$cum.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
										
											
			}
			echo '</tbody>
				<tr align="center"><td colspan="15"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
				
			</table></div>';
		}
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table></div>';//die (mysqli_error($con));
		}
}

else if ($examterm=="Third")
{
	$id=$_POST["stdid"];
$squery="SELECT exam_subject AS 'Subject',SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA1',
SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA2',SUM(CASE WHEN exam_type = 'termexam' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstExamscore',SUM(CASE WHEN exam_term='First' THEN mark ELSE '0' END)  as 'FirstTotal', SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA1',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA2', SUM(CASE WHEN exam_type = 'termexam' and exam_term='Second' THEN mark ELSE '0' END) AS 'SecondExamscore', SUM(CASE WHEN exam_term='Second' THEN mark ELSE '0' END)  as 'SecondTotal',SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='Third' THEN mark ELSE '0' END) AS 'ThirdTermCA1',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='Third' THEN mark ELSE '0' END) AS 'ThirdTermCA2',SUM(CASE WHEN exam_type = 'termexam' and exam_term='Third' THEN mark ELSE '0' END) AS 'ThirdExamscore', SUM(CASE WHEN exam_term='Third' THEN mark ELSE '0' END)  as 'ThirdTotal' FROM scoresheet_tab where student_class ='$class' and student_id = '$id' and exam_session='$examsession' and clientapp_id='".$_SESSION['clientappid']."' Group By exam_subject" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			$count=mysqli_num_rows($result);
			
			echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%; marging-right:10px;"><tbody>';
			echo '<tr align="center"><td>&nbsp;</td><td colspan="4"><strong>First Term Report</strong></td><td colspan="4"><strong>Second Term Report</strong></td><td colspan="4"><strong>Third Term Report</strong></td><td colspan="2">&nbsp;</td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Subject</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td><strong>Avg (%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				$subject=$rows['Subject'];
				
				$fFirstca=$rows['FirstTermCA1'];
				$fSecondca=$rows['FirstTermCA2'];
				$fExamscore=$rows['FirstExamscore'];
				$fTotal=$rows['FirstTotal'];
				
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
				
		echo '<tr><td>'.$subject.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$fTotal.'</strong></td><td align="center">'.$sFirstca.'</td><td align="center">'.$sSecondca.'</td><td align="center">'.$sExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$sTotal.'</strong></td><td align="center">'.$tFirstca.'</td><td align="center">'.$tSecondca.'</td><td align="center">'.$tExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$tTotal.'</strong></td><td align="center"><strong>'.$cum.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
				
		
			}
			echo '</tbody>
				<tr align="center"><td colspan="15"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
				
			</table></div>';
			//echo '<table class="table"></table>';
		}
			
		
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table></div>'; //die (mysqli_error($con));
		}
 }

}else
{
	echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data Fetched From Database, Select Options To Fetch Data</td></tr></table></div>';
}
?>