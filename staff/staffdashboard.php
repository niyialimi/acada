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
    <title>::Dashboard</title>
    
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
           <?php echo $_SESSION['toprightstaff']; ?>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo "../".$_SESSION['staffpics'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><span class="hidden-xs"><?php echo $_SESSION['staffusername'];?></span></p>
              <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
            </div>
          </div>          
          <ul class="sidebar-menu">
            
            <li class="active treeview">
              <a href="staffdashboard.php">
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
                <li><a href="stdattendance.php"><i class="fa fa-circle-o"></i> Mark Attendance</a></li>
                <li><a href="examscore.php"><i class="fa fa-circle-o"></i> Input Exam Score</a></li>
                <li><a href="testscore.php"><i class="fa fa-circle-o"></i> Input Test Score</a></li>
                <li><a href="viewstd.php"><i class="fa fa-circle-o"></i> View Student</a></li>               
              </ul>
            </li>
            
            <li class="treeview">
              <a href="myclass.php">
                <i class="fa fa-university"></i>
                <span>My Class</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="assignment.php"><i class="fa fa-circle-o"></i> Assignment</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> My Class Subject</a></li>           
              </ul>
            </li>
           
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="staffattendance.php"><i class="fa fa-circle-o"></i> My Attendance</a></li>
                <li><a href="stdattendreport.php"><i class="fa fa-circle-o"></i> Student Attendance Report</a></li>              
             	<li><a href="#"><i class="fa fa-circle-o"></i> My Timetable</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> General Timetable</a></li>
                <li><a href="marks.php"><i class="fa fa-circle-o"></i> Student Mark Summary</a></li>
                <li><a href="reportsheet.php"><i class="fa fa-circle-o"></i> Student Report Sheet</a></li>   
             </ul>
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
            <div class="col-md-7 col-sm-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">My Profile</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                         <?php
							  $fullclass='';
							 $xquery="select class_name,class_arm,class_alias from class_tab where staff_id='".$_SESSION['staffid']."'";
							 $output=mysqli_query($con,$xquery);
							 if(mysqli_num_rows($output))
							   {
								   while($rows=mysqli_fetch_array($output))
								   {
									   $_SESSION['classname']=$rows['class_name'];
									   $_SESSION['classarm']=$rows['class_arm'];
									   $_SESSION['classalias']=$rows['class_alias'];
									   
											$fullclass.=  $_SESSION['classalias']." ".$_SESSION['classarm'].'<br>';
							
									 }
							   }else{$fullclass.='Not Assigned';}
							 ?>
                         <table width="100%">
                         <tr><td style="margin-left:10px;" width="29%" rowspan="5">
                         	<img src="<?php echo "../".$_SESSION['staffpics'];?>" width="150px" height="150px" alt="Staff Image" class="img-thumbnail">
                         </td>
                         <td width="22%" style="font-size:16px;">&nbsp;&nbsp;Staff Name:&nbsp;</td>
                         <td width="49%" style="font-size:16px;"><strong><?php echo $_SESSION['stafflname']." ".$_SESSION['stafffname'];?></strong></td>
                         </tr>
                         <tr>
                         <td style="margin-left:10px;font-size:16px;">&nbsp;&nbsp;Staff Number: &nbsp;</td>
                         <td style="margin-left:10px;font-size:16px;"><strong><?php echo $_SESSION['staffnum'];?></strong></td>
                         </tr>
                         <tr>
                           <td style="margin-left:10px;font-size:16px;">&nbsp;&nbsp;Staff Type: &nbsp;</td>
                           <td style="margin-left:10px;font-size:16px;"><strong><?php echo $_SESSION['stafftype'];?></strong></td>
                         </tr>
                         
                         <tr><td colspan="2">&nbsp;&nbsp;</td></tr>
                         <tr><td colspan="2">&nbsp;&nbsp;</td></tr>
                        	 
                         </table> <!--?php echo $_SESSION['staffid'];?-->
                      </div>
                    </div><!-- /.col -->
                   <div class="col-md-4"><strong>Class In Charge</strong><br><?php echo $fullclass;?></div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                      <a href="staffattendance.php">
                        <span class="description-percentage text-green"><i class="fa fa-hand-pointer-o fa-3x"></i></span>
                        <h5 class="description-text">My Attendance</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                      <a href="stdattendance.php">
                        <span class="description-percentage text-yellow"><i class="fa fa-users fa-3x"></i></span>
                        <h5 class="description-text">Student Attendance</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                      <a href="marks.php">
                        <span class="description-percentage text-blue"><i class="fa fa-file-text fa-3x"></i></span>
                        <h5 class="description-text">Student Marks</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                      <a href="mytimetable.php">
                       <span class="description-percentage text-red"><i class="fa fa-tasks fa-3x"></i></span>
                        <h5 class="description-text">My Timetable</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
            <div class="col-md-5 col-sm-12">
            
            	<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">My Messages</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                     	 <ul class="timeline">
 <?php
							  
	$xquery="select * from message_tab where msg_sender='Admin' and clientapp_id='".$_SESSION['clientappid']."' order by msg_id desc limit 3";
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
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
               
              </div>
            
            </div>
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12 col-sm-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">School Time Table</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
                        <!-- Map will be created here -->
                        <div id="world-map-markers" style="height: 325px;">Time Table Here</div>
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
    <script src="../plugin/chartjs/Chart.min.js"></script>
    <script src="staffapp.js"></script>
   
  </body>
</html>
