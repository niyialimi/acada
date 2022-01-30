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
    <title>::Messages | New Message</title>
    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugin/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugin/datepicker/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">   
    <link rel="stylesheet" href="../plugin/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
          </a>
          <!-- Navbar Right Menu -->
           <?php echo $_SESSION['toprightstaff']; ?>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo "../".$_SESSION['staffpics'];?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><span class="hidden-xs"><?php echo $_SESSION['staffusername'];?></span></p>
              <!--a href="#"><i class="fa fa-circle text-success"></i> Online</a-->
            </div>
          </div>
          <ul class="sidebar-menu">
            
            <li class="treeview">
              <a href="staffdashboard.php">
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
                <li><a href="stdattendance.php"><i class="fa fa-circle-o"></i> Mark Attendance</a></li>
                <li><a href="examscore.php"><i class="fa fa-circle-o"></i> Input Exam Score</a></li>
                <li><a href="testscore.php"><i class="fa fa-circle-o"></i> Input Test Score</a></li>       
                <li><a href="viewstd.php"><i class="fa fa-circle-o"></i> View Student</a></li>        
              </ul>
            </li>
            
            <li class="treeview">
              <a href="myclass.php">
                <i class="fa fa-university"></i>
                <span>My Class</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="assignment.php"><i class="fa fa-circle-o"></i> Assignment</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> My Class Subject</a></li>           
              </ul>
            </li>
           
          
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="staffattendance.php"><i class="fa fa-circle-o"></i> My Attendance</a></li>
                <li><a href="stdattendreport.php"><i class="fa fa-circle-o"></i> Student Attendance Report</a></li>              
             	<li><a href="#"><i class="fa fa-circle-o"></i> My Timetable</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> General Timetable</a></li>
                <li><a href="marks.php"><i class="fa fa-circle-o"></i> Student Mark Summary</a></li>
                <li><a href="reportsheet.php"><i class="fa fa-circle-o"></i> Student Report Sheet</a></li>   
             </ul>
            </li>   
            
            <li class="active treeview">
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
            Messaging
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-envelope"></i> Messaging</a></li>
            <li class="active">New Message</li>
          </ol>
        </section>

        <!-- Main content -->
               <section class="content">
          <div class="row">
            <div class="col-md-3">
              <a href="mymessage.php" class="btn btn-primary btn-block margin-bottom">Back To Inbox</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class=""><a href="mymessage.php"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">X</span></a></li>
                    <li><a href="msgsent.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <!--li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li-->
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <!--div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Labels</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                  </ul>
                </div><!-- /.box-body-- >
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <form action="" class="messageform" id="messagesendform"  enctype="multipart/form-data" method="post" role="form" data-toggle="validator">
                  <div class="form-group">
                    <input name="msgto" id="msgto"  class="form-control" placeholder="" value="School Admin" readonly>
                  </div>
                  <div class="form-group">
                    <input name="msgsubject" id="msgsubject" class="form-control" placeholder="Subject:" value="" required>
                  </div>
                  <div class="form-group">
                    <!--textarea name="composemsg" id="composemsg" class="form-control" maxlength="10" style="height: 300px">
                    </textarea--><textarea class="form-control" name="msgbody" id="msgbody" rows="10" maxlength="1000" placeholder="Maximum Character is 1000char" required></textarea>
                    <span class="counter"></span>
                  </div>
                  <!--div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment">
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div>
                </div><!-- /.box-body -->
                <div id="message"></div>
                <div class="box-footer">
                  <div class="pull-right">
                    <button type="submit" name="sendmsgbut" id="sendmsgbut" class="btn btn-primary" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Sending Message">Send Message <i class="fa fa-send-o"></i></button>
                  </div>
                  <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
                </form>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
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
    <script src="plugin/sparkline/jquery.sparkline.min.js"></script>
    <!--script src="plugin/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="plugin/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugin/slimScroll/jquery.slimscroll.min.js"></script-->
    <script src="../plugin/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="../plugin/iCheck/icheck.min.js"></script>
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="staffapp.js"></script>
    <script>
 $(document).ready(function(e){
	$("#clname").change(function(){
		//alert('wehere');//checking
			var clname=$(this).val(); 
				// alert(atclass);
				// alert(clname);
		$.ajax({
	  	type: 'POST',
		url: 'script/classsectionselect.php',
		data: {clname:clname},		
		dataType:'html',
		  success: function(returndata){
			 
			 $('#classarm').val(returndata);
			  },
		  error: function(returndata)
		  {
			  $('#classarm').val(returndata);
		  }
		  
		}); return false;
			
		});
		 $(".exampick").datepicker({ 
		format: 'yyyy-mm-dd', 
		autoclose: true, 
		todayBtn: 'linked',
		 weekStart: 1,
		 todayHighlight: 1
		});
		
		
});
 </script>
 
    <!-- Page Script -->
    <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var glyph = $this.hasClass("glyphicon");
          var fa = $this.hasClass("fa");

          //Switch states
          if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
          }
        });
      });
    </script>
  <script>
  	var maxLength = 1000;
	$('textarea').keyup(function() {
	  var length = $(this).val().length;
	  var newlength = maxLength-length;
	  $(this).parent().find('.counter').text(length +"of"+maxLength);
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
  </body>
</html>
