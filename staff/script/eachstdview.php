<?php
session_start();
require_once("../../req/config.php");
	$id=$_POST['id'];
	//$id=2;
	$viewquery = "select * from student_tab where student_id='$id' and clientapp_id='".$_SESSION['clientappid']."'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
				
				
				$_SESSION['lname']=$rows['lname'];
				$_SESSION['fname']=$rows['fname'];
				
				
				echo '<table width=100% class=table table-bordered table-striped id=table>
				<table id="stdtable1" class="table table-bordered table-striped" style="width:100%;">
					<thead style="background:#39C; color:#FFF;">
					<tr>
					<th colspan="2">Student Details</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="2">
						<img src=../'.$rows['pics'].' style="width:150px; height:150px;" class="img-thumbnail" alt="Student Image" />
						</td>
					</tr>
					<tr>
						<td width="50%">
						Full Name
						</td>
						<td width="50%">
						'.$rows['lname']." ".$rows['fname']." ".$rows['oname'].'
						</td>
					</tr>
					<tr>
						<td>
						Student Number
						</td>
						<td>
						'.$rows['rollnum'].'
						</td>
					</tr>
					<tr>
						<td>
						Gender
						</td>
						<td>
						'.$rows['gender'].'
						</td>
					</tr>
					<tr>
						<td>
						Date Of Birth
						</td>
						<td>
						'.$rows['dob'].'
						</td>
					</tr>
					<tr>
						<td>
						Student Age
						</td>
						<td>
						'.$rows['age'].'
						</td>
					</tr>
					<tr>
						<td>
						Religion
						</td>
						<td>
						'.$rows['religion'].'
						</td>
					</tr>
					<tr style="background:#39C; color:#FFF" align="center"><td colspan="2">Student Contact Information</td></tr>
					<tr>
						<td>
						Residential Address
						</td>
						<td>
						'.$rows['student_address'].'
						</td>
					</tr>
					<tr>
						<td>
						Nationality
						</td>
						<td>
						'.$rows['nationality'].'
						</td>
					</tr>
					<tr>
						<td>
						State Of Origin
						</td>
						<td>
						'.$rows['state_origin'].'
						</td>
					</tr>
					
					<tr>
						<td>
						City Of Residence
						</td>
						<td>
						'.$rows['city'].'
						</td>
					</tr>
					<tr>
						<td>
						Student Email
						</td>
						<td>
						'.$rows['semail'].'
						</td>
					</tr>
					<tr>
						<td>
						Phone Number
						</td>
						<td>
						'.$rows['parent_phone'].'
						</td>
					</tr>
					<tr style="background:#39C; color:#FFF" align="center"><td colspan="2">Student Parent/Guardian Information</td></tr>
					<tr>
						<td>
						Parent Full Name
						</td>
						<td>
						'.$rows['parent_title']." ".$rows['parent_name']." ".$rows['parent_oname'].'
						</td>
					</tr>
					<tr>
						<td>
						Parent Phone
						</td>
						<td>
						'.$rows['parent_phone'].'
						</td>
					</tr>
					<tr>
						<td>
						Parent Email
						</td>
						<td>
						'.$rows['pemail'].'
						</td>
					</tr>
					<tr>
						<td>
						Residential City
						</td>
						<td>
						'.$rows['current_city'].'
						</td>
					</tr>
					<tr>
						<td>
						Occupation
						</td>
						<td>
						'.$rows['occupation'].'
						</td>
					</tr>
					<tr>
						<td>
						Relationship
						</td>
						<td>
						'.$rows['relationship'].'
						</td>
					</tr>
					</tbody>
				</table>';
			}
		}
?>