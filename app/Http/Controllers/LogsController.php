<?php

namespace App\Http\Controllers;

use App\Models\Log;

class LogsController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
        $this->authorizeResource(Log::class, 'log');
        view()->share("log_menu", "active");
    }

    public function index(){
        $logs = Log::paginate(config("system.pagination.per_page"));
        return view('logs.index', compact('logs'));
    }

    public function show(Log $log){
        return view('logs.show', compact('log'));
    }

}
