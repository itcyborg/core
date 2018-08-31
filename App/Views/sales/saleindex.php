<!DOCTYPE html>
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
    <title>Slim ERP- Sales</title>
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
<body class="fix-sidebar">
<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="wrapper">
    <!-- Top Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header">
            <!-- Toggle icon for mobile view -->
            <div class="top-left-part">
                <!-- Logo -->
                <a class="logo" href="<?php url('hello/1') ?>">
                    <!-- Logo icon image, you can use font-icon also --><b>
                        <!--This is dark logo icon-->
                        <img src="<?php asset('plugins/images/admin-logo.png') ?>" alt="home" class="dark-logo"/>
                        <!--This is light logo icon-->
                        <img src="<?php asset('plugins/images/admin-logo-dark.png') ?>" alt="home" class="light-logo" /-->
                    </b>
                    <!-- Logo text image you can use text also -->
                    <span class="hidden-xs">
                            <!--This is dark logo text-->
                        <img src="<?php asset('plugins/images/admin-text.png') ?>" alt="home" class="dark-logo"/>
                        <!--This is light logo text-->
                        <img src="<?php asset('plugins/images/admin-text-dark.png') ?>" alt="home" class="light-logo"/>
                    </span>
                </a>
            </div>
        </div>
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav slimscrollsidebar">
            <div class="sidebar-head">
                <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span>
                </h3>
            </div>
            <ul class="nav" id="side-menu" style="margin-top:1em;">
                <li>
                    <a href="<?php url('/'); ?>" class="waves-effect">
                        <i data-icon="Z" class="linea-icon linea-basic fa-fw"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i data-icon="/" lass="linea-icon linea-basic fa-fw"></i>
                        <span class="hide-menu">Sales Management
                            <span class="fa arrow"></span>
                            <span class="label label-rouded label-purple pull-right">2</span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('sales/stock')?>"></i>
                                <span class="hide-menu">Stock</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('sales/order')?>">
<!--                                <i class="fa-fw">S</i>-->
                                <span class="hide-menu"> Orders</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">

            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">Blank Starter page</h3>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="r-panel-body">
                    </div>
                </div>
            </div>
            <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
<!--        <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in</footer>-->
    </div>
    <!-- /#page-wrapper -->
</div>
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