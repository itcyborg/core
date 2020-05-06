<?php

use Core\Requests\Request;

class AuthController{
    public function index()
    {
        
    }

    public function verify()
    {
        
    }

    public function reset()
    {
        $request=new Request();
        dd($request->email);
    }
}