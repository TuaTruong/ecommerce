<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Imports\ExcelImports;
use App\Exports\ExcelExports;
use Excel;

class CategoryController extends Controller
{
    public function add_category(){
        return view("admin.add_category");
    }

    public function all_category(){
        $all_categories = Category::all();
        return view("admin.all_categories",[
            "all_categories"=>$all_categories
        ]);
    }

    public function edit_category($category_id){
        $edit_category = Category::where("id",$category_id)->first();
        return view("admin.edit_category",[
            "edit_category"=>$edit_category
        ]);
    }

    public function save_category(Request $request){
        $attributes = request()->validate([
            "name" => "required|min:5",
            "desc"=>"required|min:10",
            "status" =>"required"
        ]);

        Category::create($attributes);
        return redirect("/add-category")->with("message","Thêm sản phẩm thành công");
    }

    public function update_category(Request $request,$category_id){
        $attributes = request()->validate([
            "name" => "required",
            "desc" => "required"
        ]);
        Category::find($category_id)->update($attributes);
        return redirect("/all-category")->with("message","Cập nhật danh mục sản phẩm thành công");
    }


    public function delete_category($category_id){
        Category::find($category_id)->delete();
        return redirect("/all-category")->with("message","Xóa danh mục sản phẩm thành công");
    }

    public function toggle_category_status($category_id){
        $current_category = Category::find($category_id);
        Category::find($category_id)->update(["status"=>!$current_category->status]);
        return redirect("/all-category")->with("message","Đổi trạng thái danh mục sản phẩm thành công");
    }

    public function show_category_home($category_id){
        $category = Category::find($category_id);
        return view("pages.home",[
            "title" => $category->name,
            "all_product" => $category->products()->paginate(9)
        ]);
    }
    public function import_csv(){
        $path = request()->file('file')->getRealPath();
        Excel::import(new ExcelImports, $path);
        return back();

    }
    public function export_csv(){
        return Excel::download(new ExcelExports , 'product.xlsx');
    }
}
