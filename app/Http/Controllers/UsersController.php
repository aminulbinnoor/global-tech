<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UsersFormRequest;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Exception;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
        $this->authorizeResource(User::class, 'user');
        view()->share("user_menu", "active");
    }

    public function index()
    {
        $users = User::paginate(config("system.pagination.per_page"));
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact("roles"));
    }
    public function store(UsersFormRequest $request)
    {
        $data = $request->getData();
        $user = User::create($data);
        RoleUser::create([
            "user_id" => $user->id,
            "role_id" => $data["role_id"]
        ]);
        return redirect()->route('users.index')->with('success', 'User was successfully added.');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(User $user, UsersFormRequest $request)
    {
        $data = $request->getData();
        $user->update($data);
        RoleUser::where("user_id", $user->id)->delete();
        RoleUser::create([
            "user_id" => $user->id,
            "role_id" => $data["role_id"]
        ]);
        return redirect()->route('users.index')->with('success', 'User was successfully updated.');    
    }

    public function destroy(User $user)
    {
        try {
            RoleUser::where("user_id", $user->id)->delete();
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User was successfully deleted.');
        } catch (Exception $exception) {
            return redirect()->route('users.index')->with('error', 'Something Went Wrong.');
        }
    }



}
