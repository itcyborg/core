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
         view('dashboard.php');
    }

    public function starter()
    {
        view('starter.php');
    }
}