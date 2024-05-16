<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        $keys =["users", "permissions", "settings", "logs"];
        $role = Role::where("title", "Super Admin")->first();
        if($role){
            foreach($keys as $key){
                $permissions = config("permissions.available_permissions");
                foreach($permissions[$key] as $permission){
                    Permission::create([
                        "role_id" => $role->id,
                        "name" => "{$key}_{$permission}"
                    ]);
                }
            }
        }
    }
}
