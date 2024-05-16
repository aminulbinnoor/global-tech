<?php


namespace App\Traits;


use Illuminate\Database\Eloquent\Builder;

trait OrderByDesc
{
    protected static function booted(){
        static::addGlobalScope("order",function (Builder $builder){
            return $builder->orderBy("id","desc");
        });
    }
}