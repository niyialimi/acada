<?php 
require_once('../req/config.php');
require_once('../req/declear.php');
require_once('../req/loginstatus.php');
require_once('script/topright.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::Admin Dashboard</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

   <style>
   	#chart-container {
    width: 100%;
    height: auto;
}
   </style>
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
            <?php 
			
			 $namequery="select clientapp_name from setting_tab where clientapp_id='".$_SESSION['clientappid']."'";
					  $output=mysqli_query($con,$namequery);
					   if(mysqli_num_rows($output))
					   {
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $name=$rows['clientapp_name'];
							   $_SESSION['clientname']=$rows['clientapp_name'];
							   echo $name;
						   }
					   }
			 ?>
          </a>
          <!-- Navbar Right Menu -->
           <?php echo $_SESSION['topright']; ?>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!--div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['adminrole']; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div-->
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <p>&nbsp;</p>
            <li class="active treeview">
              <a href="admindashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              
            </li>
           
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i>
                <span>Manage Student</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="enrolstd.php"><i class="fa fa-circle-o"></i> Enroll New Student</a></li>
                <li><a href="viewstd.php"><i class="fa fa-circle-o"></i> View Student Record</a></li>
                <li><a href="stdattendance.php"><i class="fa fa-circle-o"></i> Student Attendance</a></li>               
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Manage Employee</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addemployee.php"><i class="fa fa-circle-o"></i> Add New Employee</a></li>
                <li><a href="viewemployee.php"><i class="fa fa-circle-o"></i> View Employee Record</a></li>
                <li><a href="viewemployee.php"><i class="fa fa-circle-o"></i> Employee Attendance</a></li>               
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-university"></i>
                <span>Manage Class</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addclass.php"><i class="fa fa-circle-o"></i> Add New Class</a></li>
                <li><a href="viewclass.php"><i class="fa fa-circle-o"></i> View Classes</a></li> 
                <li><a href="viewtimetable.php"><i class="fa fa-circle-o"></i> View Class Timetable</a></li>                         
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Manage Subjects</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addsubject.php"><i class="fa fa-circle-o"></i> Add New Subject</a></li>
                <li><a href="viewsubjects.php"><i class="fa fa-circle-o"></i> View All Subject</a></li>                             
              </ul>
            </li>
            
            <li class="treeview">
              <a href="assignparent.php">
                <i class="fa fa-key"></i>
                <span>Manage Login</span>                
              </a>              
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-credit-card"></i>
                <span>Manage Fund</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="schpayment.php"><i class="fa fa-circle-o"></i> School Fees Management</a></li>
                <li><a href="otherpayment.php"><i class="fa fa-circle-o"></i> Other Fees</a></li>              
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="attsummary.php"><i class="fa fa-circle-o"></i> Attendance Summary</a></li>
                <li><a href="studentreport.php"><i class="fa fa-circle-o"></i> Student Report</a></li>              
             	<li><a href="staffreport.php"><i class="fa fa-circle-o"></i> Employee Report</a></li>
                <li><a href="marksummary.php"><i class="fa fa-circle-o"></i> Student Mark Summary</a></li>
                <li><a href="reportsheet.php"><i class="fa fa-circle-o"></i> Student Report Sheet</a></li>   
             </ul>
            </li>   
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-microphone"></i>
                <span>Communicate</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="sendemail.php"><i class="fa fa-circle-o"></i> E-mail</a></li>
                <li><a href="intermessage.php"><i class="fa fa-circle-o"></i> Internal Message</a></li>
                <li><a href="shortmsg.php"><i class="fa fa-circle-o"></i> SMS</a></li>
                <li><a href="news.php"><i class="fa fa-circle-o"></i> News Board</a></li>
                <li><a href="events.php"><i class="fa fa-circle-o"></i> Event Board</a></li>               
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="payment.php"><i class="fa fa-circle-o"></i> Payment Settings</a></li>
                <li><a href="settings.php"><i class="fa fa-circle-o"></i> School Settings</a></li>
                <li><a href="createtimetable.php"><i class="fa fa-circle-o"></i> Create Timetable</a></li>

              </ul>
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
            Dashboard
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-university"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Number Of Classes</span>
                  <span class="info-box-number">
                  	<?php
					  $xquery="select count(*) as total from class_tab where clientapp_id='".$_SESSION['clientappid']."'";
					  $output=mysqli_query($con,$xquery);
					   if(mysqli_num_rows($output))
					   {
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $total=$rows['total'];
							   echo $total;
						   }
					   }
					  ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-graduation-cap"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Student</span>
                  <span class="info-box-number">
                  <?php
					  $date=date('Y-m-d');
					  $xquery="select count(*) as total from student_tab where clientapp_id='".$_SESSION['clientappid']."'";
					  $output=mysqli_query($con,$xquery);
					   if(mysqli_num_rows($output))
					   {
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $total=$rows['total'];
							   echo $total;
						   }
					   }
					  ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Employee</span>
                  <span class="info-box-number">
                  	<?php
					  $xquery="select count(*) as total from staff_tab where clientapp_id='".$_SESSION['clientappid']."'";
					  $output=mysqli_query($con,$xquery);
					   if(mysqli_num_rows($output))
					   {
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $total=$rows['total'];
							   echo $total;
						   }
					   }
					  ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="fa fa-envelope"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Subjects/Courses</span>
                  <span class="info-box-number">
                  	<?php
					  $xquery="select count(*) as total from subject_tab where clientapp_id='".$_SESSION['clientappid']."'";
					  $output=mysqli_query($con,$xquery);
					   if(mysqli_num_rows($output))
					   {
						   while($rows=mysqli_fetch_assoc($output))
						   {
							   $total=$rows['total'];
							   echo $total;
						   }
					   }
					  ?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
          
          <div class="row">
          <div class="col-md-12">
              <!-- Quick Link PANE -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Links</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
                      	
                	  <div class="row">
                    <div class="col-sm-2 col-xs-3">
                      <div class="description-block">
                      <a href="attsummary.php">
                       <span class="description-percentage text-red"><i class="fa fa-pie-chart  fa-3x"></i></span>
                        <h5 class="description-text">Attendance Summary</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    
                    <div class="col-sm-2 col-xs-3">
                      <div class="description-block">
                      <a href="enrolstd.php">
                       <span class="description-percentage text-aqua"><i class="fa fa-user-plus fa-3x"></i></span>
                        <h5 class="description-text">Enroll Student</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    
                    <div class="col-sm-2 col-xs-3">
                      <div class="description-block">
                      <a href="addemployee.php">
                       <span class="description-percentage text-orange"><i class="fa fa-user-circle fa-3x"></i></span>
                        <h5 class="description-text">Add New Staff</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    
                    <div class="col-sm-2 col-xs-3">
                      <div class="description-block">
                      <a href="schpayment.php">
                       <span class="description-percentage text-navy"><i class="fa fa-credit-card fa-3x"></i></span>
                        <h5 class="description-text">Tution Management</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-2 col-xs-3">
                      <div class="description-block">
                      <a href="viewstd.php">
                       <span class="description-percentage text-light-blue"><i class="fa fa-users fa-3x"></i></span>
                        <h5 class="description-text">View Students</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-2 col-xs-3">
                      <div class="description-block">
                      <a href="viewemployee.php">
                       <span class="description-percentage text-fuchsia"><i class="fa fa-users fa-3x"></i></span>
                        <h5 class="description-text">View Staffs</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                 </div>
               </div><!-- /.col -->
                   
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
             
            </div>
          </div>
          
          <!-- Graph-->
          	<section class="content">
          <div class="row">
            <div class="col-md-6">
              <!-- AREA CHART -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Total Number of Student By Gender Per Class</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab" href="#home"><i class="pe-7s-plus"></i>  Nur</a></li>                  
                    <li><a data-toggle="tab" href="#menu1">Pry</a></li>
                    <li><a data-toggle="tab" href="#menu2">Sec</a></li>
                </ul>     
                 <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">                                   
                          <div class="chart">
                            <canvas id="nbarChart" style="height:250px"></canvas>
                          </div>
                     </div>
                     <div id="menu1" class="tab-pane fade">
                     	<div class="chart">
                            <canvas id="barChart" style="height:250px"></canvas>
                          </div>
                     </div>
                     <div id="menu2" class="tab-pane fade">
                     <p>&nbsp;</p>
                     </div>
                  </div>
                 
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- DONUT CHART -->
              <!--div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                    <canvas id="pieChart" style="height:250px"></canvas>
                </div><!-- /.box-body >
              </div><!-- /.box -->

            </div><!-- /.col (LEFT) -->
            <div class="col-md-6">
              <!-- LINE CHART -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Total Number Of Student Per Class</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                   <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab" href="#dhome"><i class="pe-7s-plus"></i>  Nur</a></li>                  
                    <li><a data-toggle="tab" href="#nmenu1">Pry</a></li>
                    <li><a data-toggle="tab" href="#smenu2">Sec</a></li>
                </ul>     
                 <div class="tab-content">
                    <div id="dhome" class="tab-pane fade in active">                                   
                          <div class="chart">
                            <canvas id="doughnut-chartcanvas-1" style="height:250px"></canvas>
                          </div>
                     </div>
                     <div id="nmenu1" class="tab-pane fade">
                     	<div class="chart">
                            <canvas id="doughnut-chartcanvas-2" style="height:250px"></canvas>
                          </div>
                     </div>
                     <div id="smenu2" class="tab-pane fade">
                     <p>&nbsp;</p>
                     </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

              <!-- BAR CHART -->
            <!--div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">&nbsp;</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="barChart" style="height:230px"></canvas>
                  </div>
                </div><!-- /.box-body >
              </div><!-- /.box -->

            </div><!-- /.col (RIGHT) -->
          </div><!-- /.row -->

        </section>
          <!-- Graph Ends-->

          <div class="row">
            <div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">News And Events</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="table-responsive">
                      <?php
							  
				$xquery="select * from newsevent_tab where  clientapp_id='".$_SESSION['clientappid']."' order by ne_id desc limit 10";
				$output=mysqli_query($con,$xquery);
				if(mysqli_num_rows($output))
				 {$fullclass='';
				   while($rows=mysqli_fetch_array($output))
				   {
					   $netype=$rows['ne_type'];
					   if($netype=='News'){$type='<span data-toggle="tooltip" title="3 New Messages" class="label label-info">News</span>';}
					   else{$type='<span data-toggle="tooltip" title="3 New Messages" class="label label-warning">Event</span>';}
				?>
                     <table width="100%" class="table-responsive table-condensed">
                     <tbody>
                     	<tr>
                            <td width="10%">
                            <?php echo $type; ?>
                            </td>
                            <td width="70%"><b><a href="newsevent.php?neid=<?php echo $rows['ne_id']; ?>"><?php echo $rows['ne_title']; ?></a></b></td>
                            <td width="20%"><i class="fa fa-calender"></i>  <?php echo $rows['publish_date']; ?></td>
                        </tr>
                        <?php
				   		}
				 }
						?>
                     </tbody>
                     </table>
                     </div>
                 
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                
              </div><!-- /.box -->
            </div><!-- /.col -->
          
            <div class="col-md-6">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Messages</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
      <ul class="timeline">
 <?php
							  
	$xquery="select * from message_tab where msg_sender!='Admin' and clientapp_id='".$_SESSION['clientappid']."' order by msg_id desc limit 2";
	$output=mysqli_query($con,$xquery);
	if(mysqli_num_rows($output))
	 {$fullclass='';
	   while($rows=mysqli_fetch_array($output))
	   {
	?>
    <!-- timeline time label -->
    <li class="time-label">
    
        <span class="bg-red">
            <?php echo $rows['msg_date']; ?>
        </span>
    </li>
    <!-- /.timeline-label -->

    <!-- timeline item -->
    <li>
        <!-- timeline icon -->
  
        <i class="fa fa-envelope bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="fa fa-clock-o"></i> <?php echo $rows['msg_time']; ?></span>

            <h3 class="timeline-header"><a href="#"><?php echo $rows['msg_subject']; ?></a></h3>

            <div class="timeline-body">
                <?php echo $rows['msg_body']; ?>
            </div>
			<div id="alert"></div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-xs" href="readmsg.php?msgid=<?php echo $rows['msg_id']; ?>">Read More</a>
                <a class="btn btn-danger btn-xs" id="deletebut" href="#" data-id="<?php echo $rows['msg_id']; ?>">Delete</a>
            </div>
        </div>
    </li>
    <?php 
		}
	}
	?>
    <!-- END timeline item -->

    ...

</ul>
                      </div>
                    </div><!-- /.col -->
                   
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
             
            </div>
          </div><!-- /.row -->
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
    <script type="text/javascript" src="../plugin/chartjs/Chart.min.js"></script>
    <script type="text/javascript" src="analytic.js"></script>
    <script src="schapp.js"></script>
    
   
   
  </body>
</html>
