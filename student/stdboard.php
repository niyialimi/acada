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
    <title>::Parent Dashboard</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

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
							   $_SESSION['clientname']=$rows['clientapp_name'];
							   echo $name;
						   }
					   }
			 ?>
          </a>
          <!-- Navbar Right Menu -->
           <?php echo $_SESSION['toprightstudent']; ?>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         <p>&nbsp;</p>
          <ul class="sidebar-menu">
            
            <li class="active treeview">
              <a href="ptdashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              
            </li>
           
            <li class="treeview">
              <a href="attendance.php">
                <i class="fa fa-graduation-cap"></i>
                <span>Attendance</span>
              </a>
             
            </li>
            
            <li class="treeview">
              <a href="score.php">
                <i class="fa fa-graduation-cap"></i>
                <span>Score Sheet</span>
              </a>
             
            </li>
            
            <li class="treeview">
              <a href="feedetail.php">
                <i class="fa fa-graduation-cap"></i>
                <span>Fee Detail</span>
              </a>
             
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-graduation-cap"></i>
                <span>History</span>
              </a>
             <ul class="treeview-menu">
                <li><a href="atthistory.php"><i class="fa fa-circle-o"></i> Attendance History</a></li>
                <li><a href="markhistory.php"><i class="fa fa-circle-o"></i> Mark History</a></li> 
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
            Dashboard
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
          <div class="row">
            <div class="col-md-7 col-sm-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">My Profile</h3>
                  <div class="box-tools pull-right">
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                         <?php
							  $fullclass='';
							 $xquery="select * from student_tab where clientapp_id='".$_SESSION['clientappid']."'";
							 $output=mysqli_query($con,$xquery);
							 if(mysqli_num_rows($output))
							   {
								   while($rows=mysqli_fetch_array($output))
								   {
									   $_SESSION['lname']=$rows['lname'];
									   $_SESSION['fname']=$rows['fname'];
									   $_SESSION['oname']=$rows['oname'];
									   $_SESSION['stdnumber']=$rows['rollnum'];
									   $_SESSION['currentclass']=$rows['current_class'];
									   $_SESSION['currentarm']=$rows['current_arm'];
									   $_SESSION['pics']=$rows['pics'];
									   
									 }
							   }else{$fullclass.='Not Assigned';}
							 ?>
                         <table width="100%">
                         <tr><td style="margin-left:10px;" width="29%" rowspan="5">
                         	<img src="<?php echo "../".$_SESSION['pics'];?>" width="100px" height="100px" alt="Staff Image" class="img-thumbnail">
                         </td>
                         <td width="22%" style="font-size:16px;">&nbsp;&nbsp;Name Name:&nbsp;</td>
                         <td width="49%" style="font-size:16px;"><strong><?php echo $_SESSION['lname']." ".$_SESSION['fname'];?></strong></td>
                         </tr>
                         <tr>
                         <td style="margin-left:10px;font-size:16px;">&nbsp;&nbsp;Student Number: &nbsp;</td>
                         <td style="margin-left:10px;font-size:16px;"><strong><?php echo $_SESSION['stdnumber'];?></strong></td>
                         </tr>
                         <tr>
                           <td style="margin-left:10px;font-size:16px;">&nbsp;&nbsp;Current Class: &nbsp;</td>
                           <td style="margin-left:10px;font-size:16px;"><strong><?php echo $_SESSION['currentclass'];?></strong></td>
                         </tr>
                         
                         <tr>
                         	<td style="margin-left:10px;font-size:16px;">&nbsp;&nbsp;Arm/Session: &nbsp;</td>
                           <td style="margin-left:10px;font-size:16px;"><strong><?php echo $_SESSION['currentarm'];?></strong></td>
                         </tr>
                         <tr><td colspan="2">&nbsp;&nbsp;</td></tr>
                        	 
                         </table> <!--?php echo $_SESSION['staffid'];?-->
                      </div>
                    </div><!-- /.col -->
                   
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                <div class="box-footer">
                  <div class="row">
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                      <a href="atthistory.php">
                        <span class="description-percentage text-green"><i class="fa fa-hand-pointer-o fa-3x"></i></span>
                        <h5 class="description-text">Attendance History</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                      <a href="myprofile.php">
                        <span class="description-percentage text-yellow"><i class="fa fa-users fa-3x"></i></span>
                        <h5 class="description-text">My Profile</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block border-right">
                      <a href="markhistory.php">
                        <span class="description-percentage text-blue"><i class="fa fa-history fa-3x"></i></span>
                        <h5 class="description-text">Mark History</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div><!-- /.col -->
                    <div class="col-sm-3 col-xs-6">
                      <div class="description-block">
                      <a href="mytimetable.php">
                       <span class="description-percentage text-red"><i class="fa fa-tasks fa-3x"></i></span>
                        <h5 class="description-text">My Timetable</h5>
                        </a>
                      </div><!-- /.description-block -->
                    </div>
                  </div><!-- /.row -->
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
            <div class="col-md-5 col-sm-12">
            
            	<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">My Messages</h3>
                  
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                  <div class="col-md-12">
                  	<ul class="timeline">
					 <?php
                                                  
                        $xquery="select * from message_tab where msg_to='Parents' and clientapp_id='".$_SESSION['clientappid']."' order by msg_id desc limit 3";
                        $output=mysqli_query($con,$xquery);
                        if(mysqli_num_rows($output))
                         {$fullclass='';
                           while($rows=mysqli_fetch_array($output))
                           {
                        ?>
                        <!-- timeline time label -->
                        <li class="time-label">
                        
                            <span class="bg-red">
                                <?php echo $rows['msg_date']; ?>
                            </span>
                        </li>
                        <!-- /.timeline-label -->
                    
                        <!-- timeline item -->
                        <li>
                            <!-- timeline icon -->
                      
                            <i class="fa fa-envelope bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?php echo $rows['msg_time']; ?></span>
                    
                                <h3 class="timeline-header"><a href="#"><?php echo $rows['msg_subject']; ?></a></h3>
                    
                                <div class="timeline-body">
                                    <?php echo $rows['msg_body']; ?>
                                </div>
                                <div id="alert"></div>
                                <div class="timeline-footer">
                                    <a class="btn btn-primary btn-xs" href="readmsg.php?msgid=<?php echo $rows['msg_id']; ?>">Read More</a>
                                    <a class="btn btn-danger btn-xs" id="deletebut" href="#" data-id="<?php echo $rows['msg_id']; ?>">Delete</a>
                                </div>
                            </div>
                        </li>
                        <?php 
                            }
                        }
                        ?>
                        <!-- END timeline item -->
                    
                    
                    </ul>
                    </div>
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
               
              </div>
            
            </div>
          </div><!-- /.row -->
          
          <div class="row">
          	<div class="col-md-6">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">News And Events</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="table-responsive">
                      <?php
							  
				$xquery="select * from newsevent_tab where  clientapp_id='".$_SESSION['clientappid']."' order by ne_id desc limit 10";
				$output=mysqli_query($con,$xquery);
				if(mysqli_num_rows($output))
				 {$fullclass='';
				   while($rows=mysqli_fetch_array($output))
				   {
					   $netype=$rows['ne_type'];
					   if($netype=='News'){$type='<span data-toggle="tooltip" title="3 New Messages" class="label label-info">News</span>';}
					   else{$type='<span data-toggle="tooltip" title="3 New Messages" class="label label-warning">Event</span>';}
				?>
                     <table width="100%" class="table-responsive table-condensed">
                     <tbody>
                     	<tr>
                            <td width="10%">
                            <?php echo $type; ?>
                            </td>
                            <td width="70%"><b><a href="newsevent.php?neid=<?php echo $rows['ne_id']; ?>"><?php echo $rows['ne_title']; ?></a></td>
                            <td width="20%"><i class="fa fa-calender"></i>  <?php echo $rows['publish_date']; ?></td>
                        </tr>
                        <?php
				   		}
				 }
						?>
                     </tbody>
                     </table>
                     </div>
                 
                    </div><!-- /.col -->
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                
              </div><!-- /.box -->
            </div>
          </div><!--row ends-->

         
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
    <script src="staffapp.js"></script>
   
  </body>
</html>
