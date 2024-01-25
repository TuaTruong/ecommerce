<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function delete_current_coupon(){
        if(session("coupon")){
            session()->forget("coupon");
            return redirect()->back()->with("message","Xóa mã giảm giá thành công");
        }
        return redirect()->back()->with("message","Bạn chưa áp mã");
    }
    public function check_coupon(){
        // dd(request()->all());
        request()->validate([
            "code" => "required"
        ]);
        $coupon = Coupon::where("code",request("code"))->first();
        if ($coupon){
            $cou[] = array(
                "code" => $coupon->code,
                "condition" => $coupon->condition,
                "discount" => $coupon->discount
            );
            session()->forget("coupon");
            session()->put("coupon",$cou);
            return redirect()->back()->with("message","Thêm mã giảm giá thành công");
        }
        return redirect()->back()->with("message","Mã giảm giá không đúng");
    }

    public function add_coupon(){
        return view("admin.add_coupon");
    }

    public function save_coupon(){
        $attributes = request()->validate([
            "name"=>"required",
            "code"=>"required",
            "quantity"=>"required",
            "discount"=>"required",
            "condition" => "required"
        ]);

        Coupon::create($attributes);
        return redirect()->back()->with("message","Thêm mã giảm giá thành công");
    }

    public function all_coupons(){
        $all_coupons = Coupon::latest()->get();
        return view("admin.all_coupons",[
            "all_coupons" => $all_coupons
        ]);
    }

    public function delete_coupon($coupon_id){
        Coupon::find($coupon_id)->delete();
        return redirect()->back()->with("message","Xóa mã giảm giá thành công");
    }
}
