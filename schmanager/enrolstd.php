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
    <title>::Enroll Student</title>
    
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
            <i class="fa fa-graduation-cap"></i> Manage Student
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-graduation-cap"></i> Manage Student</a></li>
            <li class="active">Enrol New Student</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box-body">
           
             <div class="register-box-body">
             <!--a href="#" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="Import Student Details"><i class="fa fa-download"></i> </a-->
        <p class="login-box-msg">Add New Student</p>
        <form action="" class="addform" id="stdform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        <input type="hidden" name="clientappid" id="clientappis" value="<?php echo $_SESSION['clientappid']; ?>">
        <div style="background:#036; color:#FFF" align="center">Student Information</div><br>
        
        <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Student Number</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-list"></i>
                          </div>
                      <input type="text" name="rollnum" id="rollnum" class="form-control" placeholder="Student Number" value="" readonly required>
                     </div>
                     <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       
                       <label>Gender</label><br>                   
                      <input type="radio" name="gender" class="minimal form-control" value="Male" checked>                      
                     	Male                    
                    &nbsp;&nbsp;                    
                      <input type="radio" name="gender" class="minimal form-control" value="Female">
                      Female
                        
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
        
        <div class="row has-feedback">
        	<div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Lastname or Surname" data-error="Surname cannot be empty" required>
            </div>
            <div class="help-block with-errors"></div>
            </div>
            
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Firstname" data-error="Firstname cannot be empty" required>
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
            <input type="text" name="oname" id="oname" class="form-control" placeholder="Othername" data-error="Field cannot be empty">
            
            <div class="help-block with-errors"></div>
            </div>
            </div>
            
            <div class="form-group col-xs-12 col-md-6 col-lg-6">
            <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
            <input type="email" class="form-control" name="email" id="email" placeholder="Student Email" data-error="Enter a correct email Address">
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
                          <option>Select Religion</option>
                          	<option value="Christianity">Christianity</option>
                            <option value="Islam">Islam</option>
                            <option value="Others">Others</option>
                          </select>  
                           </div>    
                           <div class="help-block with-errors"></div>
                    
                    </div><!-- /.col-lg-6 -->
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label>Date of Birth</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="dob" id="dob" class="form-control datepick" placeholder="Birth Day in format YYYY-MM-DD" data-error="Birthday Field cannot be empty" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>                      
                    </div><!-- /.col-lg-6 -->
                    <div class="help-block with-errors"></div>
                    </div><!--input group-->  
                  </div><!-- /.row -->    
                  
                  
                  <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Student Age</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-university"></i>
                          </div>
                           <input type="text" name="age" id="age" class="form-control" placeholder="Student Age" readonly required>
                    </div>
                    <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       
                       <label for="InputFile">Student Profile Picture</label>                       
                       <div id="image_preview"><img id="previewing" style="width:100px; height:100px; cursor:pointer;" src="" width="100px" height="100px" class="img-thumbnail"/></div><br>
                       <input type="file" name="profileImg" id="file" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration" required>
                                        
                        <div class="help-block with-errors"></div> 
                        
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
                  
       <div style="background:#036; color:#FFF" align="center">Contact Information</div><br> 
            <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                                             
                       <label>Nationality</label>
                          <select name="nation" id="nation" class="form-control" style="width: 100%;">
                                                   
                          </select>
                          
                          <div class="help-block with-errors"></div>                     
                    </div><!-- /.col-lg-6 -->
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>State of Origin</label>
                          <select name="state" id="state" class="form-control">                                              
                          </select>                    
                       
                       <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->   
                                     
                  </div><!-- /.row -->    
                  
                   <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <textarea class="form-control" rows="3" name="stdaddress" id="stdaddress" placeholder="Enter Student Residential Address ..." data-error="" required></textarea>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">                	 
                       <!--input type="text" class="form-control" name="pcity" id="pcity" placeholder="Parent's/Guardian's Current City" data-error="" required-->
                       <select class="form-control" name="stdcity" id="stdcity" required>
                       		<option>Select City</option>
                       		<option value="Aba">Aba</option>
                            <option value="Abakaliki">Abakaliki</option>
                            <option value="Abeokuta">Abeokuta</option>
                            <option value="Abuja">Abuja</option>
                            <option value="Ado Ekiti">Ado Ekiti</option>
                            <option value="Akpawfu">Akpawfu</option>
                            <option value="Akure">Akure</option>
                            <option value="Asaba">Asaba</option>
                            <option value="Awka">Awka</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Benin City">Benin City</option>
                            <option value="Birnin Kebbi">Birnin Kebbi</option>
                            <option value="Buguma">Buguma</option>
                            <option value="Calabar">Calabar</option>
                            <option value="Dutse">Dutse</option>
                            <option value="Efon-Alaaye">Efon-Alaaye</option>
                            <option value="Eket">Eket</option>
                            <option value="Enugu">Enugu</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Gusau">Gusau</option>
                            <option value="Ibadan">Ibadan</option>
                            <option value="Ife">Ife</option>
                            <option value="Ifelodun">Ifelodun</option>
                            <option value="Ikeja">Ikeja</option>
                            <option value="Ikirun">Ikirun</option>
                            <option value="Ikot Ekpene">Ikot Ekpene</option>
                            <option value="Ikot-Abasi">Ikot-Abasi</option>
                            <option value="Ilorin">Ilorin</option>
                            <option value="Iragbiji">Iragbiji</option>
                            <option value="Jalingo">Jalingo</option>
                            <option value="Jimeta">Jimeta</option>
                            <option value="Jos">Jos</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Karu">Karu</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kumariya">Kumariya</option>
                            <option value="Lafia">Lafia</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Lekki">Lekki</option>
                            <option value="Lokoja">Lokoja</option>
                            <option value="Maiduguri">Maiduguri</option>
                            <option value="Makurdi">Makurdi</option>
                            <option value="Minna">Minna</option>
                            <option value="Nnewi">Nnewi</option>
                            <option value="Nsukka">Nsukka</option>
                            <option value="Offa">Offa</option>
                            <option value="Ogaminana">Ogaminana</option>
                            <option value="Ogbomoso">Ogbomoso</option>
                            <option value="Okene">Okene</option>
                            <option value="Omu-Aran">Omu-Aran</option>
                            <option value="Onitsha">Onitsha</option>
                            <option value="Orlu">Orlu</option>
                            <option value="Oron">Oron</option>
                            <option value="Oshogbo">Oshogbo</option>
                            <option value="Owerri">Owerri</option>
                            <option value="Owo">Owo</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Port Harcourt">Port Harcourt</option>
                            <option value="Potiskum">Potiskum</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Suleja">Suleja</option>
                            <option value="Umuahia">Umuahia</option>
                            <option value="Uyo">Uyo</option>
                            <option value="Warri">Warri</option>
                            <option value="Wukari">Wukari</option>
                            <option value="Yenagoa">Yenagoa</option>
                            <option value="Yola">Yola</option>
                            <option value="Zaria">Zaria</option>
                       </select>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
                            
                  
      <div style="background:#036; color:#FFF" align="center">Other Information</div><br> 
       <?php
		   				$selectsql='select * from setting_tab where clientapp_id='.$_SESSION['clientappid'].' ';
							$result=mysqli_query($con,$selectsql);
								if (mysqli_num_rows($result))
								{
									while($rows=mysqli_fetch_assoc($result))
									{
										$_SESSION['cterm']=$rows['current_term'];
										$_SESSION['csession']=$rows['current_session'];
									}
								}
										
				   ?>           
                  <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                                             
                       <label>Current Term</label>
                          <select name="term" id="term" class="form-control">    
                          <option value="<?php echo $_SESSION['cterm']; ?>"><?php echo $_SESSION['cterm']; ?></option>
                          </select>
                     
                    </div><!-- /.col-lg-6 -->
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       
                        <label>Current Class</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-university"></i>
                          </div>
                          <select name="class" id="class" class="form-control" required>
                          <option value="">Select a Class</option>
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
                           <!--?php		
							  $xquery="select class_name,class_alias from class_tab order by class_id asc";
							  $output=mysqli_query($con,$xquery);
							   if(mysqli_num_rows($output))
							   {
								   while($rows=mysqli_fetch_assoc($output))
								   {				   	
							  ?>
                          <option value="<!--?php echo $rows['class_name']; ?>"><!--?php echo $rows['class_name'];?></option>
                          <!--?php
							 }
						   }
						  ?-->                        
                          </select>                      
                    </div><!-- /.col-lg-6 -->
                    <div class="help-block with-errors"></div>
                    </div><!--input group-->
                  </div><!-- /.row --> 
                  
                   <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <label>Class Arm</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-university"></i>
                          </div>
                     
                      <select class="form-control" name="stdarm" id="stdarm">
                      	<option value="None">None</option>
                      	<option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                        <option value="F">F</option>
                        
                      </select>
                     </div>
                    </div><!-- /.col-lg-6 -->                    
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       
                        <label>Student Hobbies</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-university"></i>
                          </div>
                           <input type="text" name="stdhobby" id="stdhobby" class="form-control" placeholder="Student Hobbies, Not more than 100 characters; Optional">
                    </div>
                    <div class="help-block with-errors"></div>
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->                
                  
                   
			
            <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                        <label>Admission Year</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" name="admyear" id="admyear" class="form-control yearselect" placeholder="Year of Admission to school" data-error="Field cannot be empty" required>                          
                    </div><!-- /.col-lg-6 -->
                    <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                        
                        <label>Current Session</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <!--input type="text" class="form-control" name="csession" id="csession" placeholder="" data-error="Current Session cannot be empty" value="<!--?php echo date('Y')."/".date('Y',strtotime('+1 year')) ?>" required--> 
                          <select class="form-control" name="csession" id="csession">
                         
                          	<option value="<?php echo $_SESSION['csession']; ?>"><?php echo $_SESSION['csession']; ?></option>
                            <!--option value="2018/2019">2018/2019</option>
                            <option value="2019/2020">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option-->
                          </select>  
                           </div>    
                           <div class="help-block with-errors"></div>                    
                    </div><!-- /.col-lg-6 -->
                  </div><!-- /.row -->
                  
                  
            
              <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                     <label>Expected Graduation Year</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="text" name="gradyear" id="gradyear" class="form-control yearselect" placeholder="Year of Admission to school" data-error="Field cannot be empty" data-mask required>                      
                      </div>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Physical Disability</label><br>                   
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="Yes" >                      
                     	Yes                  
                    &nbsp;&nbsp;                    
                      <input type="radio" name="pdisable" id="pdisable" class="minimal form-control" value="No" checked>
                      No                                                       
             		</div>
                </div>
                    
          <div style="background:#036; color:#FFF" align="center">Parent or Guardian Information</div><br>
          
           <div class="row has-feedback">
                    
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Title</label>
                       <select name="ptitle" id="ptitle" class="form-control">
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
          
           <div class="row has-feedback">
               <div class="form-group col-xs-12 col-md-6 col-lg-6">
               <label>Parent Fullname</label>
               		<div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-user"></i>
                        </div>
                    <input type="text" class="form-control typeahead tm-input" name="pname" id="pname" placeholder="Parent/Guardian Fullname" data-error="Parent Name cannot be empty" required>
                   </div>
                    <div id="countryList"></div>
                     <div class="help-block with-errors"></div>
               </div>
              <div class="form-group col-xs-12 col-md-6 col-lg-6 has-feedback">
                    <label>Other Names</label>
                       <input type="text" class="form-control" name="poname" id="poname" placeholder="Parent's/Guardian's Other Names">
              </div>
              <div class="help-block with-errors"></div>
          </div>
          <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>E-mail</label>
                    <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                          </div>
                  <input type="email" class="form-control" name="pemail" id="pemail" placeholder="Parent/Guardian Email Address" >
				 </div>
                 <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Mobile Number</label>
                     <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-mobile"></i>
                          </div>
                       <input type="text" class="form-control" name="pmobile" id="pmobile" placeholder="Parent/Guardian Mobile Number" required data-error="Phone Number cannot be empty">
            		</div>
            <div class="help-block with-errors"></div>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
          
          
          
           <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                      <textarea class="form-control" rows="3" name="paddress" id="paddress" placeholder="Enter Residential Address ..." data-error="" required></textarea>
                      <div class="help-block with-errors"></div>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">                	 
                       <!--input type="text" class="form-control" name="pcity" id="pcity" placeholder="Parent's/Guardian's Current City" data-error="" required-->
                       <select class="form-control" name="pcity" id="pcity" required>
                       		<option>Select City</option>
                       		<option value="Aba">Aba</option>
                            <option value="Abakaliki">Abakaliki</option>
                            <option value="Abeokuta">Abeokuta</option>
                            <option value="Abuja">Abuja</option>
                            <option value="Ado Ekiti">Ado Ekiti</option>
                            <option value="Akpawfu">Akpawfu</option>
                            <option value="Akure">Akure</option>
                            <option value="Asaba">Asaba</option>
                            <option value="Awka">Awka</option>
                            <option value="Bauchi">Bauchi</option>
                            <option value="Benin City">Benin City</option>
                            <option value="Birnin Kebbi">Birnin Kebbi</option>
                            <option value="Buguma">Buguma</option>
                            <option value="Calabar">Calabar</option>
                            <option value="Dutse">Dutse</option>
                            <option value="Efon-Alaaye">Efon-Alaaye</option>
                            <option value="Eket">Eket</option>
                            <option value="Enugu">Enugu</option>
                            <option value="Gombe">Gombe</option>
                            <option value="Gusau">Gusau</option>
                            <option value="Ibadan">Ibadan</option>
                            <option value="Ife">Ife</option>
                            <option value="Ifelodun">Ifelodun</option>
                            <option value="Ikeja">Ikeja</option>
                            <option value="Ikirun">Ikirun</option>
                            <option value="Ikot Ekpene">Ikot Ekpene</option>
                            <option value="Ikot-Abasi">Ikot-Abasi</option>
                            <option value="Ilorin">Ilorin</option>
                            <option value="Iragbiji">Iragbiji</option>
                            <option value="Jalingo">Jalingo</option>
                            <option value="Jimeta">Jimeta</option>
                            <option value="Jos">Jos</option>
                            <option value="Kaduna">Kaduna</option>
                            <option value="Kano">Kano</option>
                            <option value="Karu">Karu</option>
                            <option value="Katsina">Katsina</option>
                            <option value="Kumariya">Kumariya</option>
                            <option value="Lafia">Lafia</option>
                            <option value="Lagos">Lagos</option>
                            <option value="Lekki">Lekki</option>
                            <option value="Lokoja">Lokoja</option>
                            <option value="Maiduguri">Maiduguri</option>
                            <option value="Makurdi">Makurdi</option>
                            <option value="Minna">Minna</option>
                            <option value="Nnewi">Nnewi</option>
                            <option value="Nsukka">Nsukka</option>
                            <option value="Offa">Offa</option>
                            <option value="Ogaminana">Ogaminana</option>
                            <option value="Ogbomoso">Ogbomoso</option>
                            <option value="Okene">Okene</option>
                            <option value="Omu-Aran">Omu-Aran</option>
                            <option value="Onitsha">Onitsha</option>
                            <option value="Orlu">Orlu</option>
                            <option value="Oron">Oron</option>
                            <option value="Oshogbo">Oshogbo</option>
                            <option value="Owerri">Owerri</option>
                            <option value="Owo">Owo</option>
                            <option value="Oyo">Oyo</option>
                            <option value="Port Harcourt">Port Harcourt</option>
                            <option value="Potiskum">Potiskum</option>
                            <option value="Sokoto">Sokoto</option>
                            <option value="Suleja">Suleja</option>
                            <option value="Umuahia">Umuahia</option>
                            <option value="Uyo">Uyo</option>
                            <option value="Warri">Warri</option>
                            <option value="Wukari">Wukari</option>
                            <option value="Yenagoa">Yenagoa</option>
                            <option value="Yola">Yola</option>
                            <option value="Zaria">Zaria</option>
                       </select>
                       </div>                  
                        <div class="help-block with-errors"></div>                 
             	</div>
                
                 <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                    <label>Occupation</label>
                       <input type="text" class="form-control" name="occup" id="occup" placeholder="Parent's/Guardian's Occupation" data-error="One of the Field is empty" required>
                      </div>
                  
          	      <div class="form-group col-xs-12 col-md-6 col-lg-6">
                	 <label>Relationship with Student</label>
                       <select name="rel" id="rel" class="form-control">
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
              <button type="submit" id="regbut" name="regbut" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Adding New Record">Add New Student&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
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
</script>
  <script>
        $("#previewing").click(function() {
			$("input[id='file']").click();
		});
        </script>
 
  </body>
</html>
