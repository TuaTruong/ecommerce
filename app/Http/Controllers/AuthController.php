<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login_checkout(){
        return view("pages.checkout.login_checkout");
    }
    public function register_user(){
        $attributes = request()->validate([
            "name" =>"required",
            "email" => "required|email",
            "password" => "required|min:6",
            "phone" => "required"
        ]);
        $user = User::create($attributes);
        auth()->login($user);

        return redirect()->back()->withInput();
    }

    public function logout_user(){
        auth()->logout();
        return redirect("/login-checkout");
    }

    public function login_user(){
        $attributes = request()->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                "error"=>"Your provided credentials could not be verified"
            ]);
        }
        session()->regenerate();
        return redirect("/");
    }

}
