<?php
header('Content-Type: application/json');
require_once('../../req/config.php');
session_start();
//$sqlQuery = "SELECT count(*) as total FROM student_tab";
//$sqlQuery = "SELECT count(*) as total,current_class,SUM( CASE WHEN gender = 'male' THEN 1 ELSE 0 END ) as male,SUM( CASE WHEN gender = 'female' THEN 1 ELSE 0 END ) as female FROM student_tab GROUP BY current_class";
$sqlQuery = "SELECT
SUM( CASE WHEN  current_class='Nursery 1' THEN 1 ELSE '0' END ) as n1total,

SUM( CASE WHEN  current_class='Nursery 2' THEN 1 ELSE '0' END ) as n2total,

SUM( CASE WHEN  current_class='Nursery 3' THEN 1 ELSE '0' END ) as n3total,

SUM( CASE WHEN  current_class='Primary 1' THEN 1 ELSE '0' END ) as p1total,

SUM( CASE WHEN  current_class='Primary 2' THEN 1 ELSE '0' END ) as p2total,

SUM( CASE WHEN  current_class='Primary 3' THEN 1 ELSE '0' END ) as p2total,

SUM( CASE WHEN  current_class='Primary 4' THEN 1 ELSE '0' END ) as p4total,

SUM( CASE WHEN  current_class='Primary 5' THEN 1 ELSE '0' END ) as p5total

FROM student_tab";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>
