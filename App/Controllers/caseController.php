<?php

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;
use Core\Requests\SanitizeRequest;

class caseController{
    private $auth;
    public function __construct()
    {
        $this->auth=new Auth();
//        $this->auth->isLoggedIn();
    }

    public function index()
    {
        //use this to display stats in the dashboard
        view('cases/index.php');
    }

    public function new()
    {
        //create new issue view
        view('cases/add.php');
    }

    public function edit($id)
    {
        //view to edit issue
        try {
            $request=new Request();
            $id = SanitizeRequest::text($id);
            $issue=SanitizeRequest::text($request->issue);
            $status=SanitizeRequest::text(0);
            if($case=DB::find('cases',$id)){

            }else{
                dd('No records found');
            }
            view('cases/edit.php');
        } catch (ExceptionsHandler $e) {
        }
    }

    public function reports()
    {
        //view reports
        dd(DB::all('cases'));
        view('cases/reports.php');
    }

    public function delete()
    {
        //delete record
        $request=new Request();
        $id=$request->caseID;
        dd(DB::delete('cases','id',$id));
    }

    public function add()
    {
        //save a case
        $request=new Request();
        try {
            $customerID = SanitizeRequest::text($request->customerID);
            $issue = SanitizeRequest::text($request->issue);
            $status = SanitizeRequest::text(0);
            DB::add(
                'cases',
                [
                    'customerId',
                    'issue',
                    'status'
                ],
                [
                    $customerID,
                    $issue,
                    $status
                ]
            );
        }catch (\Throwable $e){
            dd($e->getMessage());
        }
    }

    public function update()
    {
        //publish updated record
        try {
            $request=new Request();
            $id = SanitizeRequest::text($request->id);
            $issue=SanitizeRequest::text($request->issue);
            $status=SanitizeRequest::text(0);
            if($case=DB::find('cases',$id)){

            }else{
                dd('No records found');
            }
            view('cases/edit.php');
        } catch (ExceptionsHandler $e) {
        }
    }

    public function solve()
    {
        try {
            $request = new Request();
            $caseID = SanitizeRequest::text($request->issueId);
            $status=SanitizeRequest::text($request->status);
            DB::update(
              'cases',
              [
                  'status',
                  'solved_by'
              ],
              [
                  $status,
                  $this->auth->id()
              ],
                  'id',
                  $caseID
            );
            return true;
        }catch (ExceptionsHandler $e){
            dd($e->getMessage());
        }
    }
}