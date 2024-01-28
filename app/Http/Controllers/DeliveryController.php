<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\FeeShip;
use App\Models\Province;
use App\Models\Shipping;
use App\Models\Ward;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function delivery(){
        $cities = City::orderBy("matp")->get();
        return view("admin.delivery.add_delivery",[
            "cities" => $cities
        ]);
    }

    public function select_delivery(){
        $data = request()->all();
        if ($data['action']){
            $output = "";
            if($data["action"] == "city"){
                $select_province = Province::where("matp",$data["ma_id"])->orderBy("maqh")->get();
                $output.="<option>---Chọn quận huyện---</option>";
                foreach($select_province as $key => $province){
                    $output.="<option value='".$province->maqh."'>".$province->name_quanhuyen."</option>";
                }
            } else{
                $select_ward = Ward::where("maqh",$data["ma_id"])->orderBy("xaid")->get();
                $output.="<option>---Chọn xã phường---</option>";
                foreach($select_ward as $key => $ward){
                    $output.="<option value='".$ward->xaid."'>".$ward->name_xaphuong."</option>";
                }
            }
            return $output;
        }
    }

    public function add_delivery(){
        $attributes = request()->validate([
            "matp"=>"required",
            "maqh"=>"required",
            "xaid"=>"required",
            "feeship"=>"required"
        ]);

        FeeShip::create($attributes);
    }

    public function select_feeship(){
        $feeship = FeeShip::orderBy("id","DESC")->get();
        $output = "<div class='table-responsive'>
            <table class='table table-bordered'>
                <thread>
                    <tr>
                        <th>Tên thành phố</th>
                        <th>Tên quận huyện</th>
                        <th>Tên xã phường</th>
                        <th>Phí ship</th>
                    </tr>
                </thread>
                <tbody>";

        foreach($feeship as $key => $fee){
            $output.="<tr>
                <td>".$fee->city->name_city."</td>
                <td>".$fee->province->name_quanhuyen."</td>
                <td>".$fee->ward->name_xaphuong."</td>
                <td contenteditable data-feeship_id='".$fee->id."' class='fee_edit'>".number_format($fee->feeship,0,',','.')."</td>
            </tr>";
        }
        $output.="</tbody></table></div>";
        echo $output;
    }

    public function update_delivery(){
        request()->validate([
            "id" => "required",
            "fee" => "required"
        ]);

        FeeShip::find(request("id"))->update([
            "feeship" => str_replace(".","",request("fee"))
        ]);
    }

    public function calculate_fee(){
        request()->validate([
            "matp" => "required",
            "maqh" => "required",
            "xaid" => "required"
        ]);
        $shipping = Shipping::where("user_id",auth()->user()->id)->first();
        if($shipping){
            $shipping->update([
                "name" => request("shipping_name"),
                "email" => request("shipping_email"),
                "address" => request("shipping_address"),
                "phone" => request("shipping_phone"),
                "method" => request("shipping_method")
            ]);
        } else{
            Shipping::create([
                "user_id" => auth()->user()->id,
                "name" => request("shipping_name"),
                "email" => request("shipping_email"),
                "address" => request("shipping_address"),
                "phone" => request("shipping_phone"),
                "method" => request("shipping_method")
            ]);
        }

        $feeship = FeeShip::where("matp",request("matp"))->where("maqh",request("maqh"))->where("xaid",request("xaid"))->get();
        $fee = 40000;
        if ($feeship->count()>0){
            $fee = $feeship[0]->feeship;
        }
        session()->put(["fee" => $fee]);
        return '<a class="feeship_delete" href="/delete-fee"><i class="fa fa-times"></i></a>Phí vận chuyển:'. number_format($fee, 0, ',', '.'). 'VND</li>';
    }

    public function delete_fee(){
        session()->forget("fee");
        return redirect()->back()->with("message","Xóa chi phí vận chuyển thành công");
    }
}
