<?php

use Core\Requests\Request;
use Core\Requests\SanitizeRequest;
use Core\URL\URL;

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
        try {
            if (\Core\Auth\Auth::validate($email, $password)) {
                $url = URL::getURI('/');
                header("location:$url");
            } else {
                $url = URL::getURI('/');
                header("location$url");
            }
        }catch (\Core\Exceptions\ExceptionsHandler $e){
            $url = URL::getURI('/');
            header("location:$url");
        }
    }
}