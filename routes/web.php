<?php

use App\Http\Controllers\Auth\LogInController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogsController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard");

Route::resource("users", UsersController::class, ["names" => "users"]);
Route::resource("roles", RolesController::class, ["names" => "roles"]);
Route::resource("permissions", PermissionsController::class, ["names" => "permissions"])->except(["create", "store"]);
Route::resource("logs", LogsController::class, ["names" => "logs"])->only(["index", "show"]);
//category and subcategory
Route::resource("categories", CategoryController::class, ["names" => "categories"]);

//Authentication Routes
Route::get("/login", [LogInController::class, "showLoginForm"])->name("login.show");
Route::post("/login", [LogInController::class, "login"])->name("login.submit");
Route::get("/logout", [LogInController::class, "logout"])->name("logout");

//settings route
Route::controller(SettingsController::class)->group(function(){
    Route::get("/settings", "show")->name("settings.show");
    Route::post("/settings", "save")->name("settings.save");
});

//profile route
Route::controller(UserProfileController::class)->group(function(){
    Route::get("/profile", "show")->name("profile.show");
    Route::post("/profile", "save")->name("profile.save");
});

//home routes
Route::controller(HomeController::class)->group(function(){
    Route::get("/", "index")->name("home");
});