<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
   $sn=0;	
	$searchquery = "select class_tab.class_id as classid,class_tab.class_name as Class,class_tab.class_category as Category,concat(staff_tab.staff_lname,' ',staff_tab.staff_fname) as Teacher,class_tab.class_arm as Arm,class_tab.class_alias as Alias,class_tab.status as Status from class_tab inner join staff_tab on class_tab.staff_id=staff_tab.staff_id where class_tab.clientapp_id='".$_SESSION['clientappid']."'";
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