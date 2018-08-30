<?php
use Core\Auth\Auth;
use Core\Database\DB\DB;

class indexController
{
    public function __construct()
    {
        $auth=new Auth();
        Auth::user();
        $auth->isLoggedIn();
    }

    public function index()
    {
//        $password=new \Core\Auth\PasswordService;
        // dd($password->hash('as'));
//    	 Auth::validate
//         ('rael@erp.com','as');

//         dd(Auth::lastLogin());

    	// Auth::validate('');
         view('dashboard.php');
    }

    public function starter()
    {
        view('starter.php');
    }
}