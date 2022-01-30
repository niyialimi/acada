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
    <title>::Kids Fee Detail</title>
    
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
            <div class="col-md-12 col-sm-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Selected Kid Payment History</h3>
                  <div class="box-tools pull-right">
                    <a href="mykids.php" class="btn btn-success pull-right" data-toggle="tooltip" data-placement="bottom" title="My Kids"><i class="fa fa-graduation-cap"></i></a>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-12">
                             <div class="table-responsive">
                             <form action="" id="tableform" class="tabform" method="post" enctype="multipart/form-data" role=form>
                         <table width="100%" class="table table-bordered table-striped sms-white" id="table">
                        <thead style="background:#39C; color:#FFF;">
                        <tr>
                            <th width="8%" class="text-center">S/N</th>
                            <th width="8%" class="text-center">&nbsp;</th>
                            <th width="15%" class="text-center">Payment</th>
                            <th width="14%" class="text-center">Amount</th>
                            <th width="18%" class="text-center">Term</th>
                            <th width="16%" class="text-center">Session</th>
                            <th width="29%" class="text-center">Payment Confirmation Date</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php
							 $sn=0; 
							 $id=$_GET['id'];							
							 $xquery="select * from payment_tab where student_id='$id'";
							 $output=mysqli_query($con,$xquery);
							 if(mysqli_num_rows($output))
							   {
								   while($rows=mysqli_fetch_array($output))
								   {	
								  	  $sn++;									  
									  $studentid=$rows['student_id'];
							 ?>
                            <tr>
                                <td align="center"><?php echo $sn; ?></td>
                                <td align="center">&nbsp;</td>
                                <td align="center"><?php echo $rows['payment_for']; ?></td>
                                <td align="center"><?php echo $rows['payment_amount']; ?></td> 
                                <td align="center"><?php echo $rows['payment_term']; ?></td>  
                                <td align="center"><?php echo $rows['payment_session']; ?></td>                            
                                <td align="center"><?php echo $rows['payment_date']; ?></td>
                               
                            </tr>
                            
                            <?php
                            
                               }
                           }
                           else
                           {
                            ?> 
                            <tr>
                            <td colspan="9" align="center"><i class="fa fa-times"></i><?php echo "No Record Yet";?></td>
                            </tr> 
                          <?php } ?>
     <!--modal-->
 <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Kid's Details
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="display"></div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal -->

<!--modal2-->
 <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
   <div class = "modal-dialog modal-lg">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Edit Employee Details
            </h4>
         </div>
         
         <div class = "modal-body">
            <div id="datadisplay"></div>
         </div>
         
         <div class = "modal-footer">
            <button type = "button" class = "btn btn-danger" data-dismiss = "modal">
               Close
            </button>
            <button type = "button" id="editallbut" class = "btn btn-primary">
               Edit Detail&nbsp;&nbsp;<i class="glyphicon glyphicon-edit icon-white"></i>
            </button>
            
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div>
<!-- /.modal2 -->
    
      </tbody>         
    </table>
    </form>
                     </div>
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
    <script src="parentapp.js"></script>
   
  </body>
</html>
