<?php

namespace App\Http\Controllers;

use App\Models\Dish;
use App\Models\Order;
use App\Models\Table;
use Illuminate\Http\Request;

class WaiterController extends Controller
{
    function index(){
        $dishes = Dish::all();
        $tables = Table::all();
        $orders = Order::where('status', 4)->get();
        $rawstatus = config('res.order_status');
        $status = array_flip($rawstatus);
        return view('order_form', compact('dishes', 'tables', 'orders', 'status'));
    }

    function ordersubmit(Request $request){
        $data = array_filter($request->except('_token', 'table'));
        $orderId = rand();
        foreach ($data as $key => $value) {
            if($value > 1){
                for ($i=0; $i < $value; $i++) { 
                    $this->saveOrder($orderId,$key,$request); 
                }
            }else{
                $this->saveOrder($orderId,$key,$request); 
            }
        }
        return redirect()->route('order.form')->with("status", "Order Submitted");
    }

    public function saveOrder($orderId,$dish_id,$request)
    {

        $order = new Order();
        $order->order_id = $orderId;
        $order->dish_id = $dish_id;
        $order->table_id = $request->table;
        $order->status = config('res.order_status.new');

        $order->save();
    }


    function serve(Order $order){
        $order->status = config('res.order_status.done');
        $order->save();
        return redirect()->route('order.form')->with('status','Done Ready');
    }
}
