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
    <title>Slim ERP-Add stock</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php asset('bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
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
                        <!--This is dark logo icon--><img src="<?php asset('plugins/images/admin-logo.png') ?>"
                                                          alt="home" class="dark-logo"/>
                        <!--This is light logo icon--><img src="<?php asset('plugins/images/admin-logo-dark.png') ?>"
                                                           alt="home" class="light-logo" /-->
                    </b>
                    <!-- Logo text image you can use text also --><span class="hidden-xs">
                            <!--This is dark logo text--><img src="<?php asset('plugins/images/admin-text.png') ?>"
                                                              alt="home" class="dark-logo"/>
                        <!--This is light logo text--><img src="<?php asset('plugins/images/admin-text-dark.png') ?>"
                                                           alt="home" class="light-logo"/>
                        </span> </a>
            </div>
        </div>
    </nav>
    <!-- End Top Navigation -->
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
                        <i class="linea-icon linea-basic fa-fw"></i>
                        <span class="hide-menu">Home</span>
                    </a>
                </li>
                <li>
                    <a href="<?php url('sales'); ?>" class="waves-effect">
                        <i class="ti-dashboard fa-fw"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">ADD ITEM
<!--                            <span class="fa arrow"></span>-->
<!--                            <span class="label label-rouded label-purple pull-right">2</span>-->
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <!-- .page title -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Add Item</h4></div>
                <!-- /.page title -->
                <!-- .breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <!--                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20">-->
                    <!--                        <i class="ti-settings text-white"></i>-->
                    <!--                    </button>-->
                    <ol class="breadcrumb">
                        <li><a href="<?php url('sales')?>"> </a></li>
                        <li><a href="<?php url('sales')?>"> </a></li>
                        <li class="active"> </li>
                    </ol>
                </div>
                <!-- /.breadcrumb -->
            </div>
            <!-- .row -->
            <div class="row">
                <div n:if="$status">
                    {if $status == 404}
                    <div class="alert alert-danger">{$msg}</div>
                    {/if}
                    {if $status == 200}
                    <div class="alert alert-success">{$msg|capitalize}</div>
                    {/if}
                </div>
                <div class="col-md-6">
                    <div class="white-box p-l-20 p-r-20">
                        <h3 class="box-title">Add Item</h3>
                        <div class="p-30">
                            <form action="<?php url('sales/stock/add')?>" method="post" class="form-horizontal form-material floating-labels">
                                <div class="form-body">
                                    <div class="form-group m-b-40">
                                        <input type="number" name="itemid" id="itemid" class="form-control" required>
                                        <span class="highlight"></span>
                                        <label for="itemid">Item ID</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" name="itemname" id="itemname" class="form-control" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label for="itemname">Item Name</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="number" name="cost" id="cost" class="form-control" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label for="cost">Cost</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="text" name="status" id="status" class="form-control" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label for="status">Status</label>
                                    </div>
                                    <div class="form-group m-b-40">
                                        <input type="date" name="arrivaldate" id="arrivaldate" class="form-control" required>
                                        <span class="highlight"></span>
                                        <span class="bar"></span>
                                        <label for="arrivaldate"> </label>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <div class="row">
                                        <button class="btn btn-primary btn-rounded col-lg-12 col-sm-12 col-xs-12">Add Item</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<!--                -->
            </div>
            <!-- .row -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">

            </div>
            <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2018 &copy; slim erp</footer>
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

<script src="<?php asset('js/jasny-bootstrap.js')?>"></script>
</body>
</html>