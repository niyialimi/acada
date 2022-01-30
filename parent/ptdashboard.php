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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          </a>
          <!-- Navbar Right Menu -->
           <?php echo $_SESSION['toprightparent']; ?>

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
              <a href="mykids.php">
                <i class="fa fa-graduation-cap"></i>
                <span>My Kids</span>
              </a>
             
            </li>
            
            <li class="treeview">
              <a href="markhistory.php">
                <i class="fa fa-history"></i>
                <span>Mark History</span>
              </a>
             
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
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                        <div class="table-responsive">
                         <?php
							  
							 $xquery="select count(*) as total from student_tab where parent_phone='".$_SESSION['parentphone']."'";
							 $output=mysqli_query($con,$xquery);
							 if(mysqli_num_rows($output))
							   {
								   while($rows=mysqli_fetch_array($output))
								   {
									   $_SESSION['noofkids']=$rows['total'];
									   
							
									 }
							   }
							 ?>
                             <div class="table-responsive">
                         <table width="100%">
                         <tr>
                           <td style="margin-left:10px; font-size:16px;" width="48%" rowspan="3">
                             <strong>&nbsp;&nbsp;<?php echo $_SESSION['parentname'];  ?></strong></td>
                           <td style="font-size:16px;">&nbsp;</td>
                         </tr>
                         <tr>
                           <td width="52%" style="margin-left:10px; font-size:16px;">&nbsp;&nbsp;Email:&nbsp;&nbsp;<strong><?php  echo $_SESSION['pemail']; ?></strong></td></tr>
                         <tr>
                         <td style="font-size:16px;">&nbsp;</td></tr>
                         <tr>
                           <td style="font-size:16px;" width="48%">No of Kid(s):&nbsp;&nbsp;<strong><?php echo $_SESSION['noofkids'];?></strong></td>
                           <td style="margin-left:10px; font-size:16px;" width="52%">&nbsp;&nbsp;My Mobile:&nbsp;&nbsp;<strong><?php echo $_SESSION['parentphone'];  ?></strong></span></td></tr>
                        	 
                         </table>
                         </div>
                      </div>
                    </div><!-- /.col -->
                   
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
                
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
