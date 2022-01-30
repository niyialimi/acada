<?php
session_start();
require_once('../../req/config.php');
$mysql_data = array();
$id=$_GET['id'];
//$id=2;
$output='';
	$viewquery = "select * from student_tab where student_id='$id'";
	$result=mysqli_query($con,$viewquery);
	if(mysqli_num_rows($result))
		{
			while ($rows = mysqli_fetch_array($result))
			{
				$_SESSION['lname']=$rows['lname'];
				$_SESSION['fname']=$rows['fname'];
				$_SESSION['oname']=$rows['oname'];
				$_SESSION['pics']=$rows['pics'];
				$paymentstatus=$rows['payment_status'];
				$stdstatus=$rows['status'];
				if($paymentstatus =="Not Paid"){$mystat= "<span data-toggle= tooltip class=label label-danger style=background:#e50613; color:#FFF;>Unpaid</span>";}else{$mystat= "<span data-toggle=tooltip  class=label label-success style=background:#07a436; color:#FFF;>Paid</span>";}
				if($stdstatus ==0){$stdstatus= "<span data-toggle= tooltip class=label label-danger style=background:#e50613; color:#FFF;>Not Active</span>";}else{$stdstatus= "<span data-toggle=tooltip  class=label label-success style=background:#05b4da; color:#FFF;>Active</span>";}
				$_SESSION['stdfullname']=$_SESSION['lname']." ".$_SESSION['oname'];
			
			$output.='<table class="table table-bordered" width="100%">
          <tbody>
            <tr >
              <td colspan="2" class="text-center"><img src="../'.$_SESSION['pics'].'" width="140" height="140" /></td>
              <td>Activities &amp; Hobbies</td>
              <td>'.$rows['std_hobby'].'</td>
            </tr>
          
  <tr><td width="23%">Name</td>
    <td width="33%">'.$_SESSION['stdfullname'].'</td>
    <td width="20%">Admission Year</td>
    <td width="23%">'.$rows['admission_year'].'</td>
  </tr>
  <tr>
    <td>Current Class</td>
    <td>'.$rows['current_class'].'</td>
    <td>Expected Grad Year</td>
    <td>'.$rows['grad_year'].'</td>
  </tr>
  <tr>
    <td>Current Session</td>
    <td>'.$rows['current_session'].'</td>
    <td>Payment Status</td>
    <td>'.$mystat.'</td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>'.$rows['gender'].'</td>
    <td>Student Status</td>
    <td>'.$stdstatus.'</td>
  </tr>
  <tr>
    <td>Age</td>
    <td>'.$rows['age'].'</td>
    <td>Student Number</td>
    <td>'.$rows['rollnum'].'</td>
  </tr>
        </table>';
			 
			}
		}else{$output.='Sorry An Error Just Occured, Please Reselect Student';}
		echo $output;
		
?>