<?php
session_start();
require_once("../../req/config.php");
	$id=$_POST['id'];
	//$id=2;
	$viewquery = "select * from staff_tab where staff_id='$id' and clientapp_id='".$_SESSION['clientappid']."'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
				
				
				$_SESSION['lname']=$rows['staff_lname'];
				$_SESSION['fname']=$rows['staff_fname'];
				
				
				echo '<table width=100% class=table table-bordered table-striped id=table>
				<table id="stdtable1" class="table table-bordered table-striped" style="width:100%;">
					<thead style="background:#39C; color:#FFF;">
					<tr>
					<th colspan="2">Staff Details</th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td colspan="2">
						<img src=../'.$rows['staff_pics'].' style="width:150px; height:150px;" class="img-thumbnail" alt="Student Image" />
						</td>
					</tr>
					<tr>
						<td width="50%">
						Full Name
						</td>
						<td width="50%">
						'.$rows['staff_title']." ".$rows['staff_lname']." ".$rows['staff_fname']." ".$rows['staff_oname'].'
						</td>
					</tr>
					<tr>
						<td>
						Staff Number
						</td>
						<td>
						'.$rows['staff_num'].'
						</td>
					</tr>
					<tr>
						<td>
						Staff Type
						</td>
						<td>
						'.$rows['staff_type'].'
						</td>
					</tr>
					<tr>
						<td>
						Gender
						</td>
						<td>
						'.$rows['staff_gender'].'
						</td>
					</tr>
					<tr>
						<td>
						Date Of Birth
						</td>
						<td>
						'.$rows['staff_dob'].'
						</td>
					</tr>
					<tr>
						<td>
						Staff Marital Status
						</td>
						<td>
						'.$rows['staff_mstatus'].'
						</td>
					</tr>
					<tr>
						<td>
						Staff Qualification
						</td>
						<td>
						'.$rows['staff_qualify'].'
						</td>
					</tr>
					<tr>
						<td>
						Disability
						</td>
						<td>
						'.$rows['sdisability'].'
						</td>
					</tr>
					<tr>
						<td>
						Religion
						</td>
						<td>
						'.$rows['staff_religion'].'
						</td>
					</tr>
					<tr style="background:#39C; color:#FFF" align="center"><td colspan="2">Staff Contact Information</td></tr>
					<tr>
						<td>
						Residential Address
						</td>
						<td>
						'.$rows['staff_address'].'
						</td>
					</tr>
					<tr>
						<td>
						Postal Address
						</td>
						<td>
						'.$rows['staff_postaladdress'].'
						</td>
					</tr>
					<tr>
						<td>
						Nationality
						</td>
						<td>
						'.$rows['staff_nation'].'
						</td>
					</tr>
					<tr>
						<td>
						State Of Origin
						</td>
						<td>
						'.$rows['staff_state'].'
						</td>
					</tr>
					
					<tr>
						<td>
						Employment_Year
						</td>
						<td>
						'.$rows['staff_year'].'
						</td>
					</tr>
					<tr>
						<td>
						Staff Email
						</td>
						<td>
						'.$rows['staff_email'].'
						</td>
					</tr>
					<tr>
						<td>
						Phone Number
						</td>
						<td>
						'.$rows['staff_phone'].'
						</td>
					</tr>
					<tr style="background:#39C; color:#FFF" align="center"><td colspan="2">Guarantor Information</td></tr>
					<tr>
						<td>
						Guarantor Full Name
						</td>
						<td>
						'.$rows['gtitle']." ".$rows['gfullname']." ".$rows['gothername'].'
						</td>
					</tr>
					<tr>
						<td>
						Guarantor Phone
						</td>
						<td>
						'.$rows['gmobile'].'
						</td>
					</tr>
					<tr>
						<td>
						Guarantor Email
						</td>
						<td>
						'.$rows['gemail'].'
						</td>
					</tr>
					<tr>
						<td>
						Address
						</td>
						<td>
						'.$rows['gaddress'].'
						</td>
					</tr>
					<tr>
						<td>
						Residential City
						</td>
						<td>
						'.$rows['gcity'].'
						</td>
					</tr>
					<tr>
						<td>
						Occupation
						</td>
						<td>
						'.$rows['goccupation'].'
						</td>
					</tr>
					<tr>
						<td>
						Relationship
						</td>
						<td>
						'.$rows['grelationship'].'
						</td>
					</tr>
					</tbody>
				</table>';
			}
		}
?>