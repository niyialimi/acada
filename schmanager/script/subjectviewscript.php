<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
   $sn=0;	
	$searchquery = "select subject_name as Name,subject_category as Category,subject_alias as Alias,subject_status as Status,subject_id as subjectid  from subject_tab where clientapp_id='".$_SESSION['clientappid']."' order by subject_id";
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