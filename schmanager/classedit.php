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
    <title>::Edit Class Information</title>
    
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
            <i class="fa fa-eidt"></i> Edit Class
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Edit Class</a></li>
            <li class="active">Edit Class Detail</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box-body">
              <div class="register-box-body">
                <p class="login-box-msg">Edit Class Details</p>
        
        <form action="" name="cleditform" class="clform" id="editclassform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
        <input type="hidden" name="clientappid" id="clientappis" value="<?php echo $_SESSION['clientappid']; ?>">     
            
         <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">                      
                       <label>Class Name</label>                       
           			 <select class="form-control" name="clname" id="clname"  required>   
                     	<?php
						   $id=$_GET['id'];		
						  $xquery="select * from class_tab where class_id='$id' and clientapp_id='".$_SESSION['clientappid']."'";
						  $output=mysqli_query($con,$xquery);
						   if(mysqli_num_rows($output))
						   {
							   while($rows=mysqli_fetch_assoc($output))
							   {	
							  
						  ?>              		  
                  	 	  <option value="<?php echo $rows['class_name']; ?>"><?php echo $rows['class_name']; ?></option>
                          
                  </select>
            		<input type="hidden" value="<?php echo $id; ?>" name="classselect" id="classselect">
            		<div class="help-block with-errors"></div>
         		 </div>                   
                 
                   <div class="form-group col-xs-12 col-md-6 col-lg-6">
                       <label>Class Alias</label>
                  <div class="form-group has-feedback">
                    <input type="text" name="clalias" id="clalias" class="form-control" value="<?php echo $rows['class_alias']; ?>" data-error="" readonly required>
                    <span class="fa fa-university form-control-feedback"></span>
                    <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  
                 </div> <!-- /.row -->              
                 	
                 
                  <div class="row has-feedback">
                  <div class="col-xs-12 col-md-6 col-lg-6"> 
                        <label>Class Arm</label>                      
             		<div class="form-group has-feedback">
                    <input type="text" name="clarm" id="clarm" class="form-control" value="<?php echo $rows['class_arm']; ?>" placeholder="either A or B or C e.t.c or type None" data-error="Field is Empty" required readonly>
                    <span class="fa fa-university form-control-feedback"></span>
            
                        <div class="help-block with-errors"></div>
                      </div>    
                  </div>               
                          <?php
						  	 }
						   }
						 ?>  
                  <div class="form-group col-xs-12 col-md-6 col-lg-6">                                      
                   <div class=" has-feedback">
                    <label>Class Category</label>                      
            <select class="form-control" name="clcategory" id="clcategory">
                  		  <option value="None">None</option>
                  	 	  <option value="Art">Art</option>            
                          <option value="Science">Science</option>              
                          <option value="Commercial">Commercial</option>                       
                  </select>
            
                    <div class="help-block with-errors"></div>
                  </div>
          	 </div><!-- /.row -->
          </div>
     
                   
            
        <div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6"> 
                        <label>Assign Class Teacher</label>                   
                  <select class="form-control" name="clteacher" id="clteacher">
                  <?php		
                  $xquery="select * from staff_tab where staff_type='Teaching' and clientapp_id='" . $_SESSION['clientappid'] . "' order by staff_id asc";
                  $output=mysqli_query($con,$xquery);
                   if(mysqli_num_rows($output))
                   {
                       while($rows=mysqli_fetch_assoc($output))
                       {				   	
                  ?>
                  <option value="<?php echo $rows['staff_id']; ?>"><?php echo $rows['staff_lname']." ".$rows['staff_fname'] ?></option>
                  <?php
                     }
                   }
                  ?>
                    </select>
                    <div class="help-block with-errors"></div>
                      </div>                   
                            
                  <div class="col-xs-12 col-md-6 col-lg-6">
                   <?php		
                  	echo '<div class="row has-feedback">
                    <div class="form-group col-xs-12 col-md-6 col-lg-6">
           <label>Subject</label><br>';
          
		   $output='';
		   $id=$_GET['id'];
		   $countsub="select count(subject_id) as total from subject_tab";
		   $countdata=mysqli_query($con,$countsub);
		   if(mysqli_num_rows($countdata))
		 		  {
			    while($row=mysqli_fetch_assoc($countdata))
	   				{
						$totalsub=$row['total'];
						
					}
				  }
				  $totalhalf=($totalsub/2);
		   $searchquery = "select subject_name,subject_id from subject_tab where clientapp_id='".$_SESSION['clientappid']."' order by subject_id";
			$searchData=mysqli_query($con,$searchquery);
			$asubject=array();
			 if(mysqli_num_rows($searchData))
		 		  {
			    while($rows=mysqli_fetch_assoc($searchData))
	   				{
						$asubject=$rows['subject_name'];		
						$subjectid=$rows['subject_id'];						
						$chksubselect="select subject_taken from class_tab where class_id='$id'";
						$readquery=mysqli_query($con,$chksubselect);
							if(mysqli_num_rows($readquery))
							{
								while($subrow=mysqli_fetch_assoc($readquery))
								{
									$dbsubject=explode(',',$subrow['subject_taken']);
									
  								 if(in_array($asubject,$dbsubject)) {
									$output.='<input type="checkbox" name="asubject[]" id="asubject" class="sub" value="'.$asubject.'" checked>'.$asubject.'<br>';
								 }else
								 {
									 $output.='<input type="checkbox" name="asubject[]" id="asubject" class="sub" value="'.$asubject.'">'.$asubject.'<br>';
								 }
								}
							}
					}
			   }
			   
			   echo $output;
		  
           echo '</div>';
                  ?>
                  </div>
                  
                  
           </div><!-- /.row -->
           <div id="message" align="center"></div>
          <div class="row">            
            <div class="col-xs-12 col-md-5 col-lg-5"></div>
            <div class="col-xs-12 col-md-4 col-lg-4">            
              <button type="submit" id="cleditbut" name="cleditbut" class="btn btn-info" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Editing Class Details Class">Edit Class Class&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok-sign"></span></button>
</button>&nbsp;&nbsp;
            </div><!-- /.col -->
            <div class="col-xs-12 col-md-3 col-lg-3"></div>
          </div>     
          <p>&nbsp;</p>                
        </form>       
        <div id="display"></div> 
    </div><!-- /.form-box -->
    </div><!-- /.register-box -->
    
    <!--add sub modal-->
    <div class = "modal fade" id = "subModal" tabindex = "-1" role = "dialog" aria-labelledby = "subModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class="modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "subModalLabel">
              Assign Subject
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
   
   <!--view Modal-->
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
        $("#clname").change(function(){
			var className=$('#clname').val();
            //alert(className);
			if(className=='KG'){document.getElementById('clalias').value='KG';}
			else if(className=='Nursery 1'){document.getElementById('clalias').value='Nursery 1';}
			else if(className=='Nursery 2'){document.getElementById('clalias').value='Nursery 2';}
			else if(className=='Nursery 3'){document.getElementById('clalias').value='Nursery 3';}
			else if(className=='Primary 1'){document.getElementById('clalias').value='Primary 1';}
			else if(className=='Primary 2'){document.getElementById('clalias').value='Primary 2';}
			else if(className=='Primary 3'){document.getElementById('clalias').value='Primary 3';}
			else if(className=='Primary 4'){document.getElementById('clalias').value='Primary 4';}
			else if(className=='Primary 5'){document.getElementById('clalias').value='Primary 5';}
			else if(className=='Primary 6'){document.getElementById('clalias').value='Primary 6';}
			else if(className=='Junior Secondary School 1'){document.getElementById('clalias').value='JSS 1';}
			else if(className=='Junior Secondary School 2'){document.getElementById('clalias').value='JSS 2';}
			else if(className=='Junior Secondary School 3'){document.getElementById('clalias').value='JSS 3';}
			else if(className=='Senior Secondary School 1'){document.getElementById('clalias').value='SSS 1';}
			else if(className=='Senior Secondary School 2'){document.getElementById('clalias').value='SSS 2';}
			else if(className=='Senior Secondary School 3'){document.getElementById('clalias').value='SSS 3';}
        });
        });
    </script>
  
  </body>
</html>
