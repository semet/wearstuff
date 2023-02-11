<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showForm()
    {
        return view('pages.auth.login');
    }

    public function loginAjax(Request $request)
    {
        if ($request->wantsJson()) {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $check = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ]);

            if ($check) {
                $request->session()->regenerate();
                return response()->json([
                    'message' => 'Login Success'
                ], 200);
            } else {
                return response()->json([
                    'error' => 'User tidak ditemukan'
                ], 404);
            }
        }
    }

    public function loginHttp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $check = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if ($check) {
            $request->session()->regenerate();
            return redirect()->intended();
        } else {
            return back()->with('error', 'User tidak ditemukan');
        }
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->regenerate();

        return back();
    }
}
