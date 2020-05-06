<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3>
                <span class="fa-fw open-close">
                    <i class="ti-close ti-menu"></i>
                </span>
                <span class="hide-menu">Navigation</span>
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
                        <a href="<?php url('hr/employee/add') ?>">
                            <i class="mdi mdi-account-multiple-plus fa-fw"></i>
                            <span class="hide-menu">Add Employee</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php url('hr/employee/view') ?>">
                            <i class="mdi mdi-account-multiple fa-fw"></i>
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
                        <a href="<?php url('hr/payroll') ?>">
                            <i class="mdi mdi-account-multiple-plus fa-fw"></i>
                            <span class="hide-menu">Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php url('hr/payroll/all') ?>">
                            <i class="mdi mdi-account-multiple-plus fa-fw"></i>
                            <span class="hide-menu">View</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php url('hr/payroll/process') ?>">
                            <i class="mdi mdi-account-multiple fa-fw"></i>
                            <span class="hide-menu">Process</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php url('hr/payroll/payslips') ?>">
                            <i class="mdi mdi-account-multiple fa-fw"></i>
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
                        <a href="<?php url('hr/recruitment') ?>">
                            <i class="mdi mdi-account-multiple-plus fa-fw"></i>
                            <span class="hide-menu">Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php url('hr/recruitment/all') ?>">
                            <i class="mdi mdi-account-multiple-plus fa-fw"></i>
                            <span class="hide-menu">View</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>