<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $all_product = Product::orderBy("id")
        ->where("status","1")
        ->filter(request(["search"]))
        ->paginate(6);

        return view("pages.home",[
            "all_product" =>$all_product
        ]);
    }

    public function session(){
        dd(session()->all());
    }
}
