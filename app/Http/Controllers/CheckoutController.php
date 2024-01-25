<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Province;
use App\Models\Shipping;
use Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(){
        $cities = City::all();
        return view("pages.checkout.show_checkout",[
            "cities" =>$cities
        ]);
    }

    public function save_checkout(){
        $attributes = request()->validate([
            "email"=>"required",
            "name"=>"required",
            "address"=>"required",
            "phone"=>"required"
        ]);
        $attributes["note"] = request("note");
        $shipping = Shipping::create($attributes);
        session(["shipping_id"=>$shipping->id]);
        return redirect("/payment");
    }

    public function payment(){
        return view("pages.checkout.payment");
    }

    public function order_place(){
        $attributesPayment = request()->validate([
            "method"=>"required",
        ]);
        $attributesPayment["status"] = request("status") ?? "đang xử lý";
        $payment = Payment::create($attributesPayment);

        // dd(Cart::total());
        $order = Order::create([
            "user_id" => auth()->user()->id,
            "shipping_id" => session("shipping_id"),
            "payment_id" => $payment->id,
            "total" => Cart::total(),
            "status" => "đang chờ xử lý",
        ]);

        foreach (Cart::content() as $cart_content){
            OrderDetails::create([
                "order_id" => $order->id,
                "product_id" => $cart_content->id,
                "product_name" => $cart_content->name,
                "product_price" => $cart_content->price,
                "product_quantity" => $cart_content->qty
            ]);
        }

        Cart::destroy();
        if ($payment->method == "1"){
            return "Thanh toán bằng thẻ ATM";
        } elseif($payment->method == "2"){
            return view("pages.checkout.handcash");
        } else{
            return "Thanh toán bằng thẻ ghi nợ";
        }
    }

    public function manage_order(){
        $all_orders = Order::latest()->get();
        return view("admin.all_orders",[
            "all_orders" => $all_orders
        ]);
    }

    public function view_order($order_id){

        $current_order = Order::find($order_id);
        return view("admin.view_order",[
            "current_order" => $current_order
        ]);
    }
}
