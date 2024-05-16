<?php

namespace App\Policies;

use App\Models\Log;
use App\Models\Permission;
use App\Models\User;

class LogPolicy
{
    private $tag;

    public function __construct(){
        $this->tag = Log::TAG;
    }

    public function viewAny(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }

    public function view(User $user, Log $log): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_view"])->exists();
    }
}
