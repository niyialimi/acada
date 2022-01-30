<?php
session_start();
require_once("../../req/config.php");
	$id=$_POST['id'];
	//$id=2;
	$viewquery = "select class_tab.*,concat(staff_tab.staff_lname,' ',staff_tab.staff_fname) as 'Teacher' from class_tab inner join staff_tab on class_tab.staff_id=staff_tab.staff_id where class_tab.class_id='$id' and class_tab.clientapp_id='".$_SESSION['clientappid']."'";
	$result=mysqli_query($con,$viewquery);
	$suboutput='';
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
				$status=$rows['status'];if($status==1){$status='Active';}else{$status='Inactive';}
				$subjectstaken=explode(',',$rows['subject_taken']);
				$count=count($subjectstaken);
				foreach ($subjectstaken as $subjects)
				{
					if($subjects !='')
					{
						$suboutput.=$subjects."<br>";
					}else $suboutput.='No Subject Registered For Class Yet';
				}
				echo '<table width=100% class=table table-bordered table-striped id=table>
				<table id="stdtable1" class="table table-bordered table-striped" style="width:100%;">
					<thead style="background:#39C; color:#FFF;">
					<tr>
					<th colspan="2">Class Details</th>
					</tr>
					</thead>
					<tbody>
					
					<tr>
						<td width="50%">
						Class Name
						</td>
						<td width="50%">
						'.$rows['class_name'].'
						</td>
					</tr>
					
					<tr>
						<td width="50%">
						Class Alias
						</td>
						<td width="50%">
						'.$rows['class_alias'].'
						</td>
					</tr>
					
					<tr>
						<td>
						Class Section/Arm
						</td>
						<td>
						'.$rows['class_arm'].'
						</td>
					</tr>
					<tr>
						<td>
						Class Category
						</td>
						<td>
						'.$rows['class_category'].'
						</td>
					</tr>
					<tr>
						<td>
						Class Teacher
						</td>
						<td>
						'.$rows['Teacher'].'
						</td>
					</tr>
					
					<tr>
						<td>
						Subject Offered by Class
						</td>
						<td>
						'.$suboutput.'
						</td>
					</tr>
					<tr>
						<td>
						Class Status
						</td>
						<td>
						'.$status.'
						</td>
					</tr>';
					$countnum = "select count(current_class) as 'Number' from student_tab where current_class='".$rows['class_name']."' and current_arm='".$rows['class_arm']."' and clientapp_id='".$_SESSION['clientappid']."'";
	$result2=mysqli_query($con,$countnum);
	//$num=mysqli_num_rows($result2);
	while ($rows = mysqli_fetch_array($result2))
			{
	
					echo '<tr>
						<td>
						Number Of Student
						</td>
						<td>
						'.$rows['Number'].'
						</td>';
			}
					echo '</tr>
					</tbody>
				</table>';
			}
		}
?>