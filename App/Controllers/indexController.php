<?php

use Core\Auth\Auth;

class indexController
{
    public function __construct()
    {
//        $auth=new Auth();
//        $auth->isLoggedIn();
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