<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\User;

class UserPolicy
{

    private $tag;

    public function __construct(){
        $this->tag = User::TAG;
    }
   
    public function viewAny(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function view(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }


    public function create(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_create"])->exists();
    }

    public function update(User $user, User $model): bool
    {
        if($user->id === $model->id){
            return true;
        }
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_update"])->exists();
        
    }

    public function delete(User $user, User $model): bool
    {
        if($user->id === $model->id){
            return false;
        }
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_delete"])->exists();
    }

}
