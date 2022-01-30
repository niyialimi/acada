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
    <title>Admin View All Staffs</title>
    
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
            
            <li class="active treeview">
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
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="payment.php"><i class="fa fa-circle-o"></i> Payment Settings</a></li>
                <li><a href="settings.php"><i class="fa fa-circle-o"></i> School Settings</a></li>
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
            <i class="fa fa-users"></i> Manage Staff
          </h1>
          <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-graduation-cap"></i> Manage Staff</a></li>
            <li class="active">View Staff Record</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
         <!--div class="row">
          <form action="script/dataexport.php" method="post" name="export_excel">
          <div class="col-md-4">
          <select class="form-control" name="seachby" id="searchby">
          	<option>Surname</option>
            <option>Class</option>
            <option>Student Number</option>            
           </select>
          </div>
          <div class="col-md-4"><input type="text" class="form-control" id="myInput2" name="myInput2" onkeyup="myFunction2()" placeholder="Search Parameter"></div>
          <div class="col-md-4"><button type="submit" id="export" name="search" class="btn btn-primary btn-group-lg">Search For Data  <i class="fa fa-search"></i></button></div>         
            </form>
            </div-->        
		<div class="box" id="regbox">
            <div class="box">
                <div class="box-header">
                  <h4 class="box-title">Employee List</h4>
                  <a href="addemployee.php" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="Add New Staff"><i class="fa fa-plus"></i></a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="stdtable1" width="100%" class="table table-bordered table-striped">
                    <thead style="background:#39C; color:#FFF;">
                      <tr>
                      	
                        <th>Title</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Staff Type</th>
                        <th>Staff Number</th>
                        <th>Status</th>
                        <th>Staff Image</th>
                        <th>Action</th>
                      
                      </tr>
                    </thead>
                    
   
    
                    <tfoot style="background:#39C; color:#FFF;">
                      <tr>
                       
                        <th>Title</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Staff Type</th>
                        <th>Staff Number</th>
                        <th>Status</th>
                        <th>Staff Image</th>
                        <th>Action</th>
                        
                      </tr>
                    </tfoot>
              </table>
              
              <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class="modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
              Staff Full Detail
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="display"></div>
         </div>
         
         <div class = "modal-footer">
            <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>            
         </div>
            
         </div>
       </div>  
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
              
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
        $("#stdtable1").DataTable({
			
		"bProcessing": true,
		"sAjaxSource": "script/staffviewscript.php",
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		//"iDisplayLength": 5,
        "aoColumns": [

             
			  { mData: 'Title' },
              { mData: 'Name' },
              { mData: 'Phone' },
			  { mData: 'Email' },
			  { mData: 'Staff_Type' },
			  { mData: 'Staff_Number' },
			  { mData: 'Status' },			  			  
			  { mData: 'Imageurl' },
			  {
                mData: 'staffid'              		
				
            },
			 

            ],
			columnDefs : [
        { targets : [6],
          render : function (mData, type, row) {
             return mData == '1' ? 'Active' : 'Not-Active'
          }
        },
		{
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
                "render": function ( data, type, row ) {
                    return '<img src="../'+data+'" width="50px" height="50px" class="hoverImage img-circle" />';
                },
                "targets": 7 // column index 
             },
			 
			 {
				 "render": function (data, type, row, meta) {
				  return '<a href="#" class="add btn btn-xs btn-primary" id="staffviewbut" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="View Full Record"><i class="fa fa-eye"></i></a>&nbsp;<a href="#" class="add btn btn-xs btn-info" id="staffeditbut" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="Edit Record"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="#" class="remove btn btn-xs btn-danger" id="staffdelete" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="Delete Record"><i class="fa fa-minus-circle"></i></a>'
				  orderable: false
			 },"targets": 8},
			 
			 { "width": "15%", "targets": 1 },{ "width": "7%", "targets": 4 },{ "width": "4%", "targets": 5 },
			 {
			  "targets": "_all",
			  "className": "text-center",
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
