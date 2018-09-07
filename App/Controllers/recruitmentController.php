<?php

use Core\Auth\Auth;

class recruitmentController{
    public function __construct()
    {
        $auth=new Auth;
        $auth->isLoggedIn();
    }

    public function index()
    {
        view('hr/addRecruitment.php');
    }

    public function all()
    {
        view('hr/allRecruitment.php');
    }
}