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
    <title>::Edit Student Details</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugin/datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugin/iCheck/all.css">
    <link rel="stylesheet" href="../plugin/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../plugin/autocomplete/tagmanager.min.css">

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
                <li><a href="viewsubjects.php"><i class="fa fa-circle-o"></i> View Assigned Parent</a></li>                             
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
            <i class="fa fa-edit"></i> Manage Student Record
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Manage Student</a></li>
            <li class="active">Edit Student Record</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box-body">
           
             <div class="register-box-body">
             <!--a href="#" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="Import Student Details"><i class="fa fa-download"></i> </a-->
        <p class="login-box-msg">Edit Student Details</p>
        <?php 
				$id=$_GET['id'];
				$viewquery = "select * from student_tab where student_id='$id' and clientapp_id='".$_SESSION['clientappid']."'";
				$result=mysqli_query($con,$viewquery);
				if(mysqli_num_rows($result))
					{
						while ($rows = mysqli_fetch_array($result))
						{
						 $_SESSION['lname']=$rows['lname'];
						 $_SESSION['fname']=$rows['fname'];
						 $pics=$rows['pics'];if($pics==''){$pics='../dist/img/avatar5.png';}else{$pics=$pics;}
						 $gender=$rows['gender'];
						 $disability=$rows['disability'];
			 ?>
        <form action="" class="editform" id="stdeditform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        <input type="hidden" name="studentid" id="studentid" value="<?php echo $rows['student_id']; ?>">
        <div style="background:#036; color:#FFF" align="center">Student Information</div><br>
        
        <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Student Number</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-user"></i>
                          </div>
                      <input type="text" name="rollnum" id="rollnum" class="form-control" placeholder="Student Number" value="<?php echo $rows['rollnum']; ?>" readonly required>
                     </div>
                     <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>Gender</label><br>   
                       <?php if($gender=='Male')
                       { echo'                   
                      <input type="radio" name="gender" id="gender" class="minimal form-control" value="Male" checked>                      
                     	Male                    
                    &nbsp;&nbsp;                    
                      <input type="radio" name="gender" id="gender" class="minimal form-control" value="Female">
                      Female';
					   }else
					   {echo'<input type="radio" name="gender" id="gender" class="minimal form-control" value="Male">                      
                     	Male                    
                    &nbsp;&nbsp;                    
                      <input type="radio" name="gender" id="gender" class="minimal form-control" value="Female" checked>
                      Female';
					   }
					   ?>
                        
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
        
        <div class="row has-feedback">
        	<div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
            <input type="text" name="lname" id="lname" class="form-control" value="<?php echo $rows['lname']; ?>" placeholder="Lastname or Surname"  data-error="Surname cannot be empty" required>
            </div>
            <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
            <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $rows['fname']; ?>" placeholder="Firstname" data-error="Firstname cannot be empty" required>
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
            <input type="text" name="oname" id="oname" class="form-control" value="<?php echo $rows['oname']; ?>" placeholder="Othername" data-error="Field cannot be empty">
            
            <div class="help-block with-errors"></div>
            </div>
            </div>
            
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $rows['semail']; ?>" placeholder="Student Email" data-error="Enter a correct email Address">
            <div class="help-block with-errors"></div>
          	</div>
            </div>
            
          </div>
          
          
           
         
          <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                                            
                       
                		<label>Religion</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-bank"></i>
                          </div>
                         
                          <select class="form-control" name="stdreligion" id="stdreligion" required>
                          <option value="<?php echo $rows['religion']; ?>"><?php echo $rows['religion']; ?></option>
                          	<option value="Christianity">Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Others">Others</option>
                          </select>  
                           </div>    
                           <div class="help-block with-errors"></div>
                    
                    </div><!-- /.col-lg-6 -->
                      <div class="form-group col-xs-12 col-md-6 col-lg-6">                       
                      
                       <label for="InputFile">Student Profile Picture</label>                       
                       <div id="image_preview"><img id="previewing" style="width:100px; height:100px; cursor:pointer;" src="<?php echo '../'.$pics; ?>" width="100px" height="100px" class="img-thumbnail"/></div><br>
                       <input type="file" name="profileImg" id="profileImg" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration">
                       <div class="help-block with-errors"></div> 
                        
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->    
                  
                  
                  <div class="row has-feedback">
                                        
                   
                  </div><!-- /.row -->
                  
       <div style="background:#036; color:#FFF" align="center">Contact Information</div><br> 
            <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                                             
                       <label>Nationality</label>                          
                          <input type="text" name="nation" id="nation" class="form-control" value="<?php echo $rows['nationality']; ?>" placeholder="Nationality Field Cannot Be Empty" required>
                          <div class="help-block with-errors"></div>                     
                    </div><!-- /.col-lg-6 -->
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>State of Origin</label>                                             
                        <input type="text" name="state" id="state"  class="form-control" value="<?php echo $rows['state_origin']; ?>" placeholder="Nationality Field Cannot Be Empty" required>
                       <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->   
                                     
                  </div><!-- /.row -->    
                  
                   <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <textarea class="form-control" rows="3" name="stdaddress" id="stdaddress" value="" placeholder="Enter Student Residential Address ..." data-error="Student Address Cannot Be Empty" required><?php echo $rows['student_address']; ?></textarea>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">                	 
                      <label>Student City Of Residence</label>                                             
                        <input type="text" name="stdcity" id="stdcity"  class="form-control" value="<?php echo $rows['city']; ?>" placeholder="City Field Cannot Be Empty" required>                       
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
                            
                  
      <div style="background:#036; color:#FFF" align="center">Other Information</div><br>
                  
                   <div class="row has-feedback">
                   <div class="form-group col-xs-12 col-md-6 col-lg-6">
                   <?php echo $disability; ?> 
                   <?php if($disability=='No'){
                	echo '<label>Physical Disability</label><br>                   
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="Yes" >                      
                     	Yes                  
                    &nbsp;&nbsp;                    
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="No" checked>
                      No  ';              
				   }else if($disability=='Yes')
				   {
					  echo '<label>Physical Disability</label><br>                   
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="Yes" checked>                      
                     	Yes                  
                    &nbsp;&nbsp;                    
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="No">
                      No  '; 
				   }else if($disability=='')
				   {
					   echo '<label>Physical Disability</label><br>                   
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="Yes">                      
                     	Yes                  
                    &nbsp;&nbsp;                    
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="No" checked>
                      No  '; 
				   }
                   ?>                    
             	</div>                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       
                        <label>Student Hobbies</label>
                      
                           <input type="text" name="stdhobby" id="stdhobby" class="form-control" value="<?php echo $rows['std_hobby']; ?>" placeholder="Student Hobbies, Not more than 100 characters; Optional">
                    
                    <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->                
                  
                  <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Student Class</label>
                        
                      <input type="text" name="stdclass" id="stdclass" class="form-control" value="<?php echo $rows['current_class']; ?>" placeholder="CLass Arm can be A-Z or type None" required>
                   
                    </div><!-- /.col-lg-6 -->
                    
                     <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Class Section/Arm</label>
                        
                     
                      <input type="text" name="stdarm" id="stdarm" class="form-control" value="<?php echo $rows['current_arm']; ?>" placeholder="" required>
                    </div><!-- /.col-lg-6 -->
                    </div>
                   
			
            
          <div style="background:#036; color:#FFF" align="center">Parent or Guardian Information</div><br>
          
           <div class="row has-feedback">
                    
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Title</label>
                     <input type="text" name="ptitle" id="ptitle" class="form-control" value="<?php echo $rows['parent_title']; ?>" placeholder="Student Hobbies, Not more than 100 characters; Optional" required>
                      
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
          
           <div class="row has-feedback">
               <div class="form-group col-xs-12 col-md-6 col-lg-6">
               <label>Parent Fullname</label>
               		
                    <input type="text" class="form-control typeahead tm-input" value="<?php echo $rows['parent_name']; ?>" name="pname" id="pname" placeholder="Parent/Guardian Fullname" data-error="Parent Name cannot be empty" required>
                  
                    <div id="countryList"></div>
                     <div class="help-block with-errors"></div>
               </div>
              <div class="form-group col-xs-12 col-md-6 col-lg-6 has-feedback">
                    <label>Other Names</label> 
                       <input type="text" class="form-control" value="<?php echo $rows['parent_oname']; ?>" name="poname" id="poname" placeholder="Parent's/Guardian's Other Names">
              </div>
              <div class="help-block with-errors"></div>
          </div>
          <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>E-mail</label>
                    
                  <input type="email" class="form-control" value="<?php echo $rows['pemail']; ?>" name="pemail" id="pemail" placeholder="Parent/Guardian Email Address" >
                 <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Mobile Number</label>
                     
                       <input type="text" class="form-control" value="<?php echo $rows['parent_phone']; ?>" name="pmobile" id="pmobile" placeholder="Parent/Guardian Mobile Number" required data-error="Phone Number cannot be empty">
            		
            <div class="help-block with-errors"></div>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
          
          
          
           <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <textarea class="form-control" rows="3" name="paddress" id="paddress" placeholder="Enter Residential Address ..." data-error="" required><?php echo $rows['address']; ?></textarea>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">                	 
                       <input type="text" class="form-control" value="<?php echo $rows['current_city']; ?>" name="pcity" id="pcity" placeholder="Parent's/Guardian's Current City" data-error="" required>
                       
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
                
                 <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>Occupation</label>
                       <input type="text" class="form-control" value="<?php echo $rows['occupation']; ?>" name="occup" id="occup" placeholder="Parent's/Guardian's Occupation" data-error="One of the Field is empty" required>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Relationship with Student</label>
                     <input type="text" class="form-control" value="<?php echo $rows['relationship']; ?>" name="rel" id="rel" placeholder="Parent's/Guardian's Occupation" data-error="One of the Field is empty" required>                       
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
         	
            
            
          <div class="row">            
            <div class="col-xs-12 col-md-5 col-lg-5"><div id="message" align="center"></div></div>
            <div class="col-xs-12 col-md-4 col-lg-4">            
              <button type="submit" id="studentedit" name="studentedit" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Editing Student Record">Edit Student Detail&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></button>
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
    <script type="text/javascript" src="../plugin/autocomplete/tagmanager.min.js"></script>
    <script src="../plugin/autocomplete/bootstrap3-typeahead.min.js"></script>
    <script src="schapp.js"></script>
<script type="text/javascript">
 $(document).ready(function () {
        $(".datepick").datepicker({ 
		format: 'yyyy-mm-dd', 
		autoclose: true, 
		todayBtn: 'linked',
		 weekStart: 1,
		 todayHighlight: 1,
		 	 
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
		url: 'script/generatestdno.php',
		data: '',		
		dataType:'json',
		  success: function(returndata)
		  {
			  var stdno=parseInt(returndata[0]);
			  stdno=stdno + 1;
			  if(stdno==0){ stdno='000'+stdno;}
			  else if(stdno>=10){stdno='00'+stdno;}
			  else if(stdno>=100){stdno='0'+stdno;}
			  else if(stdno>=1000){stdno=stdno;}
			  $('#rollnum').val(stdno);
			  },
		  error: function(returndata)
		  {
			 alert('error'); //$('#parent').val(returndata);
		  }
		  
		}); return false;
	 });	
</script>
<script>
$(document).ready(function() {

    $('#dob').change(function() {
		//var date=$('#dob').val();
		var dob = $('#dob').val();
if(dob != ''){
    var str=dob.split('-');    
    var firstdate=new Date(str[0],str[1],str[2]);
    var today = new Date();        
    var dayDiff = Math.ceil(today.getTime() - firstdate.getTime()) / (1000 * 60 * 60 * 24 * 365);
    var age = parseInt(dayDiff);
	$('#age').val(age);
    //$('#age').html(age+' years old');
}$('#age').val(age);
		
	});
});

</script>
 <?php
		}
	}
 ?>
 <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#previewing').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profileImg").change(function(){
        readURL(this);
    });
	$("#previewing").click(function() {
			$("input[id='profileImg']").click();
		});
</script>

  </body>
</html>
