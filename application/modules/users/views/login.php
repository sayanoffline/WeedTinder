<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?php echo $this->config->item('base_url');?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo $this->config->item('base_url');?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo $this->config->item('base_url');?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
    
    <!-- jQuery 2.1.3 -->
    <script src="<?php echo $this->config->item('base_url');?>assets/js/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo $this->config->item('base_url');?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" language="javascript">
      var js_site_url='<?php echo $this->config->item('base_url');?>index.php/';
    </script>
    <script src="<?php echo $this->config->item('base_url');?>assets/js/common.js"></script>
    
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href=""><b>Admin Panel</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <p class="login-box-msg" id="login_err_txt" style="color:red;display:none;">Please check your Username/Password</p>
        <form id="loginFrm" method="post">
          <div class="form-group has-feedback">
            <input class="form-control" type="text" name="username" id="username" placeholder="Username"  onfocus="javascript:checkLoginNullValue()" >
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input class="form-control enter_press" type="password" name="password" id="password" placeholder="Password"  onfocus="javascript:checkLoginNullValue()" >
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">            
            <div class="col-xs-12">
              <button class="btn btn-primary btn-block btn-flat" type="button" onclick="userLogin();">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    
    
    
    
  </body>
</html>