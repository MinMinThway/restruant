<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index(){
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        $orders = Order::whereIn('status',[1,2])->get();

        return view('kitchen.order', compact('orders', 'status'));
    }

    function approve(Order $order){
        $order->status = config('res.order_status.processing');
        $order->save();
        return redirect()->route('order.index')->with('status','Order Approved');
    }

    function cancle(Order $order){
        $order->status = config('res.order_status.cancel');
        $order->save();
        return redirect()->route('order.index')->with('status','Order Cancled');
    }

    function ready(Order $order){
        $order->status = config('res.order_status.ready');
        $order->save();
        return redirect()->route('order.index')->with('status','Order Ready');
    }
}
