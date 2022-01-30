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
    <title>::Create New Timetable</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link href="../plugin/timepicker/jquery.timepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
         <p>&nbsp;</p>
          <ul class="sidebar-menu">
            
            <li class="treeview">
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
                <li><a href="enrolstd.php"><i class="fa fa-circle-o"></i> Enrol New Student</a></li>
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
            
            <li class="active treeview">
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
            Settings
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-clock"></i> Timetable</a></li>
            <li class="active">Create Timetable</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
          
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12 col-sm-12">
              <!-- MAP & BOX PANE -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Time Table</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                          <div class="register-box-body">
                <p class="login-box-msg"></p>
        
        <form action="" class="tableform" id="timetableform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        <input type="hidden" name="clientappid" id="clientappis" value="<?php echo $_SESSION['clientappid']; ?>">           
           
         <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                      
                       <label>Class Name</label>                       
           			 <select class="form-control" name="tableclass" id="tableclass"  required>   
                     	<option value="" readonly>Select Class</option>               		  
                  	 	  <?php
							  
							  $xquery="select * from class_tab where clientapp_id='".$_SESSION['clientappid']."'";
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
            
            		<div class="help-block with-errors"></div>
         		 </div>                   
                 
                   <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label>Subject</label>
                  <div class="form-group has-feedback">
                    
                    <select class="form-control" name="tablesubject" id="tablesubject"  required>  
                     <option value="">Select Subject</option>
                     <?php
				 	$selectquery = "select subject_name from subject_tab where clientapp_id='".$_SESSION['clientappid']."'";
					$selectData=mysqli_query($con,$selectquery) or die("database error:". mysqli_error($con));
					
					if(mysqli_num_rows($selectData))
					   {
						   while($rows=mysqli_fetch_assoc($selectData))
							   {	
							   	 echo '<option value="'.$rows['subject_name'].'">'.$rows['subject_name'].'</option>';	
									
							   }
					   }
				 ?>          
                     
                  </select>
                    
                    <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  
                 </div> <!-- /.row -->              
                 
                 
                  <div class="row has-feedback">
                  <div class="form-group col-xs-12 col-md-6 col-lg-6"> 
                        <label>Subject Teacher</label>                   
                  <select class="form-control" name="tableteacher" id="tableteacher" required>
                  <?php		
                  $xquery="select * from staff_tab where staff_type='Teaching' and clientapp_id='" . $_SESSION['clientappid'] . "' order by staff_id asc";
                  $output=mysqli_query($con,$xquery);
                   if(mysqli_num_rows($output))
                   {
                       while($rows=mysqli_fetch_assoc($output))
                       {				   	
                  ?>
                  <option value="<?php echo $rows['staff_id']; ?>"><?php echo $rows['staff_lname']." ".$rows['staff_fname'] ?></option>
                  <?php
                     }
                   }
                  ?>
                    </select>
                    <div class="help-block with-errors"></div>
                      </div>               
                            
                  <div class="form-group col-xs-12 col-md-6 col-lg-6">                                      
                   <div class=" has-feedback">
                    <label>Week Day</label>                      
            <select class="form-control" name="tableday" id="tableday" required>
                  		  <option value="1">Monday</option>
                  	 	  <option value="2">Tuesday</option>            
                          <option value="3">Wednesday</option>              
                          <option value="4">Thursday</option>
                          <option value="5">Friday</option> 
                          <option value="6">Saturday</option>                      
                  </select>
            
                    <div class="help-block with-errors"></div>
                  </div>
          	 </div><!-- /.col -->
             
          </div>
     
                   
            
        <div class="row has-feedback">
                    <div class="form-group col-xs-6 col-md-4 col-lg-4"> 
                        <label>Period</label>                   
                  <select class="form-control" name="tableperiod" id="tableperiod" required>
                  		<option value="">Select Period</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
                        <option value="9th">9th</option>
                        <option value="10th">10th</option>
                        
                    </select>
                    <div class="help-block with-errors"></div>
                      </div>                   
                            
                  <div class="col-xs-6 col-md-4 col-lg-4">
                   		<label>Start Time</label>
                        <input type="text" class="form-control timepicker" name="tablestart" id="tablestart" placeholder="Period Start Time">
                  </div>
                  
                  <div class="col-xs-6 col-md-4 col-lg-4">
                   		<label>End Time</label>
                        <input type="text" class="form-control timepicker" name="tableend" id="tableend" placeholder="Period End Time">
                  </div>
           </div><!-- /.row -->
           
           <?php $selectsql='select current_term,current_session from setting_tab where clientapp_id="$clientid"';
	$result=mysqli_query($con,$selectsql);
		if (mysqli_num_rows($result))
			{
				while($rows=mysqli_fetch_assoc($result))
					{
						$_SESSION['csession']=$rows['current_session'];
						$_SESSION['cterm']=$rows['current_term'];
					}
					echo '';
			} ?><input type="hidden" name="cterm" id="cterm" value="<?php echo $_SESSION['cterm']?>">
            <input type="hidden" name="csession" id="csession" value="<?php echo $_SESSION['csession']?>">
           <div id="message" align="center"></div><p>&nbsp;</p>
          <div class="row">            
            <div class="col-xs-12 col-md-5 col-lg-5"></div>
            <div class="col-xs-12 col-md-4 col-lg-4">            
              <button type="submit" id="timetablebut" name="timetablebut" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Inserting Data">Insert Into Table&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
</button>&nbsp;&nbsp;
            </div><!-- /.col -->
            <div class="col-xs-12 col-md-3 col-lg-3"></div>
          </div>     
          <p>&nbsp;</p>                
        </form>       
        <div id="display"></div> 
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
    <script src="../plugin/validator.js"></script>
    <script src="../plugin/timepicker/jquery.timepicker.min.js"></script>
    <script src="schapp.js"></script>
   <script type="text/javascript">
$(document).ready(function(){
    $('input.timepicker').timepicker({
		timeFormat: 'h:mm p',
		interval: 10,
		minTime: '8',
		maxTime: '6:00pm',
		defaultTime: '8',
		startTime: '8:00',
		dynamic: false,
		dropdown: true,
		scrollbar: true
		});
});
</script>
  </body>
</html>
