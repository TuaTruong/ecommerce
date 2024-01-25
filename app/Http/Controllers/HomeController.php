<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        // $categories = Category::orderBy("id")->where("status","1")->get();
        // $brands = Brand::orderBy("id")->where("status","1")->get();
        $all_product = Product::orderBy("id")
        ->where("status","1")
        ->filter(request(["search"]))
        ->limit(4)
        ->get();

        return view("pages.home",[
            "all_product" =>$all_product
        ]);
    }
}
