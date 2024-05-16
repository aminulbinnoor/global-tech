<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "title" => "Super Admin",
            "description" => "Super Admin Role"
        ]);

        Role::create([
            "title" => "Admin",
            "description" => "Admin Role"
        ]);
    }
}
