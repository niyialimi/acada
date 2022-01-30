<?php
session_start();
require_once("../../req/config.php");
	$id=$_POST['id'];
	//$id=2;
	$viewquery = "select * from subject_tab where subject_id='$id' and clientapp_id='".$_SESSION['clientappid']."'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
				$status=$rows['subject_status'];if($status==1){$status='Active';}else{$status='Inactive';}
				
				echo '<table width=100% class=table table-bordered table-striped id=table>
				<table id="stdtable1" class="table table-bordered table-striped" style="width:100%;">
					<thead style="background:#39C; color:#FFF;">
					<tr>
					<th colspan="2">Subject Details</th>
					</tr>
					</thead>
					<tbody>
					
					<tr>
						<td width="50%">
						Subject Name
						</td>
						<td width="50%">
						'.$rows['subject_name'].'
						</td>
					</tr>
					<tr>
						<td>
						Subject Category
						</td>
						<td>
						'.$rows['subject_category'].'
						</td>
					</tr>
					<tr>
						<td>
						Subject Alias
						</td>
						<td>
						'.$rows['subject_alias'].'
						</td>
					</tr>
					
					<tr>
						<td>
						Subject Pass Mark
						</td>
						<td>
						'.$rows['subject_mark'].'
						</td>
					</tr>
					
					<tr>
						<td>
						Subject Status
						</td>
						<td>
						'.$status.'
						</td>
					</tr>
					
					</tbody>
				</table>';
			}
		}
?>