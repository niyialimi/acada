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
    <title>::Test Score Sheet</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugin/datepicker/bootstrap-datepicker.css">
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
            
            <li class="treeview">
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
            Manage Student
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file-text"></i> Manage Student</a></li>
            <li class="active">Manage C.A</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
         

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12 col-sm-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Continuous Assessment Test</h3>
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
                       <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <form action="" class="scoresheet" id="loadscoresheetform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
                               <div class="form-group">                               
                                <label for="classname" class="col-form-label">Class Name</label>
                             	   <select class="form-control" name="clname" id="clname" required>
                  		 			 <option value="">Select a Class</option>
                                    <?php
							  
										  $xquery="select class_id,class_name,class_arm from class_tab where staff_id='".$_SESSION['staffid']."'";
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
                               
                               </div>
                               
                               <div class="form-group">
                                    <label for="classname" class="col-form-label">Class Section/Arm</label>
                                  <div class="">
                                      <input type="text" class="form-control" name="classarm" id="classarm" placeholder="Section or Arm" readonly>
                                    </div>
                                </div>
                                
                             <div class="row form-group has-feedback">
                              <div class="col-xs-12 col-md-6 col-lg-6">    
                                <label for="classname" class="col-form-label">Subject</label>
                             	   <select class="form-control" name="subname" id="subname" required>
                  		 			 <option value="">Select Subject</option>
                                    <?php
							  
										  $xquery="select subject_name,subject_id from subject_tab";
										  $output=mysqli_query($con,$xquery);
										   if(mysqli_num_rows($output))
										   {
											   while($rows=mysqli_fetch_array($output))
											   {
												   $_SESSION['subjectname']=$rows['subject_name'];
												   $_SESSION['subjectid']=$rows['subject_id'];
												   
									?>  
                                   <option value="<?php echo $_SESSION['subjectname']; ?>"><?php echo $_SESSION['subjectname']; ?></option> 
                                    <?php
									   }
									   
								   }
								  ?>
                               </select>
                               </div>
                              
                              <div class="col-xs-12 col-md-6 col-lg-6">    
                              	<label>Test Type</label>
                                      <select name="type" id="type" class="form-control"> 
                                      <option value="FirstCA">First CA</option>
                                      <option value="SecondCA">Second CA</option>
                                      <option value="ThirdCA">Third CA</option>                                             
                                      </select>
                              </div>
                             </div>
                               
                             <div class="row form-group has-feedback">
                              <div class="col-xs-12 col-md-6 col-lg-6">                              
                               
                                    <label for="classname" class="col-form-label">Session</label>
                                  <div class="">
                                      <input type="text" class="form-control" name="csession" id="csession" placeholder="" data-error="Current Session cannot be empty" value="<?php echo date('Y')."/".date('Y',strtotime('+1 year')) ?>" required>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-md-6 col-lg-6">
                                             
                                   <label>Term</label>
                                      <select name="cterm" id="cterm" class="form-control"> 
                                      <option value="First">First</option>
                                      <option value="Second">Second</option>
                                      <option value="Third">Third</option>                                             
                                      </select>
                                 
                                </div>
                                
                               </div>
                             
                               <div class="form-group">
                                    <label for="classname" class="col-form-label">Exam Date</label>
                                  <div class="">
                                      <input type="text" class="form-control exampick" name="cexamdate" id="cexamdate" placeholder="Date Exam Was Taken" required>
                                    </div>
                                </div>
                                
                       <div align="center">
             <button type="submit" name="testmarksheetbut" id="testmarksheetbut" class="btn btn-info">Load Mark Sheet&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
            </div>
                                </form>
                            </div>
                            <div class="col-md-8 col-sm-12">
                            	<div class="table-responsive">
                                <div class="panel panel-primary">
                                      <!-- Default panel contents -->
                                   <div class="panel-heading" id="showsubject" align="center"><strong>Continuous Assessment (CA) Score Sheet</strong></div>
                                   <div class="panel-body">                                      
                                   <form action="" class="testform" id="testmarkform"  enctype="multipart/form-data" method="post" role="form">
                                   <input type="hidden" name="subject" id="subject"><input type="hidden" name="session" id="session">
                                   <input type="hidden" name="term" id="term"><input type="hidden" name="examdate" id="examdate">
                                   <input type="hidden" name="examtype" id="examtype">
                                  <table id="stdtable1" class="table table-bordered">
                                  
                                    
                                    
                                   </table>
                                   <div id="message"> </div>
                                   <div align="center">
                                 <button type="submit" name="subtstmarkbut" id="subtstmarkbut" class="btn btn-info">Submit Marks Sheet&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
                                </div>
                                   </form>
                                    
                                      </div>
                                   	</div>
                              </div>
                            </div>
                          
                        </div>
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
    <script src="plugin/sparkline/jquery.sparkline.min.js"></script>
    <!--script src="plugin/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugin/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugin/slimScroll/jquery.slimscroll.min.js"></script-->
    <script src="../plugin/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="staffapp.js"></script>
    <script>
 $(document).ready(function(e){
	$("#clname").change(function(){
		//alert('wehere');//checking
			var clname=$(this).val(); 
				// alert(atclass);
				// alert(clname);
		$.ajax({
	  	type: 'POST',
		url: 'script/classsectionselect.php',
		data: {clname:clname},		
		dataType:'html',
		  success: function(returndata){
			 
			 $('#classarm').val(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#classarm').val(returndata);
		  }
		  
		}); return false;
			
		});
		 $(".exampick").datepicker({ 
		format: 'yyyy-mm-dd', 
		autoclose: true, 
		todayBtn: 'linked',
		 weekStart: 1,
		 todayHighlight: 1
		});
		
		
});
 </script>
 <script type="text/javascript">
 $(document).ready(function () {
       
		
});
</script>
   
  </body>
</html>
