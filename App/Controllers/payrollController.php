<?php

use Core\Auth\Auth;

class payrollController{
    public function __construct()
    {
        $auth=new Auth();
        $auth->isLoggedIn();
    }

    public function index()
    {
        
    }

    public function all()
    {
        
    }

    public function payslips()
    {
        view('hr/payslips.php');
    }
}