<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
   $sn=0;	
	$searchquery = "select concat(lname,' ',fname) as Name,current_class as Class, gender as Gender, payment_status as Payment, rollnum as Roll, age as Age, status as Status,pics as imageurl,student_id as stid from student_tab where clientapp_id='".$_SESSION['clientappid']."' order by student_id";
	$searchData=mysqli_query($con,$searchquery) or die("database error:". mysqli_error($con));
	$data = array();
	 if(mysqli_num_rows($searchData))
   {
	   while($rows=mysqli_fetch_assoc($searchData))
	   {	$sn++;
	   		$data[] = $rows;
		    
		}
		$searchData=array("sEcho" => 1,
			"iTotalRecords" => count($data),
			"iTotalDisplayRecords" => count($data),
			"aaData"=>$data);
	   echo json_encode($searchData);
	   
 
   }
   else {
	   echo "No Record Yet";
   }
		
	
	?>    