<?php

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Requests\SanitizeRequest;

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

    public function employeeForm()
    {
        view('hr/addEmployees.php');
    }

    /**
     *
     * @throws ExceptionsHandler
     */
    public function addEmployee()
    {
        $request=new Request;
        try {
            $id = DB::add(
                'employees',
                [
                    'first_name',
                    'last_name',
                    'surname',
                    'dateOfBirth',
                    'idno',
                    'jobTitle'
                ],
                [
                    SanitizeRequest::text($request->fname),
                    SanitizeRequest::text($request->lname),
                    SanitizeRequest::text($request->sirname),
                    SanitizeRequest::text($request->dob),
                    SanitizeRequest::text($request->id),
                    SanitizeRequest::text($request->title),
                ]
            );
            $status=DB::add(
              'employees_contacts',
              [
                  'employeeid',
                  'address',
                  'address_alt',
                  'email',
                  'contact',
                  'contact_alt'
              ],
              [
                  $id,
                  SanitizeRequest::text($request->address),
                  SanitizeRequest::text($request->alt_address),
                  SanitizeRequest::text($request->email),
                  SanitizeRequest::text($request->contact),
                  SanitizeRequest::text($request->alt_contact),
              ]
            );
            $user=new \Core\Auth\User();
            $username=$request->sirname.$request->lastname;
            $password=str_random(10);
            //Create User
            try {
                if ($db = $user->create($request->email, $password, $username)) {
                    return view('hr/addEmployees.php');
                }
            }catch (\Throwable $e){
                return view('hr/addEmployees.php');
            }
        }catch (ExceptionsHandler $e){
            dd($e);
        }
    }

    public function listEmployees()
    {
        try {
            $employees = DB::all('employees');
            view('hr/viewEmployees.php',['employees'=>$employees]);
        }catch (\Throwable $e){
            dd($e);
        }
    }
}