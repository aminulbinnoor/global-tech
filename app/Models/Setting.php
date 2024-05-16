<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    public const TAG = "settings";

    use HasFactory;

    protected $table = 'settings';
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value'
    ];
}
