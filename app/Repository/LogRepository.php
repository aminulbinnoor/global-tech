<?php

namespace App\Repository;

use App\Models\Log;

class LogRepository {
    
    public function __construct()
    {
        
    }

    public function create($action, $message){
        $user = auth()->user();
        if($user){
            Log::create([
                "user_id" => $user->id,
                'ip' => request()->ip(),
                'user_agent' =>request()->userAgent(),
                'action' => $action,
                'message' => $message
            ]);
        }
    }

    public static function instance(): LogRepository{
        return new LogRepository();
    }

}