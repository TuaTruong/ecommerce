<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $admin_role = Role::where("name","admin")->first();
        $author_role = Role::where("name","author")->first();
        $user_role = Role::where("name","user")->first();

        $admin = User::create([
            "name" => "Admin Tuấn",
            "email" => "admintuan@gmail.com",
            "phone" => "0333789565",
            "password" => "123456",
        ]);
        $author = User::create([
            "name" => "Author Tuấn",
            "email" => "authortuan@gmail.com",
            "phone" => "0333789565",
            "password" => "123456",
        ]);
        $user = User::create([
            "name" => "User Tuấn",
            "email" => "usertuan@gmail.com",
            "phone" => "0333789565",
            "password" => "123456",
        ]);

        $admin->roles()->attach($admin_role);
        $author->roles()->attach($author_role);
        $user->roles()->attach($user_role);
    }
}
