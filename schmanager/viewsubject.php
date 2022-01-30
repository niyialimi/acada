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
    <title>Admin View All Classes</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugin/iCheck/all.css">
    <link rel="stylesheet" href="../plugin/datatables/dataTables.bootstrap.css">

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
                <li><a href="staffattendance.php"><i class="fa fa-circle-o"></i> Employee Attendance</a></li>               
              </ul>
            </li>
            
            <li class="active treeview">
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
                <span>Manage Subjects/Courses</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="addsubject.php"><i class="fa fa-circle-o"></i> Add New Subject</a></li>
                <li><a href="viewsubjects.php"><i class="fa fa-circle-o"></i> View All Subject</a></li>
                <li><a href="assignsubject.php"><i class="fa fa-circle-o"></i> Assign Subject</a></li>
                <li><a href="assignsubteach.php"><i class="fa fa-circle-o"></i> Assign Teacher/Instructor</a></li>                             
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
            <i class="fa fa-university"></i> Manage Class
          </h1>
          <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-university"></i> Manage Class</a></li>
            <li class="active">View All Class</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
              
		<div class="box" id="regbox">
            <div class="box">
                <div class="box-header">
                  <h4 class="box-title">Class List</h4>
                  <a href="addclass.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>  Add New Class</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="classtable1" class="table table-bordered table-striped" style="width:100%;">
                    <thead>
                      <tr>
                      	
                        <th>Subject Name</th>
                        <th>Subject Category</th>
                        <th>Subject Alias</th>
                        <th>Subject Status</th>
                        <td>Action</td>
                        
                      </tr>
                    </thead>
                    
   
    
                    <tfoot>
                      <tr>
                       
                        <th>Subject Name</th>
                        <th>Subject Category</th>
                        <th>Subject Alias</th>
                        <th>Subject Status</th>
                        <td>Action</td>
                       
                      </tr>
                    </tfoot>
              </table>
              </div>
              </div>
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
    <script src="../plugin/iCheck/icheck.min.js"></script>
    <script src="../plugin/countries.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="../plugin/year-select.js"></script>
    <script src="schapp.js"></script>
    <script src="../plugin/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugin/datatables/dataTables.bootstrap.min.js"></script>
<script>
      $(function () {
        $("#classtable1").DataTable({
		"responsive": true,
		"bProcessing": true,
		"sAjaxSource": "script/subjectviewscript.php",
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		//"iDisplayLength": 5,
        "aoColumns": [

             
              { mData: 'Name' },
			  { mData: 'Category' },
              { mData: 'Alias' },
			  { mData: 'Status' },
			  {
                mData: null,
                defaultContent: '<a href="#" class="add btn btn-primary" ata-toggle="tooltip" data-placement="bottom" title="View Full Record"><i class="fa fa-search"></i></a>&nbsp;<a href="#" class="add btn btn-info" ata-toggle="tooltip" data-placement="bottom" title="Edit Record"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="#" class="remove btn btn-danger" ata-toggle="tooltip" data-placement="bottom" title="Delete Record"><i class="fa fa-minus-circle" data-id="" data-name=""></i></a>',				
                orderable: false			
				
            },
			
			 

            ],
			columnDefs : [
        { targets : [4],
          render : function (mData, type, row) {
             return mData == '1' ? 'Enabled' : 'Disabled'
          }
        },		
			 {
			  "targets": "_all",			  
			 }
/*{
      "targets": 0, // your case first column
      "className": "text-right",
      "width": "4%"
 }*/
   ]
			});        
      });
</script>  

  </body>
</html>
