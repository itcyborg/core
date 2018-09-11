<?php

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Requests\SanitizeRequest;

class crmController{
    public function __construct()
    {
        $auth=new Auth();
        $auth->isLoggedIn();
    }

    public function index()
    {
        view('crm/index.php');
    }

    // add customer and contact
    public function add()
    {
        $existing=DB::all('customer');
        view('crm/addCustomer.php',['customers'=>$existing]);
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
        $existing=DB::all('customer');
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

            view('crm/addCustomer.php',['status'=>200,'msg'=>'Successfully inserted record','customers'=>$existing]);
        }catch (ExceptionsHandler $e){
            view('crm/addCustomer.php',['status'=>404,'msg'=>'An error occurred. '.$e->getMessage(),'customers'=>$existing]);
        }
    }

    //list customers
    public function listCustomers()
    {
        $data= DB::all('customer');
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
        try{
            DB::delete('customer','id',$id);
            echo "Customer deleted successfully.";
        }catch (Exception $e){
            print_r($e);
            die();
        }
    }
    
    //update customer
    public function update()
    {
        $request=new Request();
        $email=SanitizeRequest::email($request->email);
        $fname=SanitizeRequest::text($request->first_name);
        $mname=SanitizeRequest::text($request->middle_name);
        $lname=SanitizeRequest::text($request->last_name);
        $id=SanitizeRequest::text($request->id);
    }
    
    //update contact
    public function updateContact()
    {
        
    }
}