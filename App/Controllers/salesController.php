<?php 
class salesController{
    public function index()
    {
        view('sales/saleindex.php');
    }

    public function stock()
    {
        $data=\Core\Database\DB\DB::all('sales');
        view('sales/stock.php',['data'=>$data]);
    }

    public function addstock()
    {
        view('sales/addstock.php');
    }

    public function order()
    {
        view('sales/orderview.php');
    }

}