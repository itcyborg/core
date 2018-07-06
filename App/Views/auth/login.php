<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php asset('plugins/images/favicon.png'); ?>">
    <title>Slim ERP- Login</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php asset('bootstrap/dist/css/bootstrap.min.css"'); ?> rel=" stylesheet
    ">
    <!-- This is Sidebar menu CSS -->
    <link href="<?php asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') ?>" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="<?php asset('css/animate.css') ?>" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="<?php asset('css/style.css') ?>" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
    page. However, you can choose any other skin from folder css / colors .
    -->
    <link href="<?php asset('css/colors/megna.css') ?>" id="theme" rel="stylesheet">
    <link href="<?php asset('css/colors/megna-dark.css') ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
    <div class="lg-info-panel">
        <div class="inner-panel">
            <a href="javascript:void(0)" class="p-20 di"><img src="<?php asset('plugins/images/admin-logo.png') ?>"></a>
            <div class="lg-content">
                <h2>SLIM ERP</h2>
                <p class="text-muted">Do more... </p>
                <a href="#" class="btn btn-rounded btn-danger p-l-20 p-r-20"> Buy now</a>
            </div>
        </div>
    </div>
    <div class="new-login-box">
        <div class="white-box">
            <h3 class="box-title m-b-0">Sign In</h3>
            <small>Enter your details below</small>
            <form class="form-horizontal new-lg-form" id="loginform" action="<?php url('login'); ?>" method="post">
                <div class="form-group  m-t-20">
                    <div class="col-xs-12">
                        <label>Email Address</label>
                        <input name="email" class="form-control" type="text" required="" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <label>Password</label>
                        <input name="password" class="form-control" type="password" required="" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-info pull-left p-t-0">
                            <input name="remember" id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> Remember me </label>
                        </div>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="<?php url('register') ?>" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </form>
            <form class="form-horizontal" id="recoverform" action="<?php url('reset') ?>" method="post">
                <div class="form-group ">
                    <div class="col-xs-12">
                        <h3>Recover Password</h3>
                        <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" type="text" required placeholder="Email">
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="<?php asset('plugins/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php asset('bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Sidebar menu plugin JavaScript -->
<script src="<?php asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') ?>"></script>
<!--Slimscroll JavaScript For custom scroll-->
<script src="<?php asset('js/jquery.slimscroll.js') ?>"></script>
<!--Wave Effects -->
<script src="<?php asset('js/waves.js') ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php asset('js/custom.js') ?>"></script>
</body>
</html>