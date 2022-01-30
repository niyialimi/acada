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
    <title>My Students</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugin/iCheck/all.css">

   
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
            
            <li>
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
                  <h4 class="box-title">My Class Students</h4>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="script/attendancesheet.php" name="att" class="stdatted" id="stdattendform"  enctype="multipart/form-data" method="post" role="form">
                <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <select class="form-control" name="stdclass" id="stdclass" required>
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
                   </div>
                   <div class="col-md-4"><input type="text" class="form-control" id="myInput1" name="myInput1" onkeyup="myFunction1()" placeholder="Search Student By Number"></div>
                   <div class="col-md-2"></div>
                  </div>
                  
                  </form><p>&nbsp;</p>
                  <div class="table-responsive">
                  <table id="stdtable1" class="table table-bordered table-striped" style="width:100%;">
                 
              		</table>
              </div>
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
    <script src="staffapp.js"></script>
    
<script>
 $(document).ready(function(e){
	$("#stdclass").change(function(){	
			var stdclass=$(this).val();
			//alert(atclass+' '+atarm);
		$.ajax({
	  	type: 'POST',
		url: 'script/stdviewscript.php',
		data: {stdclass:stdclass},		
		dataType:'html',
		  success: function(returndata){
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
});
 </script>
<script>
function myFunction1() {
  // Declare variables  
  
  var input1, filter, table, tr, td, i;
  input1 = document.getElementById("myInput1");
  filter = input1.value.toUpperCase();
  table = document.getElementById("stdtable1");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
		  
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}


</script>
  </body>
</html>
