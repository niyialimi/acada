<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
$oldscoreid=$_POST['oldscoreid'];
$newescore=$_POST['newscore'];  
$stdid=$_POST['stdid'];
if($stdid && $oldscoreid && $newescore)
{
		$searchquery = "update scoresheet_tab set mark='$newescore'  where score_id='".$oldscoreid."' and student_id='".$stdid."'  and clientapp_id='".$_SESSION['clientappid']."'";
	$searchData=mysqli_query($con,$searchquery);
	 if($searchquery)
   {
	  echo "Mark Updated";	  
	  
   }else {
   
  	 echo	"Error Updating Mark";
    
    } 
	
}
else
{
	echo "An Error Just Occur";
}


?>