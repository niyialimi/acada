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
    <title>::Add Employee</title>
    
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <!-- Sidebar user panel -->
          <!--div class="user-panel">
            <div class="pull-left image">
              <img src="../dist/img/avatar5.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>User Name</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div-->
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
            <li><a href="#"><i class="fa fa-users"></i> Manage Staff</a></li>
            <li class="active">Enrol New Staff</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box-body">
           
             <div class="register-box-body">
        <p class="login-box-msg">Add New Staff</p>
        <form action="" class="addnewform" id="empform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        <input type="hidden" name="clientappid" id="clientappis" value="<?php echo $_SESSION['clientappid']; ?>">
        <div style="background:#036; color:#FFF" align="center">Staff Information</div><br>
        
        <div class="row has-feedback">
                 <div class="form-group col-xs-12 col-md-6 col-lg-6">
                 	<label>Staff Number</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-list"></i>
                    </div>
                <input type="text" name="stafnum" id="stafnum" class="form-control" placeholder="Staff Emplyment Number if available" readonly>
              	</div>
                <div class="help-block with-errors"></div>
               </div><!-- /.col-lg-6 -->
                    <div class=" form-group col-xs-12 col-md-6 col-lg-6">
                            <label>Title</label>
                           <select name="staftitle" id="staftitle" class="form-control">
                           <option value="Dr.">Dr</option>
                           <option value="Eng.">Eng</option>
                           <option value="Mr.">Mr</option>
                           <option value="Mrs.">Mrs</option>
                           <option value="Miss.">Miss</option>
                           <option value="Prof.">Prof</option>
                           <option value="Rev.">Rev</option>
                           </select>
                           <div class="help-block with-errors"></div>
                    <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
                  
      		  <div class="row has-feedback">
           		 <div class="form-group col-xs-12 col-md-6 col-lg-6">
            	
                      <select name="staftype" id="staftype" class="form-control" required>  
                          <option value="">Select Staff Type</option>                     
                          <option value="Teaching Staff">Teaching Staff</option>
                          <option value="Non-Teaching Staff">Non-Teaching Staff</option>                          
                      </select>                      
                    		
            		</div>
        
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
            <input type="text" name="staflname" id="staflname" class="form-control" placeholder="Staff Lastname or Surname" data-error="Surname cannot be empty" required>
            </div>
            <div class="help-block with-errors"></div>
            </div>
            
         </div>
         
          
         <div class="row has-feedback">
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
				<div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
            <input type="text" name="staffname" id="staffname" class="form-control" placeholder="Staff Firstname" data-error="Firstname cannot be empty" required>
            </div>
            <div class="help-block with-errors"></div>
          	</div>
         
          <div class="form-group col-xs-12 col-md-6 col-lg-6">
          <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-user"></i>
                    </div>
            <input type="text" name="stafoname" id="stafoname" class="form-control" placeholder="Staff Othername or Middle Name" data-error="Field cannot be empty" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
         </div>
          
           <div class="row has-feedback">
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-envelope"></i>
                    </div>
            <input type="email" class="form-control" name="stafemail" id="stafemail" placeholder="Staff Email" data-error="Enter a correct email Address" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
          
          <div class="form-group col-xs-12 col-md-6 col-lg-6">
          <div class="input-group">
                    <div class="input-group-addon">
                       <i class="fa fa-mobile"></i>
                    </div>
            <input type="text" class="form-control" name="stafmobile" id="stafmobile" placeholder="Staff Mobile Number" data-error="Mobile Number Missing" required>
            </div>
            <div class="help-block with-errors"></div>
          </div>
         </div>
          
         
          <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                
                    <label>Gender</label><br>                   
                      <input type="radio" name="stafgender" id="stafgender" class="minimal form-control" value="Male" checked>                      
                     	Male                    
                    &nbsp;&nbsp;                    
                      <input type="radio" name="stafgender" id="stafgender" class="minimal form-control" value="Female">
                      Female
                   
                    
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xs-12 col-md-6 col-lg-6 form-group">
                       
                        <label for="exampleInputFile">Staff Profile Image</label>
                        <div id="image_preview"><img id="previewing" style="width:100px; height:100px; cursor:pointer;" src="" width="100px" height="100px" class="img-thumbnail"/></div><br>
                       <input type="file" name="profileImg" id="file" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration" required>
                      <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row --> 
                  
                  <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Date of Birth</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="stafdob" id="stafdob" class="form-control datepick" placeholder="Birth Day in format 10/10/2010" data-error="Birthday Field cannot be empty" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>                      
                    </div><!-- /.col-lg-6 -->
                    <div class="help-block with-errors"></div>
                        
                    </div><!-- /.col-lg-6 -->
                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6"> 
                    <label>Employment Year</label> 
                    <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" name="stafyear" id="stafyear" class="form-control yearselect" placeholder="Year of Admission to school" data-error="Field cannot be empty" data-mask required>                           
                    </div> 
                       <div class="help-block with-errors"></div>
                    </div>                                        
                  </div><!-- /.row -->  
                  
                  <div class="row form-group has-feedback">
                    <div class="col-xs-12 col-md-6 col-lg-6"> 
                
                    <label>Marital Status</label><br>                   
                      <input type="radio" name="staffmstatus" id="staffmstatus" class="minimal form-control" value="Single" checked>                      
                     	Single                    
                    &nbsp;&nbsp;                    
                      <input type="radio" name="staffmstatus" id="staffmstatus" class="minimal form-control" value="Married">
                      Married
                   &nbsp;&nbsp;                    
                      <input type="radio" name="staffmstatus" id="staffmstatus" class="minimal form-control" value="Divorced">
                      Divorced
                    
                    </div><!-- /.col-lg-6 -->
                    <div class="col-xs-12 col-md-6 col-lg-6 form-group">
                       <select class="form-control" name="staffreligion" id="staffreligion" required>
                          <option>Select Religion</option>
                          	<option value="Christianity">Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Others">Others</option>
                          </select>
                      <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row --> 
                  
                   <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                     <label>Qualification</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-book"></i>
                          </div>
                            <select class="form-control" name="staffqualify" id="staffqualify" required>
                          <option>Select Staff Qualification</option>
                          	<option value="Bachelors Degree">Bachelors Degree</option>
                            <option value="Masters Degree">Masters Degree</option>
                            <option value="HND">HND</option>
                            <option value="OND">OND</option>
                            <option value="NCE">NCE</option>
                            <option value="SSCE">SSCE</option>
                            <option value="Others">Others</option>
                          </select>                      
                      </div>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Physical Disability</label><br>                   
                      <input type="radio" name="spdisable" id="spdisable" class="minimal form-control" value="Yes" >                      
                     	Yes                  
                    &nbsp;&nbsp;                    
                      <input type="radio" name="spdisable" id="spdisable" class="minimal form-control" value="No" checked>
                      No                                                       
             		</div>
                </div>
                   
   	<div style="background:#036; color:#FFF" align="center">Contact Information</div><br>
            <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                                             
                      <label>Nationality</label>
                          <select name="nation" id="nation" class="form-control" style="width: 100%;">
                                                   
                          </select> 
                     
                    </div><!-- /.col-lg-6 -->
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                       
                        <label>State of Origin</label>
                          <select name="state" id="state" class="form-control">                                              
                          </select>
                    <div class="help-block with-errors"></div>
                    </div><!--col-->                    
                  </div><!-- /.row -->                
                  
                   
			
            <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       
                        <textarea class="form-control" rows="3" name="stafaddress" id="stafaddress" placeholder="Enter Residential Address ..." data-error="Staff Address is empty" required></textarea>
                    <div class="help-block with-errors"></div>
                    </div>
                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                        
                         <textarea class="form-control" rows="3" name="spostaddress" id="spostaddress" placeholder="Enter Poster Address Optional..." data-error="Staff Address is empty"></textarea>                     
                           </div>    
                           <div class="help-block with-errors"></div>  
                  </div><!-- /.row -->
                  
          <div style="background:#036; color:#FFF" align="center">Guarantor Information</div><br>
           <div class="form-group has-feedback">
            	<input type="text" class="form-control" name="gname" id="gname" placeholder="Guarantor Fullname" data-error="Guarantor Name cannot be empty" required>
				 <span class="glyphicon glyphicon-user form-control-feedback"></span>
                 <div class="help-block with-errors"></div>
          </div>
          
          <div class="row form-group">
                    <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">
                    <label>Other Names</label>
                       <input type="text" class="form-control" name="goname" id="goname" placeholder="Guarantor Other Names" data-error="Field is empty">
                      </div>
                  
          	      <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">
                	 <label>Title</label>
                       <select name="gtitle" id="gtitle" class="form-control">
                       <option value="Dr.">Dr</option>
                       <option value="Eng.">Eng</option>
                       <option value="Mr.">Mr</option>
                       <option value="Mrs.">Mrs</option>
                       <option value="Miss.">Miss</option>
                       <option value="Prof.">Prof</option>
                       <option value="Rev.">Rev</option>
                       </select>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
          
          <div class="form-group has-feedback">
            	<input type="email" class="form-control" name="gemail" id="gemail" placeholder="Guarantor Email Address" >
				 <span class="glyphicon glyphicon-user form-control-feedback"></span>
                 <div class="help-block with-errors"></div>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="gmobile" id="gmobile" placeholder="Guarantor Mobile Number" required data-error="Phone Number cannot be empty">
            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            <div class="help-block with-errors"></div>
          </div>
          
           <div class="row form-group">
                    <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">
                      <textarea class="form-control" rows="3" name="gaddress" id="gaddress" placeholder="Guarantor Address ..." data-error="" required></textarea>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">                	 
                       <input type="text" class="form-control" name="gcity" id="gcity" placeholder="Guarantor Current City" data-error="" required>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
                
                 <div class="row form-group">
                    <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">
                    <label>Occupation</label>
                       <input type="text" class="form-control" name="goccup" id="goccup" placeholder="Guarantor Occupation" data-error="One of the Field is empty" required>
                      </div>
                  
          	      <div class="col-xs-12 col-md-6 col-lg-6 has-feedback">
                	 <label>Relationship with Employee</label>
                       <select name="grel" id="grel" class="form-control">
                       <option value="Father">Father</option>
                       <option value="Mother">Mother</option>
                       <option value="Uncle">Uncle</option>
                       <option value="Aunty">Aunty</option>
                       </select>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
         	
            
            
          <div class="row">            
            <div class="col-xs-12 col-md-5 col-lg-5"><div id="message" align="center"></div></div>
            <div class="col-xs-12 col-md-4 col-lg-4">            
              <button type="submit" id="empregbut" name="empregbut" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Adding New Record">Add Employee&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
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
<script type="text/javascript">
 $(document).ready(function () {
        $(".datepick").datepicker({ 
		format: 'yyyy-mm-dd', 
		autoclose: true, 
		todayBtn: 'linked',
		 weekStart: 1,
		 todayHighlight: 1
		});
		
		$('.yearselect').yearselect();
		$('.yearselect').yearselect({
		start: 1990,
		end: 2025
});

		
		 $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
		populateCountries("nation", "state");//auto fill all country
		$(".select").select2();//auto type country
    });
	
	$(document).ready(function(e){
	 		
		$.ajax({
		url: 'script/generatestaffno.php',
		data: '',		
		dataType:'json',
		  success: function(returndata)
		  {
			  var staffno=parseInt(returndata[0]);
			  staffno=staffno + 1;
			  if(staffno==0){ staffno='000'+staffno;}
			  else if(staffno>=10){staffno='00'+staffno;}
			  else if(staffno>=100){staffno='0'+staffno;}
			  else if(staffno>=1000){staffno=staffno;}
			  //alert(staffno);
			  $('#stafnum').val(staffno);
			  },
		  error: function(returndata)
		  {
			 alert('error'); //$('#parent').val(returndata);
		  }
		  
		}); return false;
	 });	
</script>
  <script>
$(document).ready(function (e) {
// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
});

 $("#previewing").click(function() {
			$("input[id='file']").click();
		});
</script>
  </body>
</html>
