<?php

use Core\Auth\Auth;
use Core\Database\DB\DB;
use Core\Requests\Request;

class salesController{
   public function __construct()
   {
       $auth=new Auth();
       $auth->isLoggedIn();
   }

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
        $data=\Core\Database\DB\DB::all('ordertbl');
        view('sales/orderview.php',['data'=>$data]);
    }

    public function placeorder()
    {
      view('sales/placeorder.php');
    }

    public function genledger()
    {
        $data=\Core\Database\DB\DB::all('genledger');
        view('sales/genledger.php',['data'=>$data
        ]);
    }

    public function add()
    {
        $request=new Request();
        $itemid=$request->itemid;
        $itemname=$request->itemname;
        $cost=$request->cost;
        $status=$request->status;
        $arrivaldate=$request->arrivaldate;
        DB::add('sales',['item_id','item_name','cost','status','arrival_date'],[$itemid,$itemname,$cost,$status,$arrivaldate]);
    }

    public function addorder()
    {
        $request=new Request();
        $itemid=$request->itemid;
        $amount=$request->amount;
        $status=$request->status;
        $itemname=$request->itemname;
        DB::add('ordertbl',['orderId','amount','status','order_Item'],[$itemid,$amount,$status,$itemname]);

    }

    public function deletestock()
    {
       $request=new Request();
       $itemid=$request->itemid;
       DB::delete('sales','item_id',$itemid);
    }

}