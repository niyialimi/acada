<?php
require_once('../../req/config.php');
session_start();

$staffattendsession=$_POST['staffattendsession'];
$staffattendterm=$_POST['staffattendterm'];
$month=$_POST['staffattendmonth'];
$staffattendtype=$_POST['staffattendtype'];

$monthName = date("F", mktime(0, 0, 0, $month, 10));
if($month && $staffattendsession && $staffattendtype && $staffattendterm)
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
$squery="SELECT staff_tab.staff_id, Concat(staff_tab.staff_lname,' ',staff_tab.staff_fname) As 'Staff', 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='1'  THEN staffattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='2'  THEN staffattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='3'  THEN staffattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='4'  THEN staffattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='5'  THEN staffattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='6'  THEN staffattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='7'  THEN staffattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='8'  THEN staffattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='9'  THEN staffattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='10' THEN staffattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='11'  THEN staffattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='12'  THEN staffattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='13'  THEN staffattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='14'  THEN staffattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='15'  THEN staffattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='16'  THEN staffattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='17'  THEN staffattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='18'  THEN staffattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='19'  THEN staffattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='20'  THEN staffattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='21'  THEN staffattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='22'  THEN staffattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='23'  THEN staffattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='24'  THEN staffattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='25'  THEN staffattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='26'  THEN staffattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='27'  THEN staffattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='28'  THEN staffattend_tab.attendance_status END),'') AS Day28
FROM staff_tab inner join staffattend_tab on staff_tab.staff_id=staffattend_tab.staff_id where staffattend_tab.month='$monthName' and staffattend_tab.csession='$staffattendsession' and staffattend_tab.cterm='$staffattendterm' and staff_tab.staff_type='$staffattendtype' and staffattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY staffattend_tab.staff_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="29" align="center"><strong>Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			
			//';
			
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Staff Name</td>';
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
				
				
				echo '<tr align="center"><td align="left">'.$rows['Staff'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td></tr>';
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
	$squery="SELECT staff_tab.staff_id, Concat(staff_tab.staff_lname,' ',staff_tab.staff_fname) As 'Staff', 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='1'  THEN staffattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='2'  THEN staffattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='3'  THEN staffattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='4'  THEN staffattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='5'  THEN staffattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='6'  THEN staffattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='7'  THEN staffattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='8'  THEN staffattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='9'  THEN staffattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='10' THEN staffattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='11'  THEN staffattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='12'  THEN staffattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='13'  THEN staffattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='14'  THEN staffattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='15'  THEN staffattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='16'  THEN staffattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='17'  THEN staffattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='18'  THEN staffattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='19'  THEN staffattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='20'  THEN staffattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='21'  THEN staffattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='22'  THEN staffattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='23'  THEN staffattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='24'  THEN staffattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='25'  THEN staffattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='26'  THEN staffattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='27'  THEN staffattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='28'  THEN staffattend_tab.attendance_status END),'') AS Day28,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='29'  THEN staffattend_tab.attendance_status END),'') AS Day29
FROM staff_tab inner join staffattend_tab on staff_tab.staff_id=staffattend_tab.staff_id where staffattend_tab.month='$monthName' and staffattend_tab.csession='$staffattendsession' and staffattend_tab.cterm='$staffattendterm' and staff_tab.staff_type='$staffattendtype' and staffattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY staffattend_tab.staff_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="30" align="center"><strong>Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Staff Name</td>';
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
				
				
				echo '<tr align="center"><td align="left">'.$rows['Staff'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td><td>'.$rows['Day29'].'</td></tr>';
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
	$squery="SELECT staff_tab.staff_id, Concat(staff_tab.staff_lname,' ',staff_tab.staff_fname) As 'Staff', 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='1'  THEN staffattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='2'  THEN staffattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='3'  THEN staffattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='4'  THEN staffattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='5'  THEN staffattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='6'  THEN staffattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='7'  THEN staffattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='8'  THEN staffattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='9'  THEN staffattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='10' THEN staffattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='11'  THEN staffattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='12'  THEN staffattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='13'  THEN staffattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='14'  THEN staffattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='15'  THEN staffattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='16'  THEN staffattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='17'  THEN staffattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='18'  THEN staffattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='19'  THEN staffattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='20'  THEN staffattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='21'  THEN staffattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='22'  THEN staffattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='23'  THEN staffattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='24'  THEN staffattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='25'  THEN staffattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='26'  THEN staffattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='27'  THEN staffattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='28'  THEN staffattend_tab.attendance_status END),'') AS Day28,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='29'  THEN staffattend_tab.attendance_status END),'') AS Day29,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='30'  THEN staffattend_tab.attendance_status END),'') AS Day30
FROM staff_tab inner join staffattend_tab on staff_tab.staff_id=staffattend_tab.staff_id where staffattend_tab.month='$monthName' and staffattend_tab.csession='$staffattendsession' and staffattend_tab.cterm='$staffattendterm' and staff_tab.staff_type='$staffattendtype' and staffattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY staffattend_tab.staff_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="31" align="center"><strong>Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Staff Name</td>';
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
				
				
				echo '<tr align="center"><td align="left">'.$rows['Staff'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td><td>'.$rows['Day29'].'</td><td>'.$rows['Day30'].'</td></tr>';
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
	$squery="SELECT staff_tab.staff_id, Concat(staff_tab.staff_lname,' ',staff_tab.staff_fname) As 'Staff', 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='1'  THEN staffattend_tab.attendance_status END),'') AS Day1,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='2'  THEN staffattend_tab.attendance_status END),'') AS Day2, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='3'  THEN staffattend_tab.attendance_status END),'') AS Day3, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='4'  THEN staffattend_tab.attendance_status END),'') AS Day4,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='5'  THEN staffattend_tab.attendance_status END),'') AS Day5,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='6'  THEN staffattend_tab.attendance_status END),'') AS Day6,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='7'  THEN staffattend_tab.attendance_status END),'') AS Day7, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='8'  THEN staffattend_tab.attendance_status END),'') AS Day8, 
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='9'  THEN staffattend_tab.attendance_status END),'') AS Day9,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='10' THEN staffattend_tab.attendance_status END),'') AS Day10,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='11'  THEN staffattend_tab.attendance_status END),'') AS Day11,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='12'  THEN staffattend_tab.attendance_status END),'') AS Day12,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='13'  THEN staffattend_tab.attendance_status END),'') AS Day13,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='14'  THEN staffattend_tab.attendance_status END),'') AS Day14,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='15'  THEN staffattend_tab.attendance_status END),'') AS Day15,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='16'  THEN staffattend_tab.attendance_status END) ,'')AS Day16,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='17'  THEN staffattend_tab.attendance_status END),'') AS Day17,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='18'  THEN staffattend_tab.attendance_status END),'') AS Day18,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='19'  THEN staffattend_tab.attendance_status END),'') AS Day19,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='20'  THEN staffattend_tab.attendance_status END),'') AS Day20,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='21'  THEN staffattend_tab.attendance_status END),'') AS Day21,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='22'  THEN staffattend_tab.attendance_status END),'') AS Day22,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='23'  THEN staffattend_tab.attendance_status END),'') AS Day23,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='24'  THEN staffattend_tab.attendance_status END),'') AS Day24,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='25'  THEN staffattend_tab.attendance_status END),'') AS Day25,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='26'  THEN staffattend_tab.attendance_status END) ,'')AS Day26,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='27'  THEN staffattend_tab.attendance_status END),'') AS Day27,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='28'  THEN staffattend_tab.attendance_status END),'') AS Day28,

COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='29'  THEN staffattend_tab.attendance_status END),'') AS Day29,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='30'  THEN staffattend_tab.attendance_status END),'') AS Day30,
COALESCE(MAX(CASE WHEN staffattend_tab.day_of_month='31'  THEN staffattend_tab.attendance_status END),'') AS Day31
FROM staff_tab inner join staffattend_tab on staff_tab.staff_id=staffattend_tab.staff_id where staffattend_tab.month='$monthName' and staffattend_tab.csession='$staffattendsession' and staffattend_tab.cterm='$staffattendterm' and staff_tab.staff_type='$staffattendtype' and staffattend_tab.clientapp_id='".$_SESSION['clientappid']."'  GROUP BY staffattend_tab.staff_id" ;

$result=mysqli_query($con,$squery);
if(mysqli_num_rows($result))
 {	
 	echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td colspan="32" align="center"><strong>Attendance Report For '.$monthName." ".$year.'</strong></td></tr>';
			
			$days=array();
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Staff Name</td>';
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
				
				
				echo '<tr align="center"><td align="left">'.$rows['Staff'].'</td><td>'.$rows['Day1'].'</td><td>'.$rows['Day2'].'</td><td>'.$rows['Day3'].'</td><td>'.$rows['Day4'].'</td><td>'.$rows['Day5'].'</td><td>'.$rows['Day6'].'</td><td>'.$rows['Day7'].'</td><td>'.$rows['Day8'].'</td><td>'.$rows['Day9'].'</td><td>'.$rows['Day10'].'</td> <td>'.$rows['Day11'].'</td><td>'.$rows['Day12'].'</td><td>'.$rows['Day13'].'</td><td>'.$rows['Day14'].'</td><td>'.$rows['Day15'].'</td><td>'.$rows['Day16'].'</td><td>'.$rows['Day17'].'</td><td>'.$rows['Day18'].'</td><td>'.$rows['Day19'].'</td><td>'.$rows['Day20'].'</td> <td>'.$rows['Day21'].'</td><td>'.$rows['Day22'].'</td><td>'.$rows['Day23'].'</td><td>'.$rows['Day24'].'</td><td>'.$rows['Day25'].'</td><td>'.$rows['Day26'].'</td><td>'.$rows['Day27'].'</td><td>'.$rows['Day28'].'</td><td>'.$rows['Day29'].'</td><td>'.$rows['Day30'].'</td><td>'.$rows['Day31'].'</td></tr>';
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