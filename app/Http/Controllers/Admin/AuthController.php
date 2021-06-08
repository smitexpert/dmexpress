<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if(Auth::check())
        {
            return redirect()->route('admin.dashboard');
        }

        return view('backend.admin.login');
    }

    public function attempt(Request $request)
    {
        if(Auth::attempt(['phone' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }else if(Auth::attempt(['email' => $request->username, 'password' => $request->password], $request->remember))
        {
            return redirect()->intended(route('admin.dashboard'));
        }else{
            return back()->with('error', 'User Credintial Not Matched!');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
