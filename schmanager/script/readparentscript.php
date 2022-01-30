<?php
session_start();
require_once("../../req/config.php");
$output='';
//$keyword=$_GET['keyword'];
//$keyword='A';
 if(isset($_POST["query"]))  
 {  
$pquery ="SELECT parent_name FROM student_tab WHERE parent_name like '%".$_POST['query']."%'  and clientapp_id='".$_SESSION['clientappid']."' ORDER BY parent_name";
$result=mysqli_query($con,$pquery); 
$output = '<ul class="list-unstyled">'; 
if(mysqli_num_rows($result)) {
	 while($row=mysqli_fetch_array($result)){
		  $output .= '<li id="plink">'.$row["parent_name"].'</li>';  
         //$data[] = $row['parent_name'];
		 //echo json_encode($array);
/*echo '<ul id="country-list">';

foreach($result as $pname) {

echo '<li onClick="selectCountry('.$pname["parent_name"]. ')">'.$pname["parent_name"].'</li>';
 } 
echo '</ul>';*/
		}
		$output .= '</ul>';  
     	 echo $output; 
 }  
 }
 
 if (isset($_POST["newdata"]))
 {
	 $numquery="select parent_oname, pemail, address, parent_phone, current_city, occupation, relationship from student_tab where parent_name='".$_POST["newdata"]."'  and clientapp_id='".$_SESSION['clientappid']."'";
		 $result=mysqli_query($con,$numquery);
		 $array=mysqli_fetch_row($result);
		 echo json_encode($array);
	 //$output.='here';
	 //echo $output;
 }
 ?>