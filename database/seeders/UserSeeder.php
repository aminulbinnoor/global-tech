<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => "Super",
            'last_name' => "Admin",
            "image" => "default.png",
            'email' => "admin@admin.com",
            'password' => encrypt("123456"),
            'status' => "active",
        ]);
        $user = User::first();
        $role = Role::first();
        RoleUser::create([
            "role_id" => $role->id,
            "user_id" => $user->id
        ]);
    }
}
