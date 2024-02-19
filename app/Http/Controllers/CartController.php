<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{


    public function add_cart_ajax(){
        $data = request()->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = session("cart");
        $is_available = false;
        if ($cart){
            foreach($cart as $key => $val){
                if ( $val["id"] == $data["id"] ){
                    $is_available = true;
                }
            }
        }
        if(!$is_available){
            $cart[] = array(
                "session_id" =>$session_id,
                "name" => $data["name"],
                "id" => $data["id"],
                "image" => $data["image"],
                "qty" => $data["qty"],
                "storage_qty" => $data["storage_qty"],
                "price" => $data["price"]
            );
        }

        session()->put("cart",$cart);
    }
    public function gio_hang(){
        return view("pages.cart.cart_ajax");
    }

    public function delete_cart_product($session_id){
        $cart = session("cart");
        if($cart){
            foreach ($cart as $key => $val){
                if($val["session_id"]==$session_id){
                    unset($cart[$key]);
                }
            }
            session()->put("cart",$cart);
            return redirect()->back()->with("message","Xóa sản phẩm thành công")->withInput();
        }
        return redirect()->back()->with("message","Xóa sản phẩm thất bại")->withInput();
    }


    public function update_cart(){
        $data = request()->all();
        $cart = session("cart");
        $message = "";
        if($cart){
            foreach($data["cart_qty"] as $key => $qty ){
                foreach($cart as $index => $val){
                    if ($val["session_id"] == $key && $qty<$cart[$index]["storage_qty"]){
                        $cart[$index]["qty"] = $qty;
                        $message .= "<p>Cập nhật số lượng sản phẩm ". $cart[$index]["name"] ." thành công </p>";
                    } elseif($val["session_id"] == $key && $qty>$cart[$index]["storage_qty"]){
                        $message .= "<p>Cập nhật số lượng sản phẩm ". $cart[$index]["name"] ." thất bại </p>";
                    }
                }
            }
            session()->put("cart",$cart);
            return redirect()->back()->withInput()->with("message",$message);
        }
        return redirect()->back()->withInput()->with("message","Cập nhật số lượng thất bại");
    }

    public function delete_all_cart_product(){
        $cart = session("cart");
        if ($cart){
            session()->forget("cart");
            session()->forget("coupon");
            return redirect()->back()->with("message","Đã xóa toàn bộ sản phẩm trong giỏ hàng")->withInput();
        }
        return redirect()->back()->with("message","Xóa toàn bộ sản phẩm trong giỏ hàng thất bại")->withInput();
    }


}
