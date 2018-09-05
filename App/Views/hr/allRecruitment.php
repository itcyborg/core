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
    <title>Slim ERP- HR Dashboard</title>
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
                    <a href="<?php url('hr'); ?>" class="waves-effect">
                        <i class="ti-dashboard fa-fw"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">Employees
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('crm/customer/add') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Add Employee</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('crm/customers/') ?>"><i class="mdi mdi-account-multiple fa-fw"></i>
                                <span class="hide-menu">List Employees</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">Payroll
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('hr/payroll') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Add</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/all') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">View</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/all') ?>"><i class="mdi mdi-account-multiple fa-fw"></i>
                                <span class="hide-menu">Process</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/payslips') ?>"><i class="mdi mdi-account-multiple fa-fw"></i>
                                <span class="hide-menu">Payslips</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">Recruitment
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('hr/recruitment') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Add</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/recruitment/all') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">View</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
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
                    <a href="<?php url('hr'); ?>" class="waves-effect">
                        <i class="ti-dashboard fa-fw"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">Employees
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('crm/customer/add') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Add Employee</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('crm/customers/') ?>"><i class="mdi mdi-account-multiple fa-fw"></i>
                                <span class="hide-menu">List Employees</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">Payroll
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('hr/payroll') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Add</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/all') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">View</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/all') ?>"><i class="mdi mdi-account-multiple fa-fw"></i>
                                <span class="hide-menu">Process</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/payslips') ?>"><i class="mdi mdi-account-multiple fa-fw"></i>
                                <span class="hide-menu">Payslips</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="waves-effect">
                        <i class="fa fa-users  fa-fw"></i>
                        <span class="hide-menu">Recruitment
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="<?php url('hr/payroll') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">Add</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php url('hr/payroll/all') ?>"><i class="mdi mdi-account-multiple-plus fa-fw"></i>
                                <span class="hide-menu">View</span>
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
                <!-- .page title -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Starter Page</h4>
                </div>
                <!-- /.page title -->
                <!-- .breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <button class="right-side-toggle waves-effect waves-light btn-info btn-circle pull-right m-l-20">
                        <i class="ti-settings text-white"></i>
                    </button>
                    <a href="javascript: void(0);" target="_blank" class="btn btn-danger pull-right m-l-20 hidden-xs hidden-sm waves-effect waves-light">Buy Admin Now</a>
                    <ol class="breadcrumb">
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Starter Page</li>
                    </ol>
                </div>
                <!-- /.breadcrumb -->
            </div>
            <!-- .row -->
            <div class="row">
                <div class="col-md-3">
                    <div class="white-box">
                        <h3 class="box-title">NEW CUSTOMERS</h3>
                        <ul class="list-inline two-part">
                            <li><i class="icon-people text-info"></i></li>
                            <li class="text-right"><span class="counter">23</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="white-box">
                        <h3 class="box-title">NEW MESSAGES</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fa fa-comments text-inverse"></i></li>
                            <li class="text-right"><span class="counter">23</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="white-box">
                        <h3 class="box-title">FEEDBACK</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fa fa-bullhorn text-blue"></i></li>
                            <li class="text-right"><span class="counter">23</span></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="white-box">
                        <h3 class="box-title">NEW ISSUES</h3>
                        <ul class="list-inline two-part">
                            <li><i class="fa fa-tags text-danger"></i></li>
                            <li class="text-right"><span class="counter">23</span></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="white-box">
                        <h3 class="box-title">Recent Customers</h3>
                        <div class="row sales-report">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h2>March 2018</h2>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 ">
                                <h1 class="text-right text-info m-t-20"><i class="fa fa-users"></i> 345</h1> </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
                                    <th>DATE</th>
                                    <th>PRICE</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td class="txt-oflo">Elite admin</td>
                                    <td><span class="label label-success label-rouded">SALE</span> </td>
                                    <td class="txt-oflo">April 18, 2017</td>
                                    <td><span class="text-success">$24</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td class="txt-oflo">Real Homes WP Theme</td>
                                    <td><span class="label label-info label-rouded">EXTENDED</span></td>
                                    <td class="txt-oflo">April 19, 2017</td>
                                    <td><span class="text-info">$1250</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td class="txt-oflo">Ample Admin</td>
                                    <td><span class="label label-info label-rouded">EXTENDED</span></td>
                                    <td class="txt-oflo">April 19, 2017</td>
                                    <td><span class="text-info">$1250</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td class="txt-oflo">Medical Pro WP Theme</td>
                                    <td><span class="label label-danger label-rouded">TAX</span></td>
                                    <td class="txt-oflo">April 20, 2017</td>
                                    <td><span class="text-danger">-$24</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td class="txt-oflo">Hosting press html</td>
                                    <td><span class="label label-warning label-rouded">SALE</span></td>
                                    <td class="txt-oflo">April 21, 2017</td>
                                    <td><span class="text-success">$24</span></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td class="txt-oflo">Digital Agency PSD</td>
                                    <td><span class="label label-success label-rouded">SALE</span> </td>
                                    <td class="txt-oflo">April 23, 2017</td>
                                    <td><span class="text-danger">-$14</span></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td class="txt-oflo">Helping Hands WP Theme</td>
                                    <td><span class="label label-warning label-rouded">member</span></td>
                                    <td class="txt-oflo">April 22, 2017</td>
                                    <td><span class="text-success">$64</span></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title">Recent Comments</h3>
                        <div class="comment-center p-t-10">
                            <div class="comment-body">
                                <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                                <div class="mail-contnet">
                                    <h5>Pavan kumar</h5>
                                    <span class="time">10:20 AM   20  may 2016</span>
                                    <span class="label label-rouded label-info">PENDING</span>
                                    <br>
                                    <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span>
                                    <a href="javacript:void(0)" class="btn btn btn-rounded btn-default btn-outline m-r-5">
                                        <i class="ti-check text-success m-r-5"></i>Approve</a>
                                    <a href="javacript:void(0)" class="btn-rounded btn btn-default btn-outline"><i class="ti-close text-danger m-r-5"></i> Reject</a>
                                </div>
                            </div>
                            <div class="comment-body">
                                <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>Sonu Nigam</h5><span class="time">10:20 AM   20  may 2016</span> <span class="label label-rouded label-success">APPROVED</span>
                                    <br><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                            </div>
                            <div class="comment-body b-none">
                                <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>
                                <div class="mail-contnet">
                                    <h5>Arijit singh</h5><span class="time">10:20 AM   20  may 2016</span> <span class="label label-rouded label-danger">REJECTED</span>
                                    <br><span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. Aenean commodo dui pellentesque molestie feugiat</span> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .row -->
            <!-- .right-sidebar -->
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title"> Service Panel
                        <span>
                            <i class="ti-close right-side-toggle"></i>
                        </span>
                    </div>
                    <div class="r-panel-body">
                        <ul class="m-t-20 chatonline">
                            <li><b>Chat option</b></li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/varun.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Varun Dhavan <small class="text-success">online</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/genu.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Genelia Deshmukh <small class="text-warning">Away</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/ritesh.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Ritesh Deshmukh <small class="text-danger">Busy</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/arijit.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Arijit Sinh <small class="text-muted">Offline</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/govinda.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Govinda Star <small class="text-success">online</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/hritik.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>John Abraham<small class="text-success">online</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/john.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Hritik Roshan<small class="text-success">online</small></span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <img src="<?php asset('plugins/images/users/pawandeep.jpg') ?>" alt="user-img" class="img-circle">
                                    <span>Pwandeep rajan <small class="text-success">online</small></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.right-sidebar -->
        </div>
        <!-- /.container-fluid -->
        <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by themedesigner.in</footer>
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