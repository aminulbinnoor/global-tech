<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    const TAG = "permissions";

    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = [
        'role_id',
        'name'
    ];

    public function role(){
        return $this->belongsTo(Role::class, "role_id", "id");
    }

}
