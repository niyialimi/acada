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
    <title>::Settings > Password</title>
    
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
            Settings
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-cogs"></i> Settings</a></li>
            <li class="active">Change Password</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
         
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Change Password</h3>
                  <div class="box-tools pull-right">
                    
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                  			
                    <div class="col-md-offset-3 col-sm-offset-1 col-md-6 col-sm-10">
                             	<div id="lognotice"></div>
                                 <form action="" name="paye" id="paymentform" class="payform" method="post" enctype="multipart/form-data" role="form" data-toggle="validator">
                                   <div class="form-group">
                                    <label for="" class="control-label">Old Password</label>
                                    
                                      <input type="text" class="form-control" name="oldpwd" id="oldpwd" value="" placeholder="Old Password" required>
                                      <div class="help-block with-errors"></div>                                      
                                   
                                  </div>
                                  
                                  <div class="form-group">
                                    <label for="" class="control-label">New Password</label>
                                    
                                      <input type="password" class="form-control" name="newpwd" id="newpwd" value="" placeholder="New Password" required>
                                      <div class="help-block with-errors"></div>
                                  </div>      
                                  <div class="form-group">
                                    <label for="" class="control-label">Confirm Password</label>
                                    
                                      <input type="password" class="form-control" name="cpwd" id="cpwd" value="" data-match="#newpwd" data-match-error="Whoops, password doesn't match" placeholder="Confirm Password" required>
                                      <div class="help-block with-errors"></div>
                                   
                                  </div> 
                                  
                                  <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-10">
                                      <button type="submit" name="changepwd" id="changepwd" class="btn btn-info">Change Password</button>
                                    </div>
                                  </div>                 
                                 </form>
                                
                      </div>
                      
                    </div><!-- /.col -->
                   
                  </div><!-- /.row -->
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
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="parentapp.js"></script>
   
  </body>
</html>
