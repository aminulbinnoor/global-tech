<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersFormRequest;
use App\Models\Role;
use App\Models\RoleUser;

class UserProfileController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function show(){
        $user = auth()->user();
        $this->authorize("update", $user);
        $roles = Role::all();
        return view('users.profile', compact('user', 'roles'));
    }

    public function save(UsersFormRequest $request){
        $data = $request->getData();
        $user = auth()->user();
        $this->authorize("update", $user);
        $user->update($data);
        RoleUser::where("user_id", $user->id)->delete();
        RoleUser::create([
            "user_id" => $user->id,
            "role_id" => $data["role_id"]
        ]);
        return redirect()->route('profile.show')->with('success', 'Profile was successfully updated.');   
    }

}
