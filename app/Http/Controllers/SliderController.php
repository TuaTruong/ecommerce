<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function all_sliders(){
        $slides = Slider::orderBy("id","DESC")->get();
        return view("admin.slider.all_sliders",[
            "slides" => $slides
        ]);
    }

    public function add_slider(){
        return view("admin.slider.add_slider");
    }

    public function save_slide(){
        $attributes = request()->validate([
            "name" =>"required",
            "desc" =>"required",
            "status" =>"required",
            "image" => "required|image"
        ]);

        $get_image = request()->file("image");

        if($get_image){
            $image_name = explode(".",$get_image->getClientOriginalName())[0];
            $new_image = $image_name . rand(10000,99999999999999) . ".". $get_image->getClientOriginalExtension();
            $get_image->move(public_path("uploads/sliders"), $new_image);
            $attributes["image"] = $new_image;
        }
        Slider::create($attributes);
        return redirect()->back()->with("message","Thêm slider thành công");
    }
}
