<?php

namespace App\Models;

use App\Traits\OrderByDesc;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use OrderByDesc;

    const TAG = "logs";
    protected $table = 'logs';
    protected $fillable = [
        'user_id',
        'ip',
        'user_agent',
        'action',
        'message'
    ];

    public function lastUpdate():Attribute{
        return Attribute::make(
            get: function(){
                return date("d/m/Y h:i A", strtotime($this->created_at));
            }
        );
    }

    public function action():Attribute{
        return Attribute::make(
            get: fn(string $value) => ucwords(str_replace("-", " ", $value))
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
