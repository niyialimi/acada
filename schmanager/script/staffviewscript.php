<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
   $sn=0;	
	$searchquery = "select staff_title as Title,concat(staff_lname,' ',staff_fname) as Name,staff_phone as Phone,staff_type as Staff_Type,cstatus as Status,staff_email as Email,staff_num as Staff_Number,staff_pics as Imageurl,staff_id as staffid from staff_tab where clientapp_id='".$_SESSION['clientappid']."' order by staff_id";
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