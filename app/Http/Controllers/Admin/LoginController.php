<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->guard('admin')->attempt($credentials, $request->remember != null)) {
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('login.show');
    }
}
