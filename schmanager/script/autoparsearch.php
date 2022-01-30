<?php
require_once('../../req/config.php');
session_start();
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM student_tab WHERE parent_name LIKE '%".$searchTerm."%' ORDER BY student_id ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['parent_name'];
}
//return json data
echo json_encode($data);
?>