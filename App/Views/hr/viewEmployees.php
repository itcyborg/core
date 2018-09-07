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
            <!-- /Logo -->
            <!-- Search input and Toggle icon -->
            <ul class="nav navbar-top-links navbar-left">
                <li>
                    <a href="javascript:void(0)" class="open-close waves-effect waves-light">
                        <i class="ti-menu"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                        <i class="mdi mdi-gmail"></i>
                        <div class="notify">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu mailbox animated bounceInDown">
                        <li>
                            <div class="drop-title">You have 4 new messages</div>
                        </li>
                        <li>
                            <div class="message-center">
                                <a href="#">
                                    <div class="user-img">
                                        <img src="<?php asset('plugins/images/users/pawandeep.jpg') ?>" alt="user" class="img-circle">
                                        <span class="profile-status online pull-right"></span>
                                    </div>
                                    <div class="mail-contnet">
                                        <h5>Pavan kumar</h5>
                                        <span class="mail-desc">Just see the my admin!</span>
                                        <span class="time">9:30 AM</span>
                                    </div>
                                </a>
                            </div>
                        </li>
                        <li>
                            <a class="text-center" href="javascript:void(0);">
                                <strong>See all notifications</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- .Task dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                        <i class="mdi mdi-check-circle"></i>
                        <div class="notify">
                            <span class="heartbit"></span>
                            <span class="point"></span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks animated slideInUp">
                        <li>
                            <a href="javascript:void(0)">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"><span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- .Megamenu -->
                <li class="mega-dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                        <span class="hidden-xs">Mega</span>
                        <i class="icon-options-vertical"></i>
                    </a>
                    <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Header Title</li>
                                <li>
                                    <a href="javascript:void(0)">Link of page</a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Header Title</li>
                                <li>
                                    <a href="javascript:void(0)">Link of page</a>
                                </li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Header Title</li>
                                <li><a href="javascript:void(0)">Link of page</a></li>
                            </ul>
                        </li>
                        <li class="col-sm-3">
                            <ul>
                                <li class="dropdown-header">Header Title</li>
                                <li><a href="javascript:void(0)">Link of page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- /.Megamenu -->
            </ul>
            <!-- This is the message dropdown -->
            <ul class="nav navbar-top-links navbar-right pull-right">
                <!-- /.Task dropdown -->
                <!-- /.dropdown -->
                <li>
                    <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href="">
                            <i class="fa fa-search"></i>
                        </a>
                    </form>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#">
                        <img src="<?php asset('plugins/images/users/varun.jpg') ?>" alt="user-img" width="36" class="img-circle">
                        <b class="hidden-xs">Steave</b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated flipInY">
                        <li>
                            <div class="dw-user-box">
                                <div class="u-img"><img src="<?php asset('plugins/images/users/varun.jpg') ?>" alt="user"/></div>
                                <div class="u-text"><h4>Steave Jobs</h4>
                                    <p class="text-muted">varun@gmail.com</p>
                                    <a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
                                </div>
                            </div>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-user"></i> My Profile</a></li>
                        <li><a href="#"><i class="ti-wallet"></i> My Balance</a></li>
                        <li><a href="#"><i class="ti-email"></i> Inbox</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- End Top Navigation -->
    <!-- Left navbar-header -->
    <?php view('hr/sidebar.php') ?>
    <!-- Left navbar-header end -->
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <!-- .page title -->
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">EMPLOYEES</h4>
                </div>
            </div>
            <div class="row">
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
                <div class="col-md-12">
                    <div class="white-box">
                        <h3 class="box-title">EMPLOYEES</h3>
                        <div class="row p-30">
                            <div class="table">
                                <table class="table table-striped table-hover table-condensed">
                                    <thead>
                                        <th>#</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>ID NUMBER</th>
                                        <th>JOB TITLE</th>
                                        <th>DATE OF BIRTH</th>
                                        <th>CREATED ON</th>
                                        <th>ACTIONS</th>
                                    </thead>
                                    <tbody>
                                        {foreach $employees as $employee}
                                        <tr>
                                            <td>{$employee['id']}</td>
                                            <td>{$employee['surname']}, {$employee['first_name']} {$employee['last_name']}</td>
                                            <td>{$employee['email']}</td>
                                            <td>{$employee['idno']}</td>
                                            <td>{$employee['jobTitle']}</td>
                                            <td>{$employee['dateOfBirth']}</td>
                                            <td>{$employee['created_at']}</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-original-title="Edit" onclick="Customer.edit({$item['id']})"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                <a href="#" data-toggle="tooltip" data-original-title="Delete" onclick="Customer.delete({$item['id']})"> <i class="fa fa-trash-o text-warning m-r-10"></i> </a>
                                            </td>
                                        </tr>
                                        {/foreach}
                                    </tbody>
                                </table>
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