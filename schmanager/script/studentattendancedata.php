<?php
header('Content-Type: application/json');
require_once('../../req/config.php');
session_start();
$mnt=date('F');
$yr=date('Y');
$sqlQuery = "SELECT count(at_id) as total,
SUM( CASE WHEN  attendance_status='P' THEN 1 ELSE '0' END ) as present,

SUM( CASE WHEN  attendance_status='A' THEN 1 ELSE '0' END ) as absent

FROM stdattend_tab where month='$mnt' and year='$yr' and clientapp_id='".$_SESSION['clientappid']."'";

$result = mysqli_query($con,$sqlQuery);
if($result)
{

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}
}else
{
	 $data[]='No data';;
}
mysqli_close($con);

echo json_encode($data);

?>
