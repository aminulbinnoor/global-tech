<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public const TAG = "roles";

    protected $table = 'roles';
    protected $fillable = [
        'title',
        'description'
    ];

    public function permissions(){
        return $this->hasMany(Permission::class, "role_id", "id");
    }
}
