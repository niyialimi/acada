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
    <title>::My Kids</title>
    
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
            
            <li class="treeview">
              <a href="ptdashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> 
              </a>
              
            </li>
           
            <li class="active treeview">
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
            My Kids
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-graduation-cap"></i> My Kids</a></li>
            <li class="active">Attendance Report</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Kid's Attendance Report</h3>
                  <div class="box-tools pull-right">
                   <a href="mykids.php" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="My Kids"><i class="fa fa-graduation-cap"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="pad">
                        <div class="table-responsive">
                 <form action="" class="stdatted" id="attform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">   
                     
                  <div class="col-md-3">
                  		<select class="form-control" name="attendmonth" id="attendmonth" required>
                        	<option value="">Select Month</option>
                        	<option value="1">January</option>
                            <option value="2">February</option>
                            <option value="3">March</option>
                            <option value="4">April</option>
                            <option value="5">May</option>
                            <option value="6">June</option>
                            <option value="7">July</option>
                            <option value="8">August</option>
                            <option value="9">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                  		 <!--?php
							for ($i = 0; $i <= 12; $i++) {
								$time = strtotime(sprintf('%d months', $i));   
								$label = date('F', $time);   
								$value = date('n', $time);
								echo "<option value='$value'>$label</option>";
							}
							?-->
                        </select>
                  </div>
                 
                  <div class="col-md-3">
                  	<select class="form-control" name="attdsession" id="attdsession" required>
                          	<option value="2017/2018">2017/2018</option>
                          	<option value="2018/2019">2018/2019</option>
                          	<option value="2019/2020">2019/2020</option>
                            <option value="2020/2021">2020/2021</option>
                            <option value="2021/2022">2021/2022</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                  <select class="form-control" name="attdterm" id="attdterm" required>
                  		  <option value="">Select Term</option>
                          <option value="First">First Term</option>
                          <option value="Second">Second Term</option>                      
                          <option value="Third">Third Term</option>
                  	 	 
                  </select>
                  </div>
                  <div class="col-md-3">  
                  <input type="hidden" name="stdid" id="stdid" value="<?php echo $_GET['id']; ?>">                
                  
                  <input type="hidden" name="classarm" id="classarm" value="">
                  
                  </div>
                  </form>
                  </div>
                  <p>&nbsp;</p>
                  <div class="table-responsive">
                  <a href="#" id="printme" class="btn btn-info pull-right"><i class="fa fa-print"></i> Print</a>
                <form action="" class="atendtform" id="showattendform"  enctype="multipart/form-data" method="post" role="form">                
                	<div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Attendance Report</h3>
                      </div>                      
                      <div class="panel-body" id="printarea">
                      
                        <div align="center" id="stdtable1"></div>
                      </div>
                    </div>
                 
             
              </form>
             	 
                  
                
                         </div>
                      </div>
                    </div><!-- /.col -->
                   
                      
                  </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- ./box-body -->
                
              </div><!-- /.box -->
            </div><!-- /.col -->
           
         

         
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
    <script src="parentapp.js"></script>
   
  </body>
</html>
