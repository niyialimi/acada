<?php
require_once('../../req/config.php');
session_start();
		$rowCount = count($_POST["subject"]);
		$class=$_POST['classselect'];
		//echo $rowCount." ".$class;
		$subject=$_POST["subject"];
		$nsub="";
		//for($i=0;$i<$rowCount;$i++) 
		foreach ($subject as $sub)
		{
				//$subject=$_POST["subject"][$i];
				$nsub.=$sub.",";
				
		}
				echo $nsub;
				$upto2="update class_tab set subject_taken='$nsub' where clientapp_id='" . $_SESSION['clientappid'] . "' and class_id='$class'";
				$result2=mysqli_query($con,$upto2);
				if($result2)
				{
					echo 'Subject Added To Class';
				}
				else
				{ 
				echo 'NOTOK';
				}
			
	
			
?>