<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function add_product(){
        $all_categories = Category::all();
        $all_brands = Brand::all();

        return view("admin.product.add_product",[
            "all_categories" => $all_categories,
            "all_brands" => $all_brands
        ]);
    }

    public function save_product(){
        $attributes = request()->validate([
            "category_id" => ["required",Rule::exists("categories","id")],
            "brand_id" => ["required",Rule::exists("brands","id")],
            "name" =>"required",
            "content" =>"required",
            "desc" =>"required",
            "status" =>"required",
            "price" =>"required",
            "qty"=>"required"
        ]);
        $get_image = request()->file("image");
        if($get_image){
            $image_name = explode(".",$get_image->getClientOriginalName())[0];
            $new_image = $image_name . rand(10000,99999999999999) . ".". $get_image->getClientOriginalExtension();
            $get_image->move(public_path("uploads/products"), $new_image);
            $attributes["image"] = $new_image;
        }
        Product::create($attributes);
        return redirect("/add-product")->with("message","Thêm sản phẩm thành công");
    }


    public function all_product(){
        return view("admin.product.all_products",[
            "all_products" => Product::latest()->paginate(5)
        ]);
    }

    public function toggle_product_status($product_id){
        $current_product = Product::find($product_id);
        Product::find($product_id)->update(["status"=>!$current_product->status]);
        return redirect("/all-product")->with("message","Đổi trạng thái sản phẩm thành công");
    }

    public function edit_product($product_id){
        $edit_product = Product::find($product_id);
        return view("admin.product.edit_product",[
            "all_brands" => Brand::all(),
            "all_categories" => Category::all(),
            "edit_product" => $edit_product
        ]);
    }


    public function update_product($product_id){
        $attributes = request()->validate([
            "category_id" => ["required",Rule::exists("categories","id")],
            "brand_id" => ["required",Rule::exists("brands","id")],
            "name" =>"required",
            "content" =>"required",
            "desc" =>"required",
            "price" =>"required"
        ]);
        $get_image = request()->file("image");
        if($get_image){
            $image_name = explode(".",$get_image->getClientOriginalName())[0];
            $new_image = $image_name . rand(10000,99999999999999) . ".". $get_image->getClientOriginalExtension();
            $get_image->move(public_path("uploads/products"), $new_image);
            $attributes["image"] = $new_image;
        }
        Product::find($product_id)->update($attributes);
        return redirect("/all-product")->with("message","Cập nhật sản phẩm thành công");
    }

    public function delete_product($product_id){
        Product::find($product_id)->delete();
        return redirect("/all-product")->with("message","Xóa danh mục sản phẩm thành công");
    }

    public function detail_product($product_id){
        $product_detail = Product::find($product_id);

        $related_products = $product_detail
        ->category
        ->products
        ->where("status",1)
        ->where("id","!=",$product_id)
        ->take(3);

        return view("pages.sanpham.show_detail",[
            "product_detail" =>$product_detail,
            "related_products"=> $related_products
        ]);
    }
}
