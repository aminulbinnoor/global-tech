<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\Permission;
use App\Models\User;

class CategoryPolicy
{
    private $tag;

    public function __construct(){
        $this->tag = Category::TAG;
    }
    public function viewAny(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function create(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_create"])->exists();
    }

    public function update(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_update"])->exists();
    }

    public function delete(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_delete"])->exists();
    }

    
}
