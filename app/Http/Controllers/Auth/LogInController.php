<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\LogRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{


    public function showLoginForm()
    {
        return view("users.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($user = User::where('email', $credentials['email'])->first()) {
            if (decrypt($user->password) == $credentials['password']) {
                Auth::loginUsingId($user->id);
                LogRepository::instance()->create("login", "{$user->name} logged in at !" . date("d/m/Y h:i:s A"));
                return redirect("dashboard");
            } 
            return view('users.login')->with('message', 'Invalid Log In Credentials');
        }    
        return view('users.login')->with('message', 'Invalid Log In Credentials');
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        LogRepository::instance()->create("logout", "{$user->name} logged out at !" . date("d/m/Y h:i:s A"));
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route("login.show");
    }
}
