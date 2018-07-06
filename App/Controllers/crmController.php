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

    public function index()
    {
        view('crm/index.php');
    }

    // add customer and contact
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

    public function addContact()
    {
        $request=new Request();
        try {
            $customerID = SanitizeRequest::text($request->customer);
            $tel = SanitizeRequest::text($request->tel);
            $alt_tel = SanitizeRequest::text($request->altTel);
            DB::add('contacts', [
                'custID',
                'phone',
                'alt_phone'
            ],
                [
                    $customerID,
                    $tel,
                    $alt_tel
                ]
            );
            view('crm/addCustomer.php',['status'=>200,'msg'=>'Successfully inserted record']);
        }catch (Exception $e){
            view('crm/addCustomer.php',['status'=>404,'msg'=>'An error occurred. '.$e->getMessage()]);
        }
    }

    //list customers
    public function listCustomers()
    {
        $data= DB::all('customer');
//        dd($data);
        view('crm/listCustomers.php',['data'=>$data,'f'=>'sdas']);
    }

    //form to edit a customer
    public function edit($id)
    {
        dd((int) $id);
    }

    //form to edit a contact
    public function editContact($id)
    {
        dd((int) $id);
    }
    
    //delete customer and related contact
    public function delete($id)
    {
        dd($id);
    }
    
    //update customer
    public function update()
    {
        
    }
    
    //update contact
    public function updateContact()
    {
        
    }
}