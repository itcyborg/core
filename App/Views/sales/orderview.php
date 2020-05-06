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
    <title>Slim ERP- Orders</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php asset('bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="<?php asset('plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') ?>" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="<?php asset('css/animate.css') ?>" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="<?php asset('css/style.css') ?>" rel="stylesheet">
    <link href="<?php asset('App/css/app.css') ?>" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
    page. However, you can choose any other skin from folder css / colors .
    -->
    <link href="<?php asset('css/colors/megna.css') ?>" id="theme" rel="stylesheet">
    <link href="<?php asset('css/colors/megna-dark.css') ?>" id="theme" rel="stylesheet">

    <!--    <link href="--><?php //asset('plugins/bower_components/sweetalert2/sweetalert2.min.css') ?><!--" rel="stylesheet">-->
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
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->
            <ul class="nav navbar-top-links navbar-left">
                <!--                <li><a href="javascript:void(0)" class="open-close waves-effect waves-light"><i class="ti-menu"></i></a>-->
                <!--                </li>-->
            </ul>
        </div>

    </nav>
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
                        <span class="hide-menu">Orders
                            <span class="fa arrow"></span>
                            <!--                            <span class="label label-rouded label-purple pull-right">2</span>-->
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('sales/placeorder') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Place Order</span>
                            </a>
                        </li>
                        <!--                        <li>-->
                        <!--                            <a href="--><?php //url('crm/customers/') ?><!--"><i class="mdi mdi-account-multiple fa-fw"></i>-->
                        <!--                                <span class="hide-menu">List Customers</span>-->
                        <!--                            </a>-->
                        <!--                        </li>-->
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
                <!-- .page title -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">LIST OF ITEMS</h4></div>
            </div>
            <!-- .row -->
            <div class="row">
                <div class="white-box">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Order ID</th>
                                <th>Item Name</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            {foreach $data as $item}
                            <tr>
                                <td>{$item['id']}</td>
                                <td>{$item['orderId']}</td>
                                <td>{$item['order_Item']}</td>
                                <td>{$item['amount']}</td>
                                <td>{$item['status']}</td>
                                <td>
<!--                                    <a href="#" data-toggle="tooltip" data-original-title="Edit" onclick="Customer.edit({$item['id']})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>-->
                                    <a href="#" data-toggle="tooltip" data-original-title="Delete" onclick=" "> <i class="fa fa-trash-o text-warning m-r-10"></i> </a>
                                </td>
                            </tr>
                            {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2018 &copy; Slim ERP</footer>
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->

<!--MODALS-->
<div class="modal fade" tabindex="-1" id="editCustomer" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">Edit Customer</h4> </div>
            <div class="modal-body">
                <div class="form-material">
                    <div class="row-fluid form-body">
                        <input type="number" name="id" id="id" hidden>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="fname" id="fname" class="form-control" placeholder="First name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="mname" id="mname" class="form-control" placeholder="Middle Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary waves-effect pull-left" type="button" onclick="Customer.update()">Save</button>
                <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--END OF MODALS-->

<!-- jQuery -->
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7/dist/sweetalert2.all.min.js"></script>-->
<script src="<?php asset('plugins/bower_components/sweetalert2/sweetalert2.js') ?>"></script>
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
<script src="<?php asset('plugins/bower_components/peity/jquery.peity.min.js') ?>"></script>
<script src="<?php asset('plugins/bower_components/peity/jquery.peity.init.js') ?>"></script>
<script src="<?php asset('js/custom.js') ?>"></script>
<script src="<?php asset('App/js/app.js')?>"></script>
<script>
    let deleteEndpoint="<?php url('crm/customers/delete/')?>/";
    let editEndpoint="<?php url('crm/customer/update/')?>/";
    let customers={$data}
</script>
</body>
</html>