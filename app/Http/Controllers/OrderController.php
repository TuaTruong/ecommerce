<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function manage_order(){
        $orders = Order::orderBy("created_at","DESC")->get();
        return view("admin.all_orders",[
            "orders" => $orders
        ]);
    }

    public function view_order($order_code){
        $order_details = OrderDetails::where("code",$order_code)->get();
        $order = Order::where("code",$order_code)->first();
        $user = $order->user;
        $shipping = $order->shipping;

        return view("admin.view_order",[
            "order_details" => $order_details,
            "order" => $order,
            "user" => $user,
            "shipping" => $shipping
        ]);
    }
}
