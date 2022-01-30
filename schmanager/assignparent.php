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
    <title>::Assign Login</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugin/datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugin/iCheck/all.css">
    <link rel="stylesheet" href="../plugin/select2/select2.min.css">

   
  </head>
  <body class="hold-transition skin-blue fixed sidebar-mini">
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
                <li><a href="staffattendance.php"><i class="fa fa-circle-o"></i> Employee Attendance</a></li>               
              </ul>
            </li>
            
            <li>
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
            
            <li class="active treeview">
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
            <i class="fa fa-key"></i> Manage Login
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-key"></i> Manage Login</a></li>
            <li class="active">Assign Login</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box-body">
           
             <div class="register-box-body">
        <p class="login-box-msg">Assign Login</p>
        
        <form action="script/assignparentscript.php" class="parentform" id="assignparentform" name="assignloginform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        <input type="hidden" name="clientappid" id="clientappis" value="<?php echo $_SESSION['clientappid']; ?>"> 
        
        <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                      
                       <label>Student Name</label>                       
           			 <select class="form-control" name="attclass" id="attclass" required>
                  		  <option value="">Pick A Class</option>
                  	 	  <option value="KG">KG</option>
                          <option value="Nursery 1">Nursery 1</option>
                          <option value="Nursery 2">Nursery 2</option>
                          <option value="Nursery 3">Nursery 3</option>
                          <option value="Primary 1">Primary 1</option>
                          <option value="Primary 2">Primary 2</option>
                          <option value="Primary 3">Primary 3</option>
                          <option value="Primary 4">Primary 4</option>
                          <option value="Primary 5">Primary 5</option>
                          <option value="Primary 6">Primary 6</option>
                          <option value="Junior Secondary School 1">Junior Secondary School 1</option>
                          <option value="Junior Secondary School 2">Junior Secondary School 2</option>
                          <option value="Junior Secondary School 3">Junior Secondary School 3</option>
                          <option value="Senior Secondary School 1">Senior Secondary School 1</option>
                          <option value="Senior Secondary School 2">Senior Secondary School 2</option>
                          <option value="Senior Secondary School 3">Senior Secondary School 3</option>
                  </select>
            		<div class="help-block with-errors"></div>
         		 </div>                   
                 
                   <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label>Class Section/Arm</label>
                     <select class="form-control" name="attarm" id="attarm" required>
                        <option value="">Pick Section</option>
                        <option value="None">None</option> 
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        
                        </select>
                  </div>
                  
                 </div> <!-- /.row -->       
           
         <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                      
                       <label>Student Name</label>                       
           			 <select class="form-control" name="stdname" id="stdname"  required>  
                     
                  </select>
            <input type="hidden" name="stdid" id="stdid" value="">
            		<div class="help-block with-errors"></div>
         		 </div>                   
                 
                   <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label>Parent Mobile Number</label>
                  <div class="form-group has-feedback">
                    <input type="text" name="parentphone" id="parentphone" class="form-control" value="" placeholder="" readonly required>
                    <span class="fa fa-mobile form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  
                 </div> <!-- /.row -->              
                 <div style="background:#036; color:#FFF" align="center">Student Login</div><br>
                 
                 <div class="row has-feedback">
                  <div class="form-group col-xs-12 col-md-6 col-lg-6"> 
                        <label>Student Username</label>                      
             		<div class="form-group has-feedback">
                    <input type="text" name="stduname" id="stduname" class="form-control" placeholder="Login Username for Student" data-error="Field is Empty" readonly>
                    <span class="fa fa-user form-control-feedback"></span>
            
                        <div class="help-block with-errors"></div>
                      </div>    
                  </div>               
                            
                  <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>Student Login Password</label>                   
                   <div class="form-group has-feedback">
                    <input type="password" name="stdlogpassword" id="stdlogpassword" class="form-control" placeholder="Parent Login Id" data-error="Username is Important" readonly>
                    <span class="fa fa-lock form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                  </div>
          	 </div>
          </div><!-- /.row -->
                 
                 <div style="background:#036; color:#FFF" align="center">Parent Login</div><br>
          
          <div class="row has-feedback">
                  <div class="form-group col-xs-12 col-md-6 col-lg-6"> 
                        <label>Parent Name</label>                      
             		<div class="form-group has-feedback">
                    <input type="text" name="pname" id="pname" class="form-control" placeholder="Login Username for parents" data-error="Field is Empty" readonly>
                    <span class="fa fa-user form-control-feedback"></span>
            
                        <div class="help-block with-errors"></div>
                      </div>    
                  </div>               
                            
                  <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>Parent Login Username</label>                   
                   <div class="form-group has-feedback">
                    <input type="text" name="parentuname" id="parentuname" class="form-control" placeholder="Parent Login Id" data-error="Username is Important" readonly>
                    <span class="fa fa-lock form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                  </div>
          	 </div>
          </div><!-- /.row -->
          
          
          <div class="row has-feedback">
                  <div class="form-group col-xs-12 col-md-6 col-lg-6"> 
                        <label>Password</label>                      
             		<div class="form-group has-feedback">
                    <input type="password" name="parentpass" id="parentpass" class="form-control" placeholder="Login Password" min-lenght="8" data-error="Password Can't be Empty" readonly>
                    <span class="fa fa-user form-control-feedback"></span>
            
                        <div class="help-block with-errors"></div>
                      </div>    
                  </div>               
                  
          </div><!-- /.row -->
     
                   
            
        <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-md-12 col-lg-12"> 
                        <div id="display"></div>
                      </div>        
           </div><!-- /.row -->
           
           
          <div class="row">            
            <div class="col-xs-12 col-md-5 col-lg-5"><div id="message" align="center"></div></div>
            <div class="col-xs-12 col-md-4 col-lg-4">            
              <button type="submit" id="addprtbut" name="addprtbut" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i>Assigning Login">Assign Login&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
</button>
            </div><!-- /.col -->
            <div class="col-xs-12 col-md-3 col-lg-3"></div>
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
    <script src="../plugin/iCheck/icheck.min.js"></script>
    <script src="../plugin/countries.js"></script>
    <script src="../plugin/select2/select2.full.min.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="../plugin/year-select.js"></script>
    <script src="schapp.js"></script>
    <script>
 $(document).ready(function(e){
	$("#attarm").change(function(){
		var formElements = document.getElementById("assignparentform");
		var atclass=formElements.attclass.value;
			var atarm=$(this).val();
			
			if(atclass!='' && atarm!='')
			{
		$.ajax({
	  	type: 'POST',
		url: 'script/parentselectscript.php',
		data: {atclass:atclass,atarm:atarm},		
		dataType:'html',
		  success: function(returndata){
			  //alert(atclass+'arm '+atarm);
			 $('#stdname').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdname').html(returndata);
		  }
		  
		}); return false;
			}else
			{
				$('#stdname').html('<option value="">Select</option>');
			}
			
		});
	
});
 </script>

	
  </body>
</html>
