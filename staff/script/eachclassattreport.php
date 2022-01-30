<?php
require_once('../../req/config.php');
session_start();

$attendsession=$_POST['attendsession'];
$attendterm=$_POST['attendterm'];
$attendclass=$_POST['attendclass'];
$month=$_POST['attendmonth'];

/*$attendsession='2017/2018';
$attendterm='First';
$attendclass='30';
$month=3;*/

if($attendclass)
{
$logsql="select * from class_tab where class_id='$attendclass' and staff_id='".$_SESSION['staffid']."' ";
$result=mysqli_query($con,$logsql);

while($rows=mysqli_fetch_array($result))
		 {
									  
				 $_SESSION['classname']=$rows['class_name'];
				 $_SESSION['classarm']=$rows['class_arm'];
		 }
}

$monthName = date("F", mktime(0, 0, 0, $month, 10));
if($month && $attendsession && $attendclass && $attendterm)
{
$month=$month;
$year=date('Y');
$day=date('w');//day of the week 0=sun and 6=sat
$num=cal_days_in_month(CAL_GREGORIAN,$month,$year); //get no of days in a month
$date_today = getdate(mktime(0,0,0,$month,1,$year));
$month_name = $date_today["month"];
$year = date("Y"); 
$list=array();
//echo $month." ".$num;
if($num==28)
{
$squery="SELECT student_tab.student_id, Concat(student_tab.lname,' ',student_tab.fname) As 'Student', 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='1'  THEN stdattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='2'  THEN stdattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='3'  THEN stdattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='4'  THEN stdattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='5'  THEN stdattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='6'  THEN stdattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='7'  THEN stdattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='8'  THEN stdattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='9'  THEN stdattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='10' THEN stdattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='11'  THEN stdattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='12'  THEN stdattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='13'  THEN stdattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='14'  THEN stdattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='15'  THEN stdattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='16'  THEN stdattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='17'  THEN stdattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='18'  THEN stdattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='19'  THEN stdattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='20'  THEN stdattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='21'  THEN stdattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='22'  THEN stdattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='23'  THEN stdattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='24'  THEN stdattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='25'  THEN stdattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='26'  THEN stdattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='27'  THEN stdattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='28'  THEN stdattend_tab.attendance_status END),'') AS Day28
FROM student_tab inner join stdattend_tab on student_tab.student_id=stdattend_tab.student_id where stdattend_tab.month='$monthName' and stdattend_tab.csession='$attendsession' and stdattend_tab.cterm='$attendterm' and student_tab.current_class='".$_SESSION['classname']."' and student_tab.current_arm='".$_SESSION['classarm']."' and stdattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY stdattend_tab.student_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="29" align="center"><strong>'.$_SESSION["classname"].' '.$_SESSION['classarm'].' Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			
			//';
			
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Student Name</td>';
				for($d=1; $d<=31; $d++)
				{
					$time=mktime(2, 0, 0, $month, $d, $year);          
					if (date('m', $time)==$month)       
					   // $list[]=date('D', $time)."<br>".date('Y-m-d', $time);
						$list[]=date('D', $time)."<br>".date('d', $time);
						
				}
				foreach($list as $lis)
								{
							echo '<td>'.$lis.'</td>';
							
								}
								echo '</tr>';
	 while ($rows = mysqli_fetch_array($result))
			{
				
				/*$monday=$rows['Monday'];if($monday=='1'){$monday='P';}else{$monday='A';}
				$tuesday=$rows['Tuesday'];if($tuesday=='1'){$tuesday='P';}else{$tuesday='A';}
				$wednesday=$rows['Wednesday'];if($wednesday=='1'){$wednesday='P';}else{$wednesday='A';}
				$thursday=$rows['Thursday'];if($thursday=='1'){$thursday='P';}else{$thursday='A';}
				$friday=$rows['Friday'];if($friday=='1'){$friday='P';}else if($friday=='0'){$friday='A';}else{$friday='';}*/
				echo '<tr align="center"><td align="left">'.$rows['Student'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td></tr>';
			}
			echo '</table>';
 }
 else
 {
	 echo '<table><tr align="center"><td>No Record For The Month Or Class Selected Yet</td></tr></table>';
 }
}

else if($num==29)
{
	$squery="SELECT student_tab.student_id, Concat(student_tab.lname,' ',student_tab.fname) As 'Student', 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='1'  THEN stdattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='2'  THEN stdattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='3'  THEN stdattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='4'  THEN stdattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='5'  THEN stdattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='6'  THEN stdattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='7'  THEN stdattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='8'  THEN stdattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='9'  THEN stdattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='10' THEN stdattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='11'  THEN stdattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='12'  THEN stdattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='13'  THEN stdattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='14'  THEN stdattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='15'  THEN stdattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='16'  THEN stdattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='17'  THEN stdattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='18'  THEN stdattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='19'  THEN stdattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='20'  THEN stdattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='21'  THEN stdattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='22'  THEN stdattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='23'  THEN stdattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='24'  THEN stdattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='25'  THEN stdattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='26'  THEN stdattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='27'  THEN stdattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='28'  THEN stdattend_tab.attendance_status END),'') AS Day28,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='29'  THEN stdattend_tab.attendance_status END),'') AS Day29
FROM student_tab inner join stdattend_tab on student_tab.student_id=stdattend_tab.student_id where stdattend_tab.month='$monthName' and stdattend_tab.csession='$attendsession' and stdattend_tab.cterm='$attendterm' and student_tab.current_class='".$_SESSION['classname']."' and student_tab.current_arm='".$_SESSION['classarm']."' and stdattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY stdattend_tab.student_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="29" align="center"><strong>'.$_SESSION["classname"].' '.$_SESSION['classarm'].'Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Student Name</td>';
				for($d=1; $d<=31; $d++)
				{
					$time=mktime(2, 0, 0, $month, $d, $year);          
					if (date('m', $time)==$month)       
					   // $list[]=date('D', $time)."<br>".date('Y-m-d', $time);
						$list[]=date('D', $time)."<br>".date('d', $time);
						
				}
				foreach($list as $lis)
								{
							echo '<td>'.$lis.'</td>';
							
								}
								echo '</tr>';
	 while ($rows = mysqli_fetch_array($result))
			{
				
				/*$monday=$rows['Monday'];if($monday=='1'){$monday='P';}else{$monday='A';}
				$tuesday=$rows['Tuesday'];if($tuesday=='1'){$tuesday='P';}else{$tuesday='A';}
				$wednesday=$rows['Wednesday'];if($wednesday=='1'){$wednesday='P';}else{$wednesday='A';}
				$thursday=$rows['Thursday'];if($thursday=='1'){$thursday='P';}else{$thursday='A';}
				$friday=$rows['Friday'];if($friday=='1'){$friday='P';}else if($friday=='0'){$friday='A';}else{$friday='';}*/
				echo '<tr align="center"><td align="left">'.$rows['Student'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td><td>'.$rows['Day29'].'</td></tr>';
			}
			echo '</table>';
 }
 else
 {
	 echo '<table><tr align="center"><td>No Record For The Month Or Class Selected Yet</td></tr></table>';
 }
}


else if($num==30)
{
	$squery="SELECT student_tab.student_id, Concat(student_tab.lname,' ',student_tab.fname) As 'Student', 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='1'  THEN stdattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='2'  THEN stdattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='3'  THEN stdattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='4'  THEN stdattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='5'  THEN stdattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='6'  THEN stdattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='7'  THEN stdattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='8'  THEN stdattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='9'  THEN stdattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='10' THEN stdattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='11'  THEN stdattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='12'  THEN stdattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='13'  THEN stdattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='14'  THEN stdattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='15'  THEN stdattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='16'  THEN stdattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='17'  THEN stdattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='18'  THEN stdattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='19'  THEN stdattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='20'  THEN stdattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='21'  THEN stdattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='22'  THEN stdattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='23'  THEN stdattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='24'  THEN stdattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='25'  THEN stdattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='26'  THEN stdattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='27'  THEN stdattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='28'  THEN stdattend_tab.attendance_status END),'') AS Day28,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='29'  THEN stdattend_tab.attendance_status END),'') AS Day29,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='30'  THEN stdattend_tab.attendance_status END),'') AS Day30
FROM student_tab inner join stdattend_tab on student_tab.student_id=stdattend_tab.student_id where stdattend_tab.month='$monthName' and stdattend_tab.csession='$attendsession' and stdattend_tab.cterm='$attendterm' and student_tab.current_class='".$_SESSION['classname']."' and student_tab.current_arm='".$_SESSION['classarm']."' and stdattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY stdattend_tab.student_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="29" align="center"><strong>'.$_SESSION["classname"].' '.$_SESSION['classarm'].'Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Student Name</td>';
				for($d=1; $d<=31; $d++)
				{
					$time=mktime(2, 0, 0, $month, $d, $year);          
					if (date('m', $time)==$month)       
					   // $list[]=date('D', $time)."<br>".date('Y-m-d', $time);
						$list[]=date('D', $time)."<br>".date('d', $time);
						
				}
				foreach($list as $lis)
								{
							echo '<td>'.$lis.'</td>';
							
								}
								echo '</tr>';
	 while ($rows = mysqli_fetch_array($result))
			{
				
				/*$monday=$rows['Monday'];if($monday=='1'){$monday='P';}else{$monday='A';}
				$tuesday=$rows['Tuesday'];if($tuesday=='1'){$tuesday='P';}else{$tuesday='A';}
				$wednesday=$rows['Wednesday'];if($wednesday=='1'){$wednesday='P';}else{$wednesday='A';}
				$thursday=$rows['Thursday'];if($thursday=='1'){$thursday='P';}else{$thursday='A';}
				$friday=$rows['Friday'];if($friday=='1'){$friday='P';}else if($friday=='0'){$friday='A';}else{$friday='';}*/
				echo '<tr align="center"><td align="left">'.$rows['Student'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td><td>'.$rows['Day29'].'</td><td>'.$rows['Day30'].'</td></tr>';
			}
			echo '</table>';
 }
 else
 {
	 echo '<table><tr align="center"><td>No Record For The Month Or Class Selected Yet</td></tr></table>';
 }
}


else if($num==31)
{
	$squery="SELECT student_tab.student_id, Concat(student_tab.lname,' ',student_tab.fname) As 'Student', 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='1'  THEN stdattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='2'  THEN stdattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='3'  THEN stdattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='4'  THEN stdattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='5'  THEN stdattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='6'  THEN stdattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='7'  THEN stdattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='8'  THEN stdattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='9'  THEN stdattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='10' THEN stdattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='11'  THEN stdattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='12'  THEN stdattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='13'  THEN stdattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='14'  THEN stdattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='15'  THEN stdattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='16'  THEN stdattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='17'  THEN stdattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='18'  THEN stdattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='19'  THEN stdattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='20'  THEN stdattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='21'  THEN stdattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='22'  THEN stdattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='23'  THEN stdattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='24'  THEN stdattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='25'  THEN stdattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='26'  THEN stdattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='27'  THEN stdattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='28'  THEN stdattend_tab.attendance_status END),'') AS Day28,

COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='29'  THEN stdattend_tab.attendance_status END),'') AS Day29,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='30'  THEN stdattend_tab.attendance_status END),'') AS Day30,
COALESCE(MAX(CASE WHEN stdattend_tab.day_of_month='31'  THEN stdattend_tab.attendance_status END),'') AS Day31
FROM student_tab inner join stdattend_tab on student_tab.student_id=stdattend_tab.student_id where stdattend_tab.month='$monthName' and stdattend_tab.csession='$attendsession' and stdattend_tab.cterm='$attendterm' and student_tab.current_class='".$_SESSION['classname']."' and student_tab.current_arm='".$_SESSION['classarm']."' and stdattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY stdattend_tab.student_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="29" align="center"><strong>'.$_SESSION["classname"].' '.$_SESSION['classarm'].'Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Student Name</td>';
				for($d=1; $d<=31; $d++)
				{
					$time=mktime(2, 0, 0, $month, $d, $year);          
					if (date('m', $time)==$month)       
					   // $list[]=date('D', $time)."<br>".date('Y-m-d', $time);
						$list[]=date('D', $time)."<br>".date('d', $time);
						
				}
				foreach($list as $lis)
								{
							echo '<td>'.$lis.'</td>';
							
								}
								echo '</tr>';
	 while ($rows = mysqli_fetch_array($result))
			{
				
				/*$monday=$rows['Monday'];if($monday=='1'){$monday='P';}else{$monday='A';}
				$tuesday=$rows['Tuesday'];if($tuesday=='1'){$tuesday='P';}else{$tuesday='A';}
				$wednesday=$rows['Wednesday'];if($wednesday=='1'){$wednesday='P';}else{$wednesday='A';}
				$thursday=$rows['Thursday'];if($thursday=='1'){$thursday='P';}else{$thursday='A';}
				$friday=$rows['Friday'];if($friday=='1'){$friday='P';}else if($friday=='0'){$friday='A';}else{$friday='';}*/
				echo '<tr align="center"><td align="left">'.$rows['Student'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td><td>'.$rows['Day29'].'</td><td>'.$rows['Day30'].'</td><td>'.$rows['Day31'].'</td></tr>';
			}
			echo '</table>';
 }
}
else
 {
	 echo '<table><tr align="center"><td>No Record For The Month Or Class Selected Yet</td></tr></table>';
 }

}

else
{
	echo '<table><tr align="center"><td>No Record For The Filter Selected , Please Check Your Input Again</td></tr></table>';
}
?>