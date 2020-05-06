<?php

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Exceptions\ExceptionsHandler;
use Core\Requests\Request;

class payrollController{
    public function __construct()
    {
        $auth=new Auth();
        $auth->isLoggedIn();
    }

    public function index()
    {
        $employees=DB::all('employees');
        return view('hr/addPayroll.php',['employees'=>$employees]);
    }

    public function add()
    {
        $request=new Request();
        $employee=$request->employee;
        $amount=$request->amount;
        $deductions=$request->deductions;
        try{
            $id=DB::add(
                'payroll',
                ['employee_id','amount','deductions'],
                [$employee,$amount,$deductions]
            );
            return header('location:'.$_SERVER['HTTP_REFERER']);
        }catch (\Throwable $e){
            dd($e);
        }
    }

    public function all()
    {
        $paryoll=toObject(DB::all('payroll'));
        $employees=toObject(DB::all('employees'));
        $data=[];
        foreach ($paryoll as  $item) {
            foreach ($employees as $employee) {
                if($item->employee_id===$employee->id){
                    $data[]=[
                        'id'=>$item->id,
                        'employee_id'=>$employee->id,
                        'name'=>$employee->surname.' '.$employee->first_name.' '.$employee->last_name,
                        'idnumber'=>$employee->idno,
                        'amount'=>$item->amount,
                        'deductions'=>$item->deductions,
                        'created_at'=>$item->created_at,
                        'updated_at'=>$item->updated_at
                    ];
                }
            }
        }
        view('hr/viewPayroll.php',['payrolls'=>$data]);
    }

    public function payslips()
    {
        $payslips=[];
        $db_payslips=toObject(DB::all("payslips"));
        $employees=toObject(DB::all('employees'));
        foreach ($db_payslips as $db_payslip) {
            foreach ($employees as $employee){
                if($employee->id===$db_payslip->employee_id){
                    $payslips[]=[
                        'name'=>$employee->surname.' '.$employee->first_name.' '.$employee->last_name,
                        'idnumber'=>$employee->idno,
                        'jobTitle'=>$employee->jobTitle,
                        'amount'=>$db_payslip->amount,
                        'net'=>$db_payslip->net,
                        'tax'=>$db_payslip->tax,
                        'month'=>$db_payslip->month,
                        'year'=>$db_payslip->year,
                        'created_at'=>date('d F, Y',strtotime($db_payslip->created_at)),
                        'updated_at'=>date('d F, Y',strtotime($db_payslip->updated_at)),
                        'id'=>$db_payslip->id,
                        'deductions'=>$db_payslip->deductions
                    ];
                }
            }
        }
        view('hr/payslips.php',['payslips'=>$payslips]);
    }

    public function processIndex()
    {
        return view('hr/processPayroll.php');
    }

    public function processall()
    {
        $payrolls=toObject(DB::all('payroll'));
        $processed=DB::all('payslips');
        $year=date("Y");
        $month=date('F',strtotime("last day of previous month"));
        $tax=30/100;
        foreach ($payrolls as $payroll) {
            try {
                if (!DB::raw('SELECT * FROM payslips WHERE employee_id="' . $payroll->employee_id . '" AND year="' . $year . '" AND month="' . $month . '"')) {
                    $totaltax=(double) $tax*$payroll->amount;
                    $deductions=$payroll->deductions+$totaltax;
                    $net=$payroll->amount-$deductions;
                    dump(DB::add(
                        'payslips',
                        [
                            'employee_id',
                            'amount',
                            'tax',
                            'deductions',
                            'year',
                            'month',
                            'net'
                        ],
                        [
                            $payroll->employee_id,
                            $payroll->amount,
                            $totaltax,
                            $deductions,
                            $year,
                            $month,
                            $net
                        ]
                    ));
                }
            } catch (ExceptionsHandler $e) {
                dd($e);
            }
        }
    }
}