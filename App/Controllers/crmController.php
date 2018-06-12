<?php

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Requests\Request;
use Core\Requests\SanitizeRequest;

class crmController{
    public function __construct()
    {
        $auth=new Auth();
//        $auth->isLoggedIn();
    }

    public function add()
    {
        view('crm/addCustomer.php');
    }

    public function store()
    {
        $request=new Request();
        try {
            $first_Name = SanitizeRequest::text($request->fname);
            $middle_Name = SanitizeRequest::text($request->mname);
            $last_Name = SanitizeRequest::text($request->lname);
            $email = SanitizeRequest::email($request->email);
            DB::add('customer', [
                'first_name',
                'last_name',
                'middle_name',
                'email'
            ],
                [
                    $first_Name,
                    $last_Name,
                    $middle_Name,
                    $email
                ]
            );
            view('crm/addCustomer.php',['status'=>200,'msg'=>'Successfully inserted record']);
        }catch (Exception $e){
            view('crm/addCustomer.php',['status'=>404,'msg'=>'An error occurred. '.$e->getMessage()]);
        }
    }
}