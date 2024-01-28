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
    public function confirm_order(){
        request()->validate([
            "shipping_email" => "required",
            "shipping_name" => "required",
            "shipping_address" => "required",
            "shipping_phone" => "required",
            "shipping_fee"=>"required",
            "shipping_method"=>"required",
            "order_coupon" => "required",
        ]);
        $data=request()->all();
        if(!$data["shipping_notes"]){
            $data["shipping_notes"] = "";
        }
        $shipping = Shipping::where("user_id",auth()->user()->id)->first();
        if($shipping){
            $shipping->update([
                "name" => request("shipping_name"),
                "email" => request("shipping_email"),
                "address" => request("shipping_address"),
                "phone" => request("shipping_phone"),
                "method" => request("shipping_method"),
                "notes" =>$data["shipping_notes"]
            ]);
        } else{
            Shipping::create([
                "user_id" => auth()->user()->id,
                "name" => request("shipping_name"),
                "email" => request("shipping_email"),
                "address" => request("shipping_address"),
                "phone" => request("shipping_phone"),
                "method" => request("shipping_method"),
                "notes" =>$data["shipping_notes"]
            ]);
        }

        $checkout_code = substr(md5(microtime()),rand(0,26),5);
        $order = Order::create([
            "user_id" => auth()->user()->id,
            "shipping_id" => $shipping->id,
            "status" => "1",
            "code" => $checkout_code
        ]);

        if (session("cart")){
            foreach(session("cart") as $key => $cart){
                $order_detail = OrderDetails::create([
                    "code" => $checkout_code,
                    "product_id" => $cart["id"],
                    "product_quantity" => $cart["qty"],
                    "product_name" => $cart["name"],
                    "product_price" => $cart["price"],
                    "feeship" => $data["shipping_fee"],
                    "product_coupon" => $data["order_coupon"]
                ]);
            }
        }

    }
    public function checkout(){
        $cities = City::all();
        $shipping = Shipping::where("user_id",auth()->user()->id)->first();

        return view("pages.checkout.show_checkout",[
            "cities" =>$cities,
            "shipping" => $shipping
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
