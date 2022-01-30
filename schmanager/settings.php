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
    <title>::Update Settings</title>
    
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
            <i class="fa fa-cogs"></i> Settings
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>
            <li class="active">School Settings</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box" id="regbox">
            <div class="box-body">
              <div class="register-box-body">
                <form action="" class="setform" id="settingform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
                  
                    <div class="box-body">
                      <div class="register-box-body">
                        <p class="login-box-msg">School Settings</p>
                        <input type="hidden" name="clientappid" id="clientappid" value="<?php echo $_SESSION['clientappid']; ?>">
                        <div style="background:#036; color:#FFF" align="center">School General Information</div>
                        <br>
                        <?php
		   	$selectsql='select * from setting_tab where clientapp_id='.$_SESSION['clientappid'].' ';
							$result=mysqli_query($con,$selectsql);
								if (mysqli_num_rows($result))
								{
									while($rows=mysqli_fetch_assoc($result))
									{
										
		   ?>
                        <div class="row form-group has-feedback">
                          <div class="col-xs-12 col-md-6 col-lg-6">
                            <label>School Name</label>
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon"> <i class="fa fa-university"></i> </div>
                                <input type="text" name="clientname" id="clientname" class="form-control" value="<?php echo $rows['clientapp_name']; ?>" placeholder="" required>
                              </div>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-6 col-lg-6">
                            <label>School E-mail</label>
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon"> <i class="fa fa-envelope"></i> </div>
                                <input type="text" name="clientemail" id="clientemail" class="form-control" value="<?php echo $rows['clientapp_email']; ?>" placeholder="" required>
                              </div>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </div>
                        <!-- /.row -->
                        <div class="row has-feedback">
                          <div class="form-group col-xs-12 col-md-6 col-lg-6">
                            <label>Country</label>                            
                            <input type="text" name="nation" id="nation" class="form-control" value="<?php echo $rows['clientapp_country']; ?>" placeholder="Country Nation">
                            <div class="help-block with-errors"></div>
                          </div>
                          <!-- /.col-lg-6 -->
                          <div class="form-group col-xs-12 col-md-6 col-lg-6">
                            <label>State</label>
                            <input type="text" name="state" id="state" class="form-control" value="<?php echo $rows['clientapp_state']; ?>" placeholder="State">
                            <div class="help-block with-errors"></div>
                          </div>
                          <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                        <div class="row has-feedback">
                          <div class="form-group col-xs-12 col-md-6 col-lg-6">
                            <textarea class="form-control" rows="3" name="schaddress" id="schaddress" placeholder="Enter School Address ..." data-error="" required><?php echo $rows['clientapp_address']; ?></textarea>
                            <div class="help-block with-errors"></div>
                          </div>
                          <div class="form-group col-xs-12 col-md-6 col-lg-6">
                            <!--input type="text" class="form-control" name="pcity" id="pcity" placeholder="Parent's/Guardian's Current City" data-error="" required-->
                            <select class="form-control" name="schcity" id="schcity" required>
                              <option value="<?php echo $rows['clientapp_city']; ?>"><?php echo $rows['clientapp_city']; ?></option>
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
                            <label>School Website</label>
                            <div class="input-group">
                              <div class="input-group-addon"> <i class="fa fa-university"></i> </div>
                              <input type="text" name="schweb" id="schweb" class="form-control" value="<?php echo $rows['clientapp_web']; ?>" placeholder="School Website e.g www.school.com">
                            </div>
                            <div class="help-block with-errors"></div>
                          </div>
                          <!-- /.col-lg-6 -->
                          <div class="form-group col-xs-12 col-md-6 col-lg-6">
                            <label for="InputFile">School Logo</label>
                            <div id="image_preview"><img id="previewing" src="<?php echo "../".$rows['clientapp_logo']; ?>" style="width:100px; height:100px; cursor:pointer;" width="100px" height="100px" class="img-thumbnail"/></div>
                            <br>
                            <input type="file" name="profileImg" id="profileImg" src="<?php echo $rows['clientapp_logo']; ?>" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration">
                            <div class="help-block with-errors"></div>
                          </div>
                          <!-- /.col-lg-6 -->
                        </div>
                        <!-- /.row -->
                        <div class="row form-group has-feedback">
                          <div class="col-xs-12 col-md-6 col-lg-6">
                            <label>School Mobile</label>
                            <div class="form-mobile has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon"> <i class="fa fa-mobile"></i> </div>
                                <input type="text" name="clientmobile" id="clientmobile" class="form-control" placeholder="" value="<?php echo $rows['clientapp_mobile']; ?>" required>
                              </div>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-6 col-lg-6">
                            <label>Registration Date</label>
                            <div class="form-group has-feedback">
                              <input type="text" name="regdate" id="regdate" class="form-control" value="<?php echo $rows['reg_date']; ?>"  readonly required>
                              <span class="fa fa-calender form-control-feedback"></span>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                        </div>
                        
                        <div style="background:#036; color:#FFF" align="center">Academic Settings</div><br> 
                        
                        <div class="row form-group has-feedback">
                          <div class="col-xs-12 col-md-6 col-lg-6">
                            <label>Current Session</label>
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <input type="text" name="csession" id="csession" class="form-control" value="<?php echo $rows['current_session']; ?>"  required>
                              </div>
                              <div class="help-block with-errors"></div>
                            </div>
                          </div>
                          <div class="col-xs-12 col-md-6 col-lg-6">
                            <label>Current Term</label>
                            <div class="form-mobile has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon"> <i class="fa fa-calendar"></i> </div>
                                <select class="form-control" name="cterm" id="cterm" required>
                                <option value="<?php echo $rows['current_term']; ?>"><?php echo $rows['current_term']; ?></option>
                                  <option value="First">First</option>
                                  <option value="Second">Second</option>
                                  <option value="Third">Third</option>
                                </select>
                              </div>
                              <div class="help-block with-errors"></div>
                            </div>                            
                          </div>
                        </div>
                        
                       <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">  
                        <label>Term Begins</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tbegin" id="tbegin" class="form-control datepick" value="<?php echo $rows['clientapp_tbegin']; ?>" placeholder="Date Term Begins YYYY-MM-DD" data-error="Birthday Field cannot be empty" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>                      
                    </div><!-- /.input group -->
                    <div class="help-block with-errors"></div>
                    
                    </div><!-- /.col-lg-6 -->
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label>Term Ends</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="tend" id="tend" class="form-control datepick" value="<?php echo $rows['clientapp_tend']; ?>" placeholder="Date The Term Ends YYYY-MM-DD" data-error="Field cannot be empty" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required>                      
                    </div><!-- /.input group -->
                    <div class="help-block with-errors"></div>
                    </div><!--col-->  
                  </div><!-- /.row -->    
                  
                  <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">  
                        <label>Authorized Signature</label>
                        <input type="file" name="signImg" id="signImg" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration">
                        <input type="hidden" name="signImg1" id="signImg1" value="<?php echo $rows['clientapp_sign']; ?>" placeholder="Image must be less than 100kb" data-error="Select an image to complete registration">
                            <div class="help-block with-errors"></div>
                    <div class="help-block with-errors"></div>
                    
                    </div><!-- /.col-lg-6 -->
                    </div>
                        
                        <div class="row form-group has-feedback">
                          <div class="col-xs-12 col-md-12 col-lg-12">
                            <div id="display"></div>
                          </div>
                        </div>
                        <!-- /.row -->
                        <?php
					}
				}
		   ?>
                        <div class="row">
                          <div class="col-xs-12 col-md-5 col-lg-5">
                            <div id="message" align="center"></div>
                          </div>
                          <div class="col-xs-12 col-md-4 col-lg-4">
                            <button type="submit" id="settingbut" name="setttingbut" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Updating School Setup">Update School&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
                          </div>
                          <!-- /.col -->
                          <div class="col-xs-12 col-md-3 col-lg-3"></div>
                        </div>
                      </div>
                      <!-- /.form-box -->
                    </div>
                    <!-- /.register-box -->
                 
                </form>
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
    <script src="../plugin/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugin/iCheck/icheck.min.js"></script>
    <script src="../plugin/countries.js"></script>
    <script src="../plugin/select2/select2.full.min.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="../plugin/year-select.js"></script>
    <script src="schapp.js"></script>
	<script type="text/javascript">
    	$(document).ready(function(){
			populateCountries("nation", "state");//auto fill all country
		$(".select").select2();//auto type country
			});
    </script>
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
  <script>
        $("#previewing").click(function() {
			$("input[id='file']").click();
		});
        </script>
        
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
});
</script>
  </body>
</html>
