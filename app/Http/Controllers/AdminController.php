<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Rules\Captcha;
class AdminController extends Controller
{
    public function index(){
        return view("admin_login");
    }

    public function dashboard(){
        // dd(request()->all());
        $attributes = request()->validate([
            "email" => "required|email",
            "password" => "required",
            "g-recaptcha-response" => ["required",new Captcha()]
        ]);
        
        unset($attributes["g-recaptcha-response"]);
        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                "credentials"=> "Thông tin đăng nhập không đúng"
            ]);
        }

        session()->regenerate();
        return redirect("/dashboard");
    }

    public function show_dashboard(){
        return view("admin.dashboard");
    }

    public function logout(){
        auth()->logout();
        return redirect("/admin");
    }
}
