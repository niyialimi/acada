<?php
		//$phone=$_POST['mnumber'];
		//$message=$_POST['mmsg'];
		$phone='08076765775';
		$message='A Text Message';
		$username="nathanieladeniran";
		$api_password="instinct141";
		$sender="IIS";
		//echo $message;
		
		$username=urlencode($username);
        $api_password=urlencode($api_password);
        $sender=urlencode($sender);
        $message=urlencode($message);
		$priority="1";// 1-Normal,2-Priority,3-Marketing

        $parameters="username=$username&password=$api_password&sender=$sender&mobiles=$phone&message=$message&priority=$priority";

        //$url="http://www.bulksmsnigeria.net/components/com_spc/smsapi.php";
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
        echo '<script type="text/javascript">alert("Message Not Sent, Check the network and try again");window.location="../msgsms.php";</script>';
		}
        else{
			/*echo '<script type="text/javascript">alert("Message Sent");window.location="../admboard.php";</script>';*/
		//header('location:http://www.kamindustries.com.ng/kamsms/admin/nadmin/index.php');
		echo "Message Sent";
        echo "$return_val";
		}

    
	   
?>