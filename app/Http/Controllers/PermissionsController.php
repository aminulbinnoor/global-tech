<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Repository\LogRepository;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        view()->share("permission_menu", "active");
    }

    public function index()
    {
        $this->authorize("viewAny", Permission::class);
        $roles = Role::withCount("permissions as total_permissions")->get();
        return view("permissions.index", compact("roles"));
    }

    public function edit($id)
    {
        $this->authorize("update", Permission::class);
        $permissions = Permission::where("role_id", $id)->pluck("name")->toArray();
        $role = Role::find($id);
        $available_permissions = config("permissions.available_permissions");
        return view("permissions.edit", compact("role", "available_permissions", "permissions"));
    }

    public function update(Request $request, $id)
    {
        $this->authorize("update", Permission::class);
        Permission::where("role_id", $id)->delete();
        $permissions = $request->except("_method","_token");
        foreach($permissions as $key => $value){
            Permission::create([
                "role_id" => $id,
                "name" => $key
            ]);
        }
        $role = Role::find($id);
        LogRepository::instance()->create("permission-updated", "{$role->title} permissions updated successfuly!");
        return redirect()->route("permissions.show",$id)->with("success", "Permissions Updated");
    }

    public function show($id){
        $this->authorize("view", Permission::class);
        $permissions = Permission::where("role_id", $id)->pluck("name")->toArray();
        $role = Role::find($id);
        $available_permissions = config("permissions.available_permissions");
        return view("permissions.show", compact("role", "available_permissions", "permissions"));
    }

    public function destroy($id)
    {
        $this->authorize("delete", Permission::class);
        Permission::where("role_id", $id)->delete();
        $role = Role::find($id);
        LogRepository::instance()->create("permission-deleted", "{$role->title} permissions cleared successfuly!");
        return redirect()->route("permissions.index")->with("success", "Permissions Cleared");
    }

}
