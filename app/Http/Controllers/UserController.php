<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with("roles")->orderBy("id","DESC")->paginate(5);
        return view("admin.user.all_users")->with(compact("users"));
    }
}
