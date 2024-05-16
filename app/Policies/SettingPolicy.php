<?php

namespace App\Policies;

use App\Models\Permission;
use App\Models\Setting;
use App\Models\User;

class SettingPolicy
{
    private $tag;

    public function __construct(){
        $this->tag = Setting::TAG;
    }

    public function update(User $user): bool
    {
        return Permission::where(["role_id" => $user->role->id, "name" => "{$this->tag}_update"])->exists();
    }

}
