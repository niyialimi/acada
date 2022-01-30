<?php
require_once('../../req/config.php');
session_start();
//$query='SELECT `student_id`, SUM(CASE WHEN `day` = "Monday" THEN `attendance_status` ELSE Null END) AS "Monday", SUM(CASE WHEN `day` = "Wednesday" THEN `attendance_status` ELSE Null END) AS "Wednesday", SUM(CASE WHEN `day` = "Thursday" THEN `attendance_status` ELSE Null END) AS "Thursday", SUM( `attendance_status` ) AS total FROM stdattend_tab  GROUP BY `student_id`';
echo '<table width="50%" border="1">
<thead>
<th>
student_id
</th>
<th>
Monday
</th>
<th>
Wednesday
</th>
<th>
Thursday
</th>
</thead>';
$query='SELECT `student_id`, SUM(CASE WHEN `day` = "Monday" THEN `attendance_status` ELSE Null END) AS "Monday", SUM(CASE WHEN `day` = "Wednesday" THEN `attendance_status` ELSE Null END) AS "Wednesday", SUM(CASE WHEN `day` = "Thursday" THEN `attendance_status` ELSE Null END) AS "Thursday", SUM( `attendance_status` ) AS total FROM stdattend_tab GROUP BY `student_id`';
$result2=mysqli_query($con,$query);

if(mysqli_num_rows($result2))
		{
			while ($rows = mysqli_fetch_array($result2))
			{
				
				$attstatus=$rows['Monday'];
				$id=$rows['student_id'];
echo'
<tbody>
<tr>
<td>'.$id.'</td>
<td>
'.$rows['Monday'].'
</td>
<td>
'.$attstatus.'
</td>
<td>
'.$attstatus.'
</td></tr>
';
			}
	}
	echo'</tbody>
</table>';
?>