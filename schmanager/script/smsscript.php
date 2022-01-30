<?php
require_once('../../req/config.php');
require_once('../../req/declear.php');
$msgbody=mysqli_real_escape_string($con,ucfirst($_POST['msgbody']));
$mobileno=mysqli_real_escape_string($con,ucfirst($_POST['mobileno']));
$clientname=mysqli_real_escape_string($con,ucfirst($_POST['clientname']));
//$msgsubject=mysqli_real_escape_string($con,ucfirst($_POST['msgsubject']));
    
		    $username="nathanieladeniran";
			 $api_password="instinct141";
			 $sender=$clientname;
		
		$message=$msgbody;
		//echo $message;
		
		$username=urlencode($username);
        $api_password=urlencode($api_password);
        $sender=urlencode($sender);
        $message=urlencode($message);
		$priority="2";// 1-Normal,2-Priority,3-Marketing

        $parameters="username=$username&password=$api_password&sender=$sender&mobiles=$mobileno&message=$message&priority=$priority";

       // $url="http://www.bulksmsnigeria.net/components/com_spc/smsapi.php";
		$url="http://portal.bulksmsnigeria.net/api/";

        $ch = curl_init($url);

       /* if($method=="POST")
        {
            curl_setopt($ch, CURLOPT_POST,1);
            curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
        }*/
       // else
      //  {
            $get_url=$url."?".$parameters;

            curl_setopt($ch, CURLOPT_POST,0);
            curl_setopt($ch, CURLOPT_URL, $get_url);
       // }

        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
        curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
        $return_val = curl_exec($ch);


        if($return_val=="")
		{
        echo 'Message Not Sent Please Check Your Network And Make Sure The Numbers Are in Correct Format.';
		}
        else if($return_val==000)
		
		{echo 'Message Sent';
        //echo '$return_val';
		}
		else{
			echo 'Error Sending Message';
		}
    
?>