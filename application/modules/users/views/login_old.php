<!DOCTYPE html>
<html class="js desktop  js csstransitions" lang="en-US"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="UTF-8">
		<title>Match Polly</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="">
<!-- favicon -->
		<link rel="shortcut icon" href="<?php echo $this->config->item('base_url');?>assets/images/favicon.png">
<!-- favicon -->
<!-- font start -->
        <!--<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Raleway:200">--> <!-- font-family: Raleway,sans-serif;  -->
<!-- font end -->  

<!-- Js url -->
<script type="text/javascript" language="javascript">

      var js_site_url='<?php echo $this->config->item('base_url');?>index.php/';
  </script>
<!-- Js url -->  
     
<!-- ui start -->
    <link href="<?php echo $this->config->item('base_url');?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url');?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->item('base_url');?>assets/css/font.css" rel="stylesheet">
<!-- libaray JavaScript -->
	<script src="<?php echo $this->config->item('base_url');?>assets/js/new_min.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>assets/js/jquery.js"></script>
    <script src="<?php echo $this->config->item('base_url');?>assets/js/jquery.form.js"></script>
	<script src="<?php echo $this->config->item('base_url');?>assets/js/md5.js"></script>
	<script src="<?php echo $this->config->item('base_url');?>assets/js/jquery_002.js"></script>
        <script src="<?php echo $this->config->item('base_url');?>assets/js/common.js"></script>
<!-- ui end --> 

<script>
$(document).ready(function(){
$(".enter_press").bind('keypress',function(event){
	var code = event.keyCode ? event.keyCode : event.which;
    if(code == 13){

	//alert("hi..");
        $("#logBtn").click();
    }
});

});
</script>
 
<!--tooltip css-->
	<link rel="stylesheet"  href="<?php echo $this->config->item('base_url');?>assets/tool_tip/tip-yellow.css" type="text/css" media="all">	
<!--tool tip css end-->      
<!-- style start -->        
<link rel="stylesheet" href="<?php echo $this->config->item('base_url');?>assets/css/style.css" media="all" />
<!-- style end -->
<head>

<body>
<!--firstpage start-->
<section class="first_p">
<!--TOPSECTION START-->
<section class="f_top">
<!--wrapper estart-->
<section class="wrapper">
    <a href="#" class="f_logo"><img src="<?php echo $this->config->item('base_url');?>assets/front/images/logo.png" alt="logo" title="Match Polly" style="width: 232px;" /> </a>
<div class="spacer"></div>
</section>
<!--wrapper end-->
<div class="spacer"></div>
</section>
<!--top section end-->
<!--wrapper estart-->
<section class="wrapper">
<section class="wrap_in">
<!--login start-->
<section class="f_logpan">
<h4 class="heading">ADMINISTRATOR <span> LOGIN </span> HERE...</h4>
<aside class="f_login">
<form method="post" name="loginFrm" id="loginFrm">
<div class="form-group">
<label>Your Username</label>
<input class="form-control" type="text" name="username" id="username" placeholder="Username"  onfocus="javascript:checkLoginNullValue()" >
</div>
<div class="form-group">
<label>Password</label>
<input class="form-control enter_press" type="password" name="password" id="password" placeholder="Password"  onfocus="javascript:checkLoginNullValue()" >
</div>
<div class="form-group">
<button id="logBtn" class="btn btn-default" type="button" onclick="userLogin();">LOGIN</button>
<a href="<?php echo $this->config->item('base_url');?>index.php/users/forgotPassword" class="forget"><i class="icon-question"></i> Forgot Password</a>
</div>
</form>
<span id="login_err_txt" class="common_error_txt" style="display:none; margin-top:0px">Incorrect Username and/or password. Please try again and make sure it is typed correctly.</span>
</aside>
</section>
<!--login end-->
<!--first pic start-->
<!--first pic end-->
<div class="spacer"></div>
</section>
<div class="spacer"></div>
</section>
<!--wrapper end-->
<div class="spacer"></div>
</section>
<!--first page ebnd-->

<!--footer start-->
<section class="f_footer">
<!--wrapper start-->
<section class="wrapper">
<!--left 1start-->
<!--<div class="col-md-5">
<h4 class="heading2">Help</h4>
<ul class="f_list">
<li><a href="#">Frequently Asked Questions</a></li>
<li><a href="#">Track Orders</a></li>
<li><a href="#">Cancellations</a></li>
</ul>

<div class="spacer"></div>
</div>-->
<!--left 1 end-->
<div class="spacer"></div>
</section>
<!--wrapper end-->
</section>
<!--footer end-->
<!--footer bottom start-->
<section class="f_footer_botom">
<section class="wrapper">
<p>© 2014 site. All rights reserved. </p>
</section>
<div class="spacer"></div>
</section>
<!--footer bottom end-->
</body>
<!-- ui js start -->
	<script src="<?php echo $this->config->item('base_url');?>assets/js/bootstrap.min.js"></script>
<!-- ui js end -->
<!--custom js start-->
		 <script src="<?php echo $this->config->item('base_url');?>assets/js/custom.js"></script>
<!--custom js end-->
<!--tooltip-->
	<script type="text/javascript" src="<?php echo $this->config->item('base_url');?>assets/tool_tip/jquery.tooltip.js"></script> 
<!--tooltip end--> 
</html>
