<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
   $sn=0;	
   $_SESSION['clientappid']=1;
	$searchquery = "select student_tab.parent_name as Name,student_tab.parent_phone as Phone,student_tab.pemail as Email from student_tab inner join parent_login on student_tab.parent_phone=parent_login.parent_phone ";
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