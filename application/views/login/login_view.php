<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2016 04:07:27 GMT -->
<head>
  <meta charset="utf-8" />
  <title>Sochic | Login Page</title>
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
  <meta content="" name="description" />
  <meta content="" name="author" />
  
  <!-- ================== BEGIN BASE CSS STYLE ================== -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="<?php echo base_url('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/animate.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/style.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/style-responsive.min.css'); ?>" rel="stylesheet" />
  <link href="<?php echo base_url('assets/css/theme/default.css'); ?>" rel="stylesheet" id="theme" />
  <style type="text/css">
  .right-content{
    background: #eee;
    /*min-height: 500px;*/
    height: 650px;
  }
    .form-control {
      border-radius: 0;
    }

    p {
      color: #ff3333;
    }
    .alert-danger{
      /*color: #ffffff;*/
    }

    .btn {
      border-radius: 0;
    }
    body{
      /*background-color: #feb3b8;*/
      background-color: #ffffff;
    }
    .login.login-with-news-feed .news-caption, .register.register-with-news-feed .news-caption {
      /*background: rgba(229,141,132,.5);*/
      background: #fff;
    }
  </style>
  <!-- ================== END BASE CSS STYLE ================== -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?php echo base_url('assets/plugins/pace/pace.min.js'); ?>"></script>
  <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top ">
  <!-- begin #page-loader -->
  <div id="page-loader" class="fade in"><span class="spinner"></span></div>
  <!-- end #page-loader -->
  
  <!-- begin #page-container -->
  <div id="page-container" class="">
      <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img style="padding-bottom: 5%" src="<?php echo base_url('assets/img/sochic/engtech.jpg'); ?>" data-id="login-cover-image" alt="" />
                </div>
                <div class="news-caption">
                    <!-- <h4 class="caption-title"><i class="fa fa-diamond text-success"></i> Announcing the Color Admin app</h4> -->
                    <p>
                        <!-- Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit. -->
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->  
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <h2 class="lead text-center">Online Point of Sales System</h2>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                   <?php echo validation_errors('<div class="alert alert-warning">', '</div>'); ?>
                    <form action="<?php echo base_url('verifylogin'); ?>" method="POST" class="margin-bottom-0">
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control input-sm" autocomplete="off" placeholder="username" name="username" value="<?php echo set_value('username'); ?>" autofocus="" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control input-sm" autocomplete="off" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>" />
                        </div>

                        <div class="login-buttons">
                            <button type="submit" class="btn btn-info btn-block btn-lg">Sign me in</button>
                        </div>
                        <!-- <div class="m-t-20 m-b-40 p-b-40">
                            Not a member yet? Click <a href="register_v3.html" class="text-success">here</a> to register.
                        </div> -->
                        <hr />
                        <p class="text-center text-inverse">
                            &copy; Sochic Salon All Right Reserved <?php echo date('Y'); ?>
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
  </div>
  <!-- end page container -->
  
  <!-- ================== BEGIN BASE JS ================== -->
  <script src="<?php echo base_url('assets/plugins/jquery/jquery-1.9.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jquery/jquery-migrate-1.1.0.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js'); ?>"></script>
  <!--[if lt IE 9]>
    <script src="assets/crossbrowserjs/html5shiv.js"></script>
    <script src="assets/crossbrowserjs/respond.min.js"></script>
    <script src="assets/crossbrowserjs/excanvas.min.js"></script>
  <![endif]-->
  <script src="<?php echo base_url('assets/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/plugins/jquery-cookie/jquery.cookie.js'); ?>"></script>
  <!-- ================== END BASE JS ================== -->
  
  <!-- ================== BEGIN PAGE LEVEL JS ================== -->
  <script src="<?php echo base_url('assets/js/apps.min.js'); ?>"></script>
  <!-- ================== END PAGE LEVEL JS ================== -->

  <script>
    $(document).ready(function() {
      App.init();
    });
  </script>
 <!--  <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../../www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-53034621-1', 'auto');
      ga('send', 'pageview');
    </script> -->
</body>

<!-- Mirrored from seantheme.com/color-admin-v1.9/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 15 Apr 2016 04:07:27 GMT -->
</html>

