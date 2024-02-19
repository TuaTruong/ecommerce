<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $all_users = User::with("roles")->orderBy("id","DESC")->paginate(5);
        return view("admin.user.all_users")->with(compact("all_users"));
    }

    public function assign_roles(){
        request()->validate([
            "email" => "required|email"
        ]);

        $user = User::where("email",request("email"))->first();
        $user->roles()->detach();
        if(request("author_role")){
            $user->roles()->attach(Role::where("name","author")->first());
        }
        if(request("admin_role")){
            $user->roles()->attach(Role::where("name","admin")->first());
        }
        if(request("user_role")){
            $user->roles()->attach(Role::where("name","user")->first());
        }
        return redirect()->back()->with("message","Cấp quyền thành công");
    }
}
