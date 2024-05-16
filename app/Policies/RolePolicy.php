<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    private $tag;

    public function __construct(){
        $this->tag = Role::TAG;
    }

    public function viewAny(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function view(User $user, Role $role): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function create(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_create"])->exists();
    }

    public function update(User $user, Role $role): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_update"])->exists();
    }

    public function delete(User $user, Role $role): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_delete"])->exists();
    }

}
