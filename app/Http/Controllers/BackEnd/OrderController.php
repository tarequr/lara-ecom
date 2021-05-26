<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use Session;


class OrderController extends Controller
{
    public function pendingList()
    {
    	$data['orders'] = Order::where('status','0')->get();
    	return view('backEnd.order.pending-list',$data);
    }

    public function approvedList()
    {
    	$data['orders'] = Order::where('status','1')->get();
    	return view('backEnd.order.approved-list',$data);
    }

    public function details($id)
    {
    	$data['orders'] = Order::find($id);
    	return view('backEnd.order.order-details',$data);
    }

    public function activeOrder($id)
    {
        $order = Order::find($id);
        $order->status = 1;
        $order->save();

        Session::flash('message','Order Approved Successfully!');
        return back();
    }
}
