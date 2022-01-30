<?php
require_once('../../req/config.php');
session_start();
		//$rowCount = count($_POST["subject"]);
		$class=$_POST['classselect'];
		$clcategory=$_POST['clcategory'];
		$clteacher=$_POST['clteacher'];
		$subject=$_POST["asubject"];
		$nsub="";
		//for($i=0;$i<$rowCount;$i++) 
		foreach ($subject as $sub)
		{
				//$subject=$_POST["subject"][$i];
				$nsub.=$sub.",";
				
		}
				echo $nsub;
				$upto2="update class_tab set subject_taken='$nsub',class_category='$clcategory',staff_id='$clteacher' where clientapp_id='" . $_SESSION['clientappid'] . "' and class_id='$class'";
				$result2=mysqli_query($con,$upto2);
				if($result2)
				{
					echo 'Class Detail Edited';
				}
				else
				{ 
				echo 'NOTOK';
				}
			
	
			
?>