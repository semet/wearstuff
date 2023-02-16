<?php

namespace App\Http\Controllers\Landing;

use App\Events\PasswordResetLinkRequested;
use App\Http\Controllers\Controller;
use App\Models\PasswordRequest;
use App\Models\User;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    public function index()
    {
        return view('pages.auth.reset-password');
    }

    public function sendPasswordResetRequest(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with('success', 'Permintaan anda sedang diperoses');
        }
        PasswordResetLinkRequested::dispatch($user);
        return back()->with('success', 'Permintaan anda sedang diperoses');
    }

    public function showForm($token)
    {
        $data = PasswordRequest::where('token', $token)->firstOrFail();

        if (Carbon::now()->gt(Carbon::parse($data->created_at)->addMinutes(5))) {
            return view('pages.auth.expire-link');
        }

        return view('pages.auth.update-password', ['token' => $token]);
    }

    public function update(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);

        $data =  PasswordRequest::where('token', $token)->firstOrFail();

        $user = User::where('email', $data->email)->firstOrFail();

        $user->update([
            'password' => bcrypt($request->password)
        ]);

        $data->delete();

        return redirect()->route('login.show');
    }
}
