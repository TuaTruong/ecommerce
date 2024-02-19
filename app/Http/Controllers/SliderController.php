<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function toggle_slide_status($slide_id){
        $slider = Slider::find($slide_id);
        $slider->update([
            "status" => !$slider->status
        ]);
        return redirect()->back()->with("message","Cập nhật trạng thái slider thành công");
    }

    public function update_slide($slide_id){
        $attributes = request()->validate([
            "name" => "required",
            "desc" => "required",
            "status" => "required"
        ]);

        $get_image = request()->file("image");
        if($get_image){
            $image_name = explode(".",$get_image->getClientOriginalName())[0];
            $new_image = $image_name . rand(10000,99999999999999) . ".". $get_image->getClientOriginalExtension();
            $get_image->move(public_path("uploads/sliders"), $new_image);
            $attributes["image"] = $new_image;
        }

        $slide = Slider::find($slide_id);
        $slide->update($attributes);
        return redirect()->back()->with("message","Cập nhật slider thành công");
    }

    public function edit_slide($slide_id){
        $slide = Slider::find($slide_id);
        return view("admin.slider.edit_slider",[
            "slide" => $slide
        ]);
    }

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
