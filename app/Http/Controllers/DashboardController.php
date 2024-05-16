<?php

namespace App\Http\Controllers;


class DashboardController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
        view()->share("dashboard_menu", "active");
    }

    public function index(){
        return view("dashboard");
    }
}
