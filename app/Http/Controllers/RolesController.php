<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesFormRequest;
use App\Models\Role;
use Exception;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->authorizeResource(Role::class, 'role');
        view()->share("role_menu", "active");
    }

    public function index(){
        $roles = Role::paginate(config("system.pagination.per_page"));
        return view('roles.index', compact('roles'));
    }

    public function create(){
        return view('roles.create');
    }

    public function store(RolesFormRequest $request){
        $data = $request->getData();
        Role::create($data);
        return redirect()->route('roles.index')->with('success', 'Role was successfully added.');
    }

    public function show(Role $role){
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role){
        return view('roles.edit', compact('role'));
    }


    public function update(Role $role, RolesFormRequest $request){

        $data = $request->getData();
        $role->update($data);
        return redirect()->route('roles.index')->with('success', 'Role was successfully updated.');
    }

    public function destroy(Role $role)
    {
        try {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Role was successfully deleted.');
        } catch (Exception $exception) {
            return redirect()->route('roles.index')->with('error', 'Something Went Wrong.');
        }
    }



}
