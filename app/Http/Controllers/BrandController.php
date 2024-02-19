<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function add_brand(){
        return view("admin.brand.add_brand");
    }

    public function save_brand(){
        $attributes = request()->validate([
            "name" => "required|min:5",
            "desc"=>"required|min:10",
            "status" =>"required"
        ]);

        Brand::create($attributes);
        return redirect("/add-brand")->with("message","Thêm sản phẩm thành công");
    }

    public function all_brands(){
        return view("admin.brand.all_brands",[
            "all_brands"=> Brand::all()
        ]);
    }

    public function edit_brand($brand_id){
        $edit_brand = Brand::find($brand_id);
        return view("admin.brand.edit_brand",[
            "edit_brand" => $edit_brand
        ]);
    }

    public function update_brand($brand_id){
        $attributes = request()->validate([
            "name" => "required|min:5",
            "desc"=>"required|min:10"
        ]);

        Brand::find($brand_id)->update($attributes);
        return redirect("/all-brand")->with("message","Cập nhật thương hiệu sản phẩm thành công");
    }

    public function delete_brand($brand_id){
        Brand::find($brand_id)->delete();
        return redirect("/all-brand")->with("message","Xóa thương hiệu sản phẩm thành công");
    }

    public function toggle_brand_status($brand_id){
        $current_brand = Brand::find($brand_id)->first();
        Brand::find($brand_id)->update(["status"=>!$current_brand->status]);
        return redirect("/all-brand")->with("message","Thay đổi trạng thái sản phẩm thành công");
    }

    public function show_brand_home($brand_id){
        $brand = Brand::find($brand_id);
        return view("pages.home",[
            "title" => $brand->name,
            "all_product" => $brand->products()->where("status",1)->paginate(9)
        ]);
    }
}
