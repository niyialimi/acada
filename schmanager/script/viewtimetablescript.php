<?php 
require_once('../../req/config.php');
require_once('../../req/declear.php');
$output='';
$stdtableclass=mysqli_real_escape_string($con,$_POST['stdtableclass']);
$term=mysqli_real_escape_string($con,$_POST['term']);
$session=mysqli_real_escape_string($con,$_POST['session']);
//$stdtableclass=24;  

if($stdtableclass)
{
$days = array('1', '2', '3', '4', '5');
$periods =array('1st','2nd','3rd','4th','5th','6th','7th','8th','9th','10th');
echo '<div class="table-responsive"><table class="table table-bordered table-striped">';
echo '<thead style="background:#39C; color:#FFF;"><tr><th>Days</th><th>1st Period</th><th>2nd Period</th><th>3rd Period</th><th>4th Period</th><th>5th Period</th><th>6th Period</th><th>7th Period</th><th>8th Period</th><th>9th Period</th><th>10th Period</th></tr></thead>';
foreach ($days as $day) {
	if($day==1){$dayf="Monday";} else if($day==2){$dayf="Tuesday";} else if($day==3){$dayf="Wednesday";} else if($day==4){$dayf="Thursday";} else if ($day==5){$dayf="Friday";}
	
    echo '<tr><td>'.$dayf.'</td>';
    foreach ($periods as $period) {
        
		/*$query="Select class_tab.class_id,timetable_tab.class_id,timetable_tab.subject_name from class_tab inner join timetable_tab on class_tab.class_id=timetable_tab.class_id where timetable_tab.class_id='$stdattclass' and timetable_tab.day_of_week='$day' and timetable_tab.period='$period' and timetable_tab.clientapp_id='".$_SESSION['clientappid']."' ";*/
		$query="select class_tab.class_id,timetable_tab.class_id ,
COALESCE(MAX(CASE WHEN timetable_tab.day_of_week='$day' and timetable_tab.period='$period'  THEN timetable_tab.subject_name END),'') AS subject_name
from class_tab inner join timetable_tab on class_tab.class_id=timetable_tab.class_id where timetable_tab.class_id='$stdtableclass' and timetable_tab.current_term='$term' and timetable_tab.current_session='$session' and timetable_tab.clientapp_id='".$_SESSION['clientappid']."'";
		$result = mysqli_query($con, $query);
        //$row = mysqli_fetch_array($result);
		
		 while ($row = mysqli_fetch_array($result))
			{
       
			echo '<td>'.$row['subject_name'].'</td>';
		}
		
       // echo "</td>";
	   
    }
    echo '</tr>';
}

echo '</table></div>';
/*$logsql="select class_tab.class_id,timetable_tab.class_id ,
COALESCE(MAX(CASE WHEN timetable_tab.day_of_week='1' and timetable_tab.period='1st'  THEN timetable_tab.subject_name END),'') AS First,
COALESCE(MAX(CASE WHEN timetable_tab.day_of_week='1' and timetable_tab.period='2nd' THEN timetable_tab.subject_name END),'') AS Second
from class_tab inner join timetable_tab on class_tab.class_id=timetable_tab.class_id where timetable_tab.class_id='$stdattclass' and timetable_tab.clientapp_id='".$_SESSION['clientappid']."' ";*/
}


?>