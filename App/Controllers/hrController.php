<?php

use Core\Auth\Auth;

class hrController{
    public function __construct()
    {
        $auth=new Auth;
        $auth->isLoggedIn();
    }

    public function index()
    {
        view('hr/index.php');
    }
}