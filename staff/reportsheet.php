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
    <title>::Exam Score Sheet</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugin/iCheck/all.css">

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
          
         
          <ul class="sidebar-menu">
            
            <li class="treeview">
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
           
          
            <li class="active treeview">
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
            <i class="fa fa-list"></i> Reports
          </h1>
          <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-newspaper"></i> Report</a></li>
            <li class="active">Student Report Card</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
                
		<div class="box" id="regbox">
            <div class="box">
                <div class="box-header">
                  <h4 class="box-title well-lg">Student Wise Exam Report: &nbsp;&nbsp;<strong><?php echo date('l')." ".date('Y-m-d'); ?></strong></h4>
                  <div class="row">
                  <form id="thisform" name="thisform" method="post" role="form" data-toggle="validator">
                  <div class="col-md-2">
                  	<select class="form-control" name="stdsession" id="stdsession" required>
                  		  <option value="">Select Session</option>
                          	<option value="2017/2018">2017/2018</option>
                          	<option value="2018/2019">2018/2019</option>
                          	<option value="2019/2020">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                    </select>
                  </div>
                  <div class="col-md-2">
                  <select class="form-control" name="stdterm" id="stdterm" required>
                  		  <option value="">Select Exam</option>
                          <option value="First">First Term</option>
                          <option value="Second">Second Term</option>                      
                          <option value="Third">Third Term</option>
                  	 	 
                  </select>
                  </div>
                  <div class="col-md-4">
               	<select class="form-control" name="stdselectclass" id="stdselectclass" required>
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
                  
                 <div class="col-md-4">                    
           			 <select class="form-control" name="studentname" id="studentname"  required>  
                     
                  </select>
                  </div>
                   
                  
                  </form>
                  </div>
                 
                    </div><!-- /.box-header -->
                <div class="box-body">
                <p></p>
               <?php  
			   	$selectquery = "select * from setting_tab where clientapp_id='".$_SESSION['clientappid']."'";
					$selectData=mysqli_query($con,$selectquery) or die("database error:". mysqli_error($con));
					
					if(mysqli_num_rows($selectData))
					   {
						   while($rows=mysqli_fetch_assoc($selectData))
							   {	
							   		$_SESSION['clientaddress']=$rows['clientapp_address'];
									$_SESSION['clientname']=$rows['clientapp_name'];
									$_SESSION['clientemail']=$rows['clientapp_email'];
									$_SESSION['clientmobile']=$rows['clientapp_mobile'];
									$_SESSION['clientlogo']=$rows['clientapp_logo'];
									$_SESSION['clientsign']=$rows['clientapp_sign'];
									$_SESSION['clienttend']=$rows['clientapp_tend'];
							   }
				 	  }
			   ?>
              	  <div class="table-responsive">
                  <a href="#" id="printme" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</a>
                <form action="" class="atform" id="stdattform"  enctype="multipart/form-data" method="post" role="form">                
                	<div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Student Report Sheet</h3>
                      </div>                      
                      <div class="panel-body" id="printarea">
                      <div align="center"><img src="<?php echo '../'.$_SESSION['clientlogo']?>" width="100px" height="100px"><br><?php echo '<strong>'.$_SESSION['clientname'].'</strong><br>'.'<strong>'.$_SESSION['clientaddress'].'</strong><br>'.'Email: '.$_SESSION['clientemail'].' Tel '.$_SESSION['clientmobile'];?></div><hr>
                         <!--table id="stdtable1" border="2" class="table table-bordered" style="width:70%; margin-left:10%;">
                    		
              			</table--><!--?php echo $_SESSION['clientsign']?-->
                        <div align="center" id="stdtable1"></div>
                      </div>
                    </div>
                 
             
              </form>
             	 </div>
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
    <script src="../plugin/iCheck/icheck.min.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="../plugin/year-select.js"></script>
    <script src="../plugin/jquery-printme.js"></script>
    <script src="staffapp.js"></script>
    <script>		
    	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
 </script>
  <script>
 $(document).ready(function(e){
	$("#stdselectclass").change(function(){
			var stdselectclass=$(this).val();
			if(stdselectclass!='')
			{
		$.ajax({
	  	type: 'POST',
		url: 'script/populatestudent.php',
		data: {stdselectclass:stdselectclass},		
		dataType:'html',
		  success: function(returndata){
			 $('#studentname').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#sttudentname').html(returndata);
		  }
		  
		}); return false;
			}else
			{
				$('#stdname').html('<option value="">Select</option>');
			}
			
		});
	
});
$(document).ready(function () {

		$("#printme").click(function(){
			$("#printarea").printMe({
				"path" : ["../bootstrap/css/bootstrap.min.css","../dist/css/schapp.min.css"]
				//"title" : "Student Report Sheet"
				});
		});
});
 </script>
  
  </body>
</html>
