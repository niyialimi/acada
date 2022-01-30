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
    <title>Admin View All Students</title>
    
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
     <style>
       #alert{
		position:absolute;
		top:50%;
		left:30%;
		width:400px;
		opacity:1;
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
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <p>&nbsp;</p>
            <li class="treeview">
              <a href="admindashboard.php">
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
            <i class="fa fa-graduation-cap"></i> Manage Student
          </h1>
          <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-graduation-cap"></i> Manage Student</a></li>
            <li class="active">View Student Record</li>
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
                  <h4 class="box-title">List of Registered Students</h4>
                  <a href="enrolstd.php" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="Add New Student"><i class="fa fa-plus"></i></a>
                  <a href="" class="btn btn-success pull-right" id="exportdata" data-action="exportdata" data-toggle="tooltip" data-placement="bottom" title="Export Student Data"><i class="fa fa-upload"></i></a>&nbsp;
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                  <table id="stdtable1" class="table table-bordered table-striped" style="width:100%;">
                  <div id="alert"></div>
                    <thead style="background:#39C; color:#FFF;">
                      <tr>
                      	
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Class</th>                        
                        <th>Gender</th>                        
                        <th>Age</th>
                        <th>Status</th>
                        <th>Payment</th>
                      	<th>Image</th>
                        <th>Action</th>
                        
                      </tr>
                    </thead>
                    
   					
    
                    <tfoot style="background:#39C; color:#FFF;">
                      <tr>
                       
                        <th>Name</th>
                        <th>Student Number</th>
                        <th>Class</th>                        
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Status</th>
                        <th>Payment</th>
                        <th>Image</th>
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
              Student Full Detail
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
   
   <!--modal2-->
 <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Edit Student Details
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="datadisplay"></div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
            <button type = "button" id="editallbut" class = "btn btn-primary">
               Edit Detail&nbsp;&nbsp;<i class="glyphicon glyphicon-edit icon-white"></i>
            </button>
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal2 -->
              
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
		"responsive": true,
		"bProcessing": true,
		"sAjaxSource": "script/stdviewscript.php",
		"bPaginate":true,
		"sPaginationType":"full_numbers",
		//"iDisplayLength": 5,
        "aoColumns": [

             
              { mData: 'Name' },
			  { mData: 'Roll' },
              { mData: 'Class' },			  
			  { mData: 'Gender' },
			  //{ mData: 'Parent' },			  
			  { mData: 'Age' },
			  { mData: 'Status' },
			  { mData: 'Payment' },
			  {	mData: 'imageurl'},
			  {
                mData: 'stid',
              //  defaultContent: '<a href="detailscript.php?id=" class="add btn btn-xs btn-primary" data-id="stid" data-toggle="tooltip" data-placement="bottom" title="View Full Record"><i class="fa fa-eye"></i></a>&nbsp;<a href="#" class="add btn btn-xs btn-info" ata-toggle="tooltip" data-placement="bottom" title="Edit Record"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="#" class="remove btn btn-xs btn-danger" ata-toggle="tooltip" data-placement="bottom" title="Delete Record"><i class="fa fa-minus-circle" data-id="" data-name=""></i></a>',				
                //orderable: false			
				
            },
			
			 

            ],
			columnDefs : [
        { targets : [5],
          render : function (mData, type, row) {
             return mData == '1' ? 'Active' : 'Not-Active'
          }
        },
		 { targets : [6],
          render : function (mData, type, row) {
             return mData == '1' ? 'Paid' : 'Not-Paid'
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
                // The `data` parameter refers to the data for the cell (defined by the
                // `data` option, which defaults to the column being worked with, in
                // this case `data: 0`.
             //   "return '<a href="view/order?' + data + '" class="add btn btn-xs btn-primary" id="viewbut" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="View Full Record"><i class="fa fa-eye"></i></a>&nbsp;<a href="view/order?' + data + '" class="add btn btn-xs btn-info" ata-toggle="tooltip" data-placement="bottom" title="Edit Record"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="view/order?' + data + '" class="remove btn btn-xs btn-danger" ata-toggle="tooltip" data-placement="bottom" title="Delete Record"><i class="fa fa-minus-circle" data-id="" data-name=""></i></a>'

			  
			  "render": function (data, type, row, meta) {
				  return '<a href="#" class="add btn btn-xs btn-primary" id="viewbut" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="View Full Record"><i class="fa fa-eye"></i></a>&nbsp;<a href="#" class="add btn btn-xs btn-info" id="editbut" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="Edit Record"><i class="fa fa-pencil-square-o"></i></a>&nbsp;<a href="#" class="remove btn btn-xs btn-danger" id="stddelete" data-id="' + data + '" data-toggle="tooltip" data-placement="bottom" title="Delete Record"><i class="fa fa-minus-circle" data-id="" data-name=""></i></a>'
				  orderable: false
					
                },
                "targets": 8 // column index 
             },
			 
			 { "width": "12%", "targets": 2 },
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
<script type="text/javascript">
$(document).ready(function(e) {
	$("#image1']").click(function() {
    $("input[id='file']").click();
	});
	
});
</script>
  </body>
</html>
