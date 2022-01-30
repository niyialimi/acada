<?php 
require_once('../req/config.php');
require_once('../req/declear.php');
require_once('script/chkloginstatus.php');
require_once('script/topright.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::My Kids</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <?php echo $_SESSION['logo']; ?>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
           <?php echo $_SESSION['toprightparent']; ?>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         <p>&nbsp;</p>
          <ul class="sidebar-menu">
            
            <li class="treeview">
              <a href="ptdashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              
            </li>
           
            <li class="active treeview">
              <a href="mykids.php">
                <i class="fa fa-graduation-cap"></i>
                <span>My Kids</span>
              </a>
             
            </li>
            
            <li class="treeview">
              <a href="markhistory.php">
                <i class="fa fa-history"></i>
                <span>Mark History</span>
              </a>
             
            </li>
           
            <li class="treeview">
              <a href="mymessage.php">
                <i class="fa fa-envelope"></i>
                <span>Messaging</span>               
              </a>
             </li>
            
             <li class="treeview">
              <a href="logout.php">
                <i class="fa fa-sign-out"></i> <span>Logout</span>
              </a>
              
            </li>     
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            My Kids
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-graduation-cap"></i> My Kids</a></li>
            <li class="active">Score Report</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Kid's Score Report</h3>
                  <div class="box-tools pull-right">
                    <a href="mykids.php" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="My Kids"><i class="fa fa-graduation-cap"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
                        <div class="table-responsive">
                 <!--form action="" class="stdatted" id="attform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">   
                     
                  <div class="col-md-3">
                  		<select class="form-control" name="attendclass" id="attendclass" required>
                        	<option value="">Select Class</option>
                           <option value="KG">KG</option>
                          <option value="Nursery 1">Nursery 1</option>
                          <option value="Nursery 2">Nursery 2</option>
                          <option value="Nursery 3">Nursery 3</option>
                          <option value="Primary 1">Primary 1</option>
                          <option value="Primary 2">Primary 2</option>
                          <option value="Primary 3">Primary 3</option>
                          <option value="Primary 4">Primary 4</option>
                          <option value="Primary 5">Primary 5</option>
                          <option value="Primary 6">Primary 6</option>
                          <option value="Junior Secondary School 1">Junior Secondary School 1</option>
                          <option value="Junior Secondary School 2">Junior Secondary School 2</option>
                          <option value="Junior Secondary School 3">Junior Secondary School 3</option>
                          <option value="Senior Secondary School 1">Senior Secondary School 1</option>
                          <option value="Senior Secondary School 2">Senior Secondary School 2</option>
                          <option value="Senior Secondary School 3">Senior Secondary School 3</option>
                        </select>
                  </div>
                 
                  <div class="col-md-3">
                  	<select class="form-control" name="attendsession" id="attendsession" required>
                          	<option value="2017/2018">2017/2018</option>
                          	<option value="2018/2019">2018/2019</option>
                          	<option value="2019/2020">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                  <select class="form-control" name="attendterm" id="attendterm" required>
                  		  <option value="">Select Term</option>
                          <option value="First">First Term</option>
                          <option value="Second">Second Term</option>                      
                          <option value="Third">Third Term</option>
                  	 	 
                  </select>
                  </div>
                  <div class="col-md-3">  
                  <input type="hidden" name="stdid" id="stdid" value="<?php echo $_GET['id'] ?>">                
                  
                  <input type="hidden" name="classarm" id="classarm" value="">
                  
                  </div>
                  </form-->
                  
                   </div>
                  <p>&nbsp;</p>
                  <div class="table-responsive">
                  <a href="#" id="printme" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</a>
                <form action="" class="atendtform" id="showattendform"  enctype="multipart/form-data" method="post" role="form">                
                	<div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Report Sheet</h3>
                      </div>                      
                      <div class="panel-body" id="printarea">
 <?php

$selectquery = "select student_tab.lname,student_tab.fname,student_tab.pics,student_tab.rollnum,student_tab.current_class,student_tab.admission_year,setting_tab.current_term,setting_tab.current_session from student_tab inner join setting_tab on student_tab.clientapp_id=setting_tab.clientapp_id where student_id='".$_GET["id"]."' and setting_tab.clientapp_id='".$_SESSION['clientappid']."'";
					$selectData=mysqli_query($con,$selectquery) or die("database error:". mysqli_error($con));
					
					if(mysqli_num_rows($selectData))
					   {
						   while($rows=mysqli_fetch_assoc($selectData))
							   {	
							   		$_SESSION['lname']=$rows['lname'];
									$_SESSION['fname']=$rows['fname'];
									$_SESSION['pics']=$rows['pics'];
									$_SESSION['csession']=$rows['current_session'];
									$_SESSION['admyear']=$rows['admission_year'];
									$_SESSION['cterm']=$rows['current_term'];
									$_SESSION['stdno']=$rows['rollnum'];
									$_SESSION['cclass']=$rows['current_class'];
									
							   }
						echo '	<div class="table-responsive"><table width="75%" class="" style="width:75%">	
								<thead><tr align="center"><strong><font style="font-size:20px">'.$_SESSION['lname']." ".$_SESSION['fname'].'</strong></font></tr></thead>
								<thead><tr align="center">
									<td colspan="3">&nbsp;</td>									
								</tr>
								</thead>	
							<tbody>
								<tr>
									<td width="24%" rowspan="5" align="left"><img src="../'.$_SESSION['pics'].'" width="100px" height="100px" class="img-thumbnail"></td>
									<td width="38%">Student Number:   <strong>'.$_SESSION['stdno'].'</strong></td>
									<td width="38%">Session:<strong>'.$_SESSION['csession'].' Academic Year</strong></td>
								</tr>
								<tr>
									<td>Admission Year:  <strong>'.$_SESSION['admyear'].'</strong></td>
									<td>Term: <strong>'.$_SESSION['cterm'].'</strong></td>
								</tr>
								<tr>
									<td>Class:  <strong>'.$_SESSION['cclass'].'</strong></td>
									<td>Cummulative Average: </td>
								</tr>
								
								<tr>
								
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								</tbody>
								</table></div>
							<p>&nbsp;</p>
							';
				 	  }
if(isset ($_SESSION['cterm']) && isset ($_SESSION['cclass']) && isset ($_GET["stdid"]) && isset ($_SESSION['csession']))
{	
$class=$_SESSION['cclass'];
$examsession=$_SESSION['csession'];
$examterm=$_SESSION['cterm'];
if ($examterm=="First")
{
	 
$id=$_GET["id"];

$squery="SELECT exam_subject AS 'Subject', SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTest',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='First' THEN mark ELSE '0' END) AS 'SecondTest',SUM(CASE WHEN exam_type = 'termexam' and exam_term='First' THEN mark ELSE '0' END) AS 'Examscore', SUM(mark) as 'Total' FROM scoresheet_tab where student_id = '$id' and student_class ='$class' and exam_session='$examsession' and exam_term='$examterm' and clientapp_id='".$_SESSION['clientappid']."' GROUP BY exam_subject" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			
			$count=mysqli_num_rows($result);
			echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr><td>&nbsp;</td><td colspan="5">First Term Report</td></tr>';
				echo '<tr align="center" style="background:#39C; color:#FFF;"><td align="left">Subject</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total(%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				
				$subject=$rows['Subject'];
				$fFirstca=$rows['FirstTest'];
				$fSecondca=$rows['SecondTest'];
				$fExamscore=$rows['Examscore'];
				$fTotal=$rows['Total'];
				
				$cum=round($fTotal,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
				echo '<tr><td>'.$subject.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$fTotal.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
			
				//echo '<tr>'.$rw.$rw2.$rw3.$rw1.$rw4.$rw5.'</tr>';
			}
			
			echo '</tbody>
				<tr align="center"><td colspan="15"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
				
			</table></div>';
		}
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table></div>';//die (mysqli_error($con));
		}
}
else if ($examterm=="Second")
{
	$id=$_GET["id"];
$squery="SELECT exam_subject AS 'Subject',SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA1',
SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA2',SUM(CASE WHEN exam_type = 'termexam' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstExamscore',SUM(CASE WHEN exam_term='First' THEN mark ELSE '0' END)  as 'FirstTotal', SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA1',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA2', SUM(CASE WHEN exam_type = 'termexam' and exam_term='Second' THEN mark ELSE '0' END) AS 'SecondExamscore', SUM(CASE WHEN exam_term='Second' THEN mark ELSE '0' END)  as 'SecondTotal' FROM scoresheet_tab where student_class ='$class' and student_id = '$id' and exam_session='$examsession' and clientapp_id='".$_SESSION['clientappid']."' Group By exam_subject" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			$count=mysqli_num_rows($result);
			
			echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%;"><tbody>';
			echo '<tr align="center"><td>&nbsp;</td><td colspan="4"><strong>First Term Report</strong></td><td colspan="4"><strong>Second Term Report</strong></td><td colspan="6"><strong>&nbsp;</strong></td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Subject</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td><strong>Avg (%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				
				$subject=$rows['Subject'];
				
				$fFirstca=$rows['FirstTermCA1'];
				$fSecondca=$rows['FirstTermCA2'];
				$fExamscore=$rows['FirstExamscore'];
				$fTotal=$rows['FirstTotal'];
				
				
				$sFirstca=$rows['SedcondTermCA1'];
				$sSecondca=$rows['SedcondTermCA2'];
				$sExamscore=$rows['SecondExamscore'];
				$sTotal=$rows['SecondTotal'];
				
				$cum=($fTotal+$sTotal)/2;				
				$cum=round($cum,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
		echo '<tr><td>'.$subject.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong><strong>'.$fTotal.'</strong></strong></td><td align="center">'.$sFirstca.'</td><td align="center">'.$sSecondca.'</td><td align="center">'.$sExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong><strong>'.$sTotal.'</strong></strong></td><td align="center"><strong>'.$cum.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
										
											
			}
			echo '</tbody>
				<tr align="center"><td colspan="15"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
				
			</table></div>';
		}
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table></div>';//die (mysqli_error($con));
		}
}

else if ($examterm=="Third")
{
	$id=$_GET["id"];
$squery="SELECT exam_subject AS 'Subject',SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA1',
SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstTermCA2',SUM(CASE WHEN exam_type = 'termexam' and exam_term='First' THEN mark ELSE '0' END) AS 'FirstExamscore',SUM(CASE WHEN exam_term='First' THEN mark ELSE '0' END)  as 'FirstTotal', SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA1',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='Second' THEN mark ELSE '0' END) AS 'SedcondTermCA2', SUM(CASE WHEN exam_type = 'termexam' and exam_term='Second' THEN mark ELSE '0' END) AS 'SecondExamscore', SUM(CASE WHEN exam_term='Second' THEN mark ELSE '0' END)  as 'SecondTotal',SUM(CASE WHEN exam_type = 'FirstCA' and exam_term='Third' THEN mark ELSE '0' END) AS 'ThirdTermCA1',SUM(CASE WHEN exam_type = 'SecondCA' and exam_term='Third' THEN mark ELSE '0' END) AS 'ThirdTermCA2',SUM(CASE WHEN exam_type = 'termexam' and exam_term='Third' THEN mark ELSE '0' END) AS 'ThirdExamscore', SUM(CASE WHEN exam_term='Third' THEN mark ELSE '0' END)  as 'ThirdTotal' FROM scoresheet_tab where student_class ='$class' and student_id = '$id' and exam_session='$examsession' and clientapp_id='".$_SESSION['clientappid']."' Group By exam_subject" ;
$result=mysqli_query($con,$squery);
		if(mysqli_num_rows($result))
		{
			$count=mysqli_num_rows($result);
			
			echo '<div class="table-responsive"><table width="75%" class="table table-bordered" style="width:75%; marging-right:10px;"><tbody>';
			echo '<tr align="center"><td>&nbsp;</td><td colspan="4"><strong>First Term Report</strong></td><td colspan="4"><strong>Second Term Report</strong></td><td colspan="4"><strong>Third Term Report</strong></td><td colspan="2">&nbsp;</td></tr>';
				echo '<tr style="background:#39C; color:#FFF;"><td>Subject</td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td>CA1</td><td>CA2</td><td>Exam Score</td><td><strong>Total (%)</strong></td><td><strong>Avg (%)</strong></td><td><strong>Grade</strong></td></tr>';
				
			while ($rows = mysqli_fetch_array($result))
			{ 
				$subject=$rows['Subject'];
				
				$fFirstca=$rows['FirstTermCA1'];
				$fSecondca=$rows['FirstTermCA2'];
				$fExamscore=$rows['FirstExamscore'];
				$fTotal=$rows['FirstTotal'];
				
				$sFirstca=$rows['SedcondTermCA1'];
				$sSecondca=$rows['SedcondTermCA2'];
				$sExamscore=$rows['SecondExamscore'];
				$sTotal=$rows['SecondTotal'];
				
				$tFirstca=$rows['ThirdTermCA1'];
				$tSecondca=$rows['ThirdTermCA2'];
				$tExamscore=$rows['ThirdExamscore'];
				$tTotal=$rows['ThirdTotal'];
				
				$cum=($fTotal+$sTotal+$tTotal)/3;
				$cum=round($cum,1);
				$grade='';if(($cum>=70) && ($cum<=100)){$grade='A';}else if(($cum>=60) && ($cum<=69.9)){$grade='B';}else if(($cum>=50) && ($cum<=59.9)){$grade='C';}else if(($cum>=40) && ($cum<=49.9)){$grade='D';}else if(($cum>=30) && ($cum<=39.9)){$grade='E';}else if($cum<30){$grade='F';}
				
		echo '<tr><td>'.$subject.'</td><td align="center">'.$fFirstca.'</td><td align="center">'.$fSecondca.'</td><td align="center">'.$fExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$fTotal.'</strong></td><td align="center">'.$sFirstca.'</td><td align="center">'.$sSecondca.'</td><td align="center">'.$sExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$sTotal.'</strong></td><td align="center">'.$tFirstca.'</td><td align="center">'.$tSecondca.'</td><td align="center">'.$tExamscore.'</td><td align="center" style="background:#39C; color:#FFF;"><strong>'.$tTotal.'</strong></td><td align="center"><strong>'.$cum.'</strong></td><td align="center"><strong>'.$grade.'</strong></td></tr>';
				
		
			}
			echo '</tbody>
				<tr align="center"><td colspan="15"><strong>Grade Scale<br>70-100=A, 60-69.9=B, 50-59.9=C, 40-49.9=D, 30-39.9=E, <30=F</strong> </td></tr>
				
			</table></div>';
			//echo '<table class="table"></table>';
		}
			
		
		else {
			echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data For Selected Student or Wrong Input Selected</td></tr></table></div>'; //die (mysqli_error($con));
		}
 }

}else
{
	echo '<div class="table-responsive"><table class="table" width=80%><tr><td align="center">No Data Fetched From Database, Most Likely No Result Has Been Computed Yet</td></tr></table></div>';
}
?>
                      </div>
                    </div>
                 
             
              </form>
             	
                  
                
                         </div>
                      </div>
                    </div><!-- /.col -->
                   
                      
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- ./box-body -->
                
              </div><!-- /.box -->
            </div><!-- /.col -->
           
         

         
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        
          <b>Copyright &copy; <?php echo date('Y');?> <a href="http://shoolhive.com"><?php echo $_SESSION['companyname']; ?></a>.</b> All rights reserved.
      
      </footer>

         </div><!-- ./wrapper -->
    <script src="../plugin/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugin/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../plugin/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugin/chartjs/Chart.min.js"></script>
    <script src="parentapp.js"></script>
   
  </body>
</html>
