<?php
use Core\Auth\Auth;
use Core\Database\DB\DB;

class indexController
{
    public function index()
    {
    	 Auth::validate
         ('user@erp.com','as');
         dd(Auth::lastlogin());

    	// Auth::validate('');
        // view('dashboard.php');
    }

    public function starter()
    {
        view('starter.php');
    }
}