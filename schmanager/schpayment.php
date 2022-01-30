<?php 
require_once('../req/config.php');
require_once('../req/declear.php');
require_once('../req/loginstatus.php');
require_once('script/topright.php');
$searchquery = "select * from setting_tab ";
	$searchData=mysqli_query($con,$searchquery);
	 if(mysqli_num_rows($searchData))
   	{
		while($rows=mysqli_fetch_assoc($searchData))
	   {	
	   $_SESSION['cterm']=$rows['current_term'];
	   $_SESSION['csession']=$rows['current_session'];
	   }
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::Payment</title>
    
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
    <style>
       #message{
		position:absolute;
		top:30%;
		left:50%;
		width:400px;
		}
      </style> 
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
                <li><a href="createtimetable.php"><i class="fa fa-circle-o"></i> Create Timetable</a></li>
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
            <i class="fa fa-credit-card"></i> Manage Fund
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-credit-card"></i> Manage Fund</a></li>
            <li class="active">Payment</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="box" id="regbox">
            <div class="box">
                <div class="box-header">
                 <div class="alert alert-info" role="alert" align="center"><strong>Please Select The Class You Wish to Manage School Fees For. Note Classes That Payment Has Not Been Set For Will Return An Empty Table</strong></div>
                  <a href="payment.php" class="btn btn-success pull-right"><i class="fa fa-cogs"></i>  Payment Settings</a>&nbsp;
                  <span class="bg bg-info pull-right"><strong>Current Term:<?php echo $_SESSION['cterm']; ?><br>Current Term <?php echo $_SESSION['csession'];  ?></strong></span>&nbsp;
                  <div class="row">
                  <div class="col-md-2"><label class="pull-right">Select a Class</label></div>
                  <div class="col-md-5">
                  <select class="form-control" name="schclass" id="schclass">
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
                  </select>
                  </div>
                 <div class="col-md-5"></div>
                  </div>
                 
                    </div><!-- /.box-header -->
                <div class="box-body">
                <p></p>
              	  <div class="table-responsive">
                <form action="script/markattendance.php" class="atform" id="stdattform"  enctype="multipart/form-data" method="post" role="form">
                  <table id="stdtable1" class="table table-bordered table-striped">
                    
  
                    
                    
              </table>
              <div id="message"></div>
               
              </form>
              <div id="message"></div>
             	 </div>
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
    
    <script>
  	var maxLength = 200;
	$('textarea').keyup(function() {
	  var length = $(this).val().length;
	  var newlength = maxLength-length;
	  $(this).parent().find('.counter').text(length +" / "+maxLength);
	if (newlength == 0) {
    $(this).parent().find('.counter').text('Maximum Length of'+' '+maxLength+' '+'reached');
    $(this).parent().find('.counter').css({"color":"red"});
    event.preventDefault();
  } 
  else {
   // $(this).parent().find('.counter').text(length +"/"+maxLength);
    $(this).parent().find('.counter').css({"color":"#000"});    
  }
	});
  </script>

    <script>
 $(document).ready(function(e){
	$("#schclass").change(function(){
		//checking
			var schclass=$(this).val();
		$.ajax({
	  	type: 'POST',
		url: 'script/showpaylogscript.php',
		data: {schclass:schclass},		
		dataType:'html',
		  success: function(returndata){			  
			 $('#stdtable1').html(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#stdtable1').html(returndata);
		  }
		  
		}); return false;
			
		});
		
});
 </script>

  </body>
</html>
