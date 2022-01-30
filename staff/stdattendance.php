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
    <title>::Student Attendance</title>
    
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
            
            <li>
              <a href="staffdashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              
            </li>
           
            <li class="active treeview">
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
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12 col-sm-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Attendance Sheet</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
                        <div class="table-responsive">
                        <div class="col-md-2"><label class="pull-right">Select a Class</label></div>
                  <div class="col-md-6">
                  <form action="script/attendancesheet.php" name="att" class="stdatted" id="stdattendform"  enctype="multipart/form-data" method="post" role="form">
                  <select class="form-control" name="stdattclass" id="stdattclass" required>
                  		  <option value="">Select a Class</option>
                           <?php
							  
							  $xquery="select * from class_tab where staff_id='".$_SESSION['staffid']."'";
							  $output=mysqli_query($con,$xquery);
							   if(mysqli_num_rows($output))
							   {
								   while($rows=mysqli_fetch_array($output))
								   {
									  
									   $_SESSION['classname']=$rows['class_name'];
									   $_SESSION['classarm']=$rows['class_arm'];
									   $_SESSION['classid']=$rows['class_id'];
						?>   
                         <option value="<?php echo $_SESSION['classid']; ?>"><?php echo $_SESSION['classname']." ".$_SESSION['classarm']; ?></option> 
                          
                        <?php
							   }
							   
						   }
						  ?>
                  </select>
                  <input type="hidden" name="classarm" id="classarm" value="">
                  </form>
                  </div>
                 <div class="col-md-4">
                
                 </div>
                  </div>
                  <p>&nbsp;</p>
                <form action="" class="atform" id="attform"  enctype="multipart/form-data" method="post" role="form">
                <div class="table-responsive">
                  <table id="stdtable1" class="table table-bordered table-striped">
                    
  
                    
                    
                      </table>
                      </div>
                      <div id="message"> </div>
                       <div align="center" id="submitbut">
             <button type="submit" name="stdattendbut" id="stdattendbut" class="btn btn-info">Submit Student Attendance&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
            </div>
                      </form>
                         </div>
                      </div>
                    </div><!-- /.col -->
                   
                      
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
           
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
    <script src="plugin/sparkline/jquery.sparkline.min.js"></script>
    <script src="plugin/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugin/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugin/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugin/chartjs/Chart.min.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="staffapp.js"></script>
    <script>		
    	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
 </script>
 <script>
 $(document).ready(function(){
	$("#submitbut").hide();
		
	});
 </script>


   
  </body>
</html>
