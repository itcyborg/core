<?php
use Core\Auth\Auth;
use Core\Database\DB\DB;

class indexController
{
    public function __construct()
    {
//        $auth=new Auth();
//        $auth->isLoggedIn();
    }

    public function index()
    {
    	 Auth::validate
         ('erp@erp.com','as');
         dd(Auth::lastlogin());

    	// Auth::validate('');
        // view('dashboard.php');
    }

    public function starter()
    {
        view('starter.php');
    }
}