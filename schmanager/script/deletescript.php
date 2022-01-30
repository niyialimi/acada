<?php
require_once("../../req/config.php");
$msgid=$_GET["msgid"];
$dquery = "delete from message_tab where msg_id='$msgid' ";
 $result = mysqli_query($con,$dquery) or die(mysqli_error($con));
 if($result)
 {
	 echo 'deleted';
 
 }else
 {
	 echo 'not-deleted';
 }
?>