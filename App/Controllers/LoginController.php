<?php

use Core\Requests\Request;
use Core\Requests\SanitizeRequest;

class LoginController{
    public function index()
    {
        view('auth/login.php');
    }

    public function login()
    {
        $request=new Request();
        $email=SanitizeRequest::email($request->email);
        $password=SanitizeRequest::text($request->password);
        $remember=$request->remember;
    }
}