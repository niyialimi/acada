<?php 
require_once('../req/config.php');
require_once('../req/declear.php');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugin/datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
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
        <a href="index2.html" class="logo">
          <!-- logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Sch</b>Hive</span>
          <!-- mobile devices logo-->
          <span class="logo-lg"><b>Sch</b>Hive</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">X</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                          </h4>
                          <p>Why not buy a new awesome theme?</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> You changed your username
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 9 tasks</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% Complete</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">View all tasks</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../dist/img/avatar5.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
                    <p>
                      User Name - Admin
                      <small>Employee since Nov. 2012</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>User Name</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            
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
                <li><a href="enrolstd.php"><i class="fa fa-circle-o"></i> Enrol New Student</a></li>
                <li><a href="viewstd.php"><i class="fa fa-circle-o"></i> View Student Record</a></li>
                <li><a href="viewstd.php"><i class="fa fa-circle-o"></i> Student Attendance</a></li>               
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
                <li><a href="assignclass.php"><i class="fa fa-circle-o"></i> Assign Teacher/Instructor</a></li>                             
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Manage Subjects/Courses</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addclass.php"><i class="fa fa-circle-o"></i> Add New Subject</a></li>
                <li><a href="viewclass.php"><i class="fa fa-circle-o"></i> View All Subject</a></li>
                <li><a href="assignclass.php"><i class="fa fa-circle-o"></i> Assign Subject</a></li>
                <li><a href="assignclass.php"><i class="fa fa-circle-o"></i> Assign Teacher/Instructor</a></li>                             
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Manage Parent</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="assignparent.php"><i class="fa fa-circle-o"></i> Assign Parent</a></li>
                <li><a href="viewparent.php"><i class="fa fa-circle-o"></i> View All Parent</a></li>              
              </ul>
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
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Attendance Summary</a></li>
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Student Report</a></li>              
             	<li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Employee Report</a></li>
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Student Mark Summary</a></li>
                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> Student Report Sheet</a></li>   
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
            <i class="fa fa-graduation-cap"></i> Manage Student
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Manage Student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box-body">
           
             <div class="register-box-body">
        <p class="login-box-msg">Add New Student</p>
        <form action="" class="addform" id="myform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
          <div class="form-group has-feedback">
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Full name" data-error="Name cannot be empty" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-error="Enter a correct email Address" required>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="mobileno" id="mobileno" placeholder="Mobile Number example 080XXXXXXXX or 23480XXXXXXXX" data-error="Phone Number cannot be empty" data-inputmask='"mask": "080XXXXXXXXX"' data-mask required>
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          
          <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                                             
                       <label>Gender</label>
                          <select name="gender" id="gender" class="form-control">
                            <option  value="Male">Male</option>
                            <option value="Female">Female</option>                                        
                          </select>
                     
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xs-12 col-md-6 col-lg-6">
                       
                        <label>Title</label>
                          <select name="etitle" id="etitle" class="form-control">
                            <option  value="Mr">Mr.</option>
                            <option value="Mrs">Mrs.</option>
                            <option value="Miss">Miss.</option>                                        
                          </select>
                      <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
          
          
            <div class="form-group">
                <textarea class="form-control" rows="3" name="address" id="address" placeholder="Enter Address ..." data-error="Address cannot be empty" required></textarea>
                <div class="help-block with-errors"></div>
            </div>
            
            <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                                             
                       <label>Marital Status</label>
                          <select name="mstatus" id="mstatus" class="form-control">
                            <option  value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Divorced">Divorced</option>                   
                          </select>
                     
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xs-12 col-md-6 col-lg-6">
                       
                        <label>Date of Birth</label>
                          <input type="text" name="dob" id="dob" class="form-control datepick" placeholder="Birth Day in format 10/10/2010" data-error="Birthday Field cannot be empty" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>
                      <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
			
            <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-md-6 col-lg-6">
                        <label>Department</label>
                          <select class="form-control" name="dept" id="dept">
                            <option  value="Admin">Admin</option>
                            <option value="Sales and Marketing">Sales and Marketing</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Customer Care">Customer Care</option>                            
                          </select>                    
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xs-12 col-md-6 col-lg-6">                        
                        <label>Position</label>
                          <input type="text" class="form-control" name="post" id="post" placeholder="Employee Postion" data-error="Position cannot be empty" required>                      <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
                  
                  <div class="row form-group">
                    <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">
                                             
                       <label>Employee Number</label>
                        <input type="text" name="empno" id="empno" class="form-control" placeholder="Employee Roll Number In company" data-error="Field Cannot be empty" required>
                      <div class="help-block with-errors"></div>
                     
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xs-12 col-md-6 col-lg-6">
                       <label for="exampleInputFile">Employee Picture</label>
                       <input type="file" name="profileImg" id="file" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration" required>
                        <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
                  
                     <span class="help-block"> Minimum of 6 characters and maximum of 20 character</span>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="pwd" id="pwd" data-minlength="6" data-maxlength="20" placeholder="Password" required>
            <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="rpwd" id="rpwd" placeholder="Retype password" data-match="#pwd" data-match-error="Whoops, password doesn't match" required>
            <span class="glyphicon glyphicon-asterisk form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          <p><strong>Refree information</strong></p>
           <div class="form-group has-feedback">
            	<input type="text" class="form-control" name="rname" id="rname" placeholder="Refree Name">
            	<span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="rmobile" id="rmobile" placeholder="Refree Mobile Number">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
          </div>
          <div class="form-group">
                <textarea class="form-control" name="raddress" id="raddress" rows="3" placeholder="Refree Address ..."></textarea>
            </div>
            <div align="center" id="flash"></div>
            <div align="center" id="success"></div>
            <div id="message_container">
              <div id="message" class="success">
                <p>This is a success message.</p>
              </div>
            </div>
          <div class="row">            
            <div class="col-xs-3 col-md-5 col-lg-5"></div>
            <div class="col-xs-6 col-md-4 col-lg-4" id="regbut">            
              <button type="submit" id="regbut" class="btn btn-info">Add New Student&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
</button>
            </div><!-- /.col -->
            <div class="col-xs-3 col-md-3 col-lg-3"></div>
          </div>         
        </form>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

            </div>        
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
    <script src="../plugin/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript">
 $(document).ready(function () {
        $(".datepick").datepicker({ 
		format: 'yyyy-mm-dd', 
		autoclose: true, 
		todayBtn: 'linked',
		 weekStart: 1,
		 todayHighlight: 1
		});
    });
</script>
   
  </body>
</html>
