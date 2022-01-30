<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>::Student Login</title>
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/css/font-awesome.min.css">    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/schapp.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

    
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo"><img src="../dist/img/Erudite Logo diamond 1aa.png"></div><!-- /.login-logo -->
      <div id="lognotice"></div>
      <div class="col-md-12 col-lg-12 col-sm-10">
           
                <div class="login-panel panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form action="" class="logform" id="loginform" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
                            <fieldset>
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" placeholder="Student Login ID" name="stdlogid" id="stdlogid" autofocus required>
                                    <span class="form-control-feedback"></span>
                                </div>
                                
                                <div class="form-group">
                                    <input type="password" class="form-control" placeholder="Student Password" name="stdpassword" id="stdpassword" required>
                                    <span class="form-control-feedback"></span>
                                </div>                                
                                <div class=" form-group checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <div class="row"><!-- /.col -->
                                <div class="col-md-4 col-md-offset-4">
                                  <button type="submit" id="logbut" name="logbut" class="btn btn-primary btn-block btn-flat">Sign In     <i class="fa fa-sign-in"></i></button>
                                </div><!-- /.col -->            
                              </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
              </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <script src="../plugin/jQuery-2.1.4.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../plugin/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../plugin/validator.js"></script>
    <script src="stdapp.js"></script>
    
    
  </body>
</html>
