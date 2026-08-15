<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(Request $request) {
        $isHtmx = $request->hasHeader('HX-Request');
        return view('auth/login')->fragmentif($isHtmx, 'login-form');
    }
    public function store(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            // 'remember_token' => 'nullable'
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return response('', 200)->header('HX-Redirect', '/todos');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
        
    }

    public function destroy() {
        Auth::logout();
        return redirect('login');
    }
}
