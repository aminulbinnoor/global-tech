<?php

namespace App\Models;

use App\Traits\OrderByDesc;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    public const TAG = "users";

    use HasFactory, Notifiable, OrderByDesc;
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'image',
        'email',
        'password',
        'status'
    ];


    protected function name(): Attribute{
        return new Attribute(
            get: function() {
                return "{$this->first_name} {$this->last_name}";
            },
        );
    }

    protected function image(): Attribute{
        return Attribute::make(
            get: function(string $value){
                if($value === "default.png"){
                    return asset("images/default.png");
                }
                return asset("storage/uploads/$value");
            }
        );
    }  

    public function roleUser(){
        return $this->hasOne(RoleUser::class, "user_id", "id");
    }

    public function role(){
        return $this->hasOneThrough(Role::class,RoleUser::class,"user_id", "id", "id", "role_id");
    }

    public function logs(){
        return $this->hasMany(Log::class, "user_id", "id");
    }


}
