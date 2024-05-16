<?php

namespace App\Observers;

use App\Models\Role;
use App\Repository\LogRepository;

class RoleObserver
{

    public function created(Role $role): void
    {
        LogRepository::instance()->create("role-created", "{$role->title} has been created!");
    }
    
    public function updated(Role $role): void
    {
        LogRepository::instance()->create("role-updated", "{$role->title} has been updated!");
    }

    public function deleted(Role $role): void
    {
        LogRepository::instance()->create("role-deleted", "{$role->title} has been deleted!");
    }

}
