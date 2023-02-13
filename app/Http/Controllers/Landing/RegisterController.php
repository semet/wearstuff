<?php

namespace App\Http\Controllers\Landing;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Models\EmailVerification;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'phone' => 'required|unique:users,phone',
                'email' => 'required|email|unique:users,email',
                'gender' => 'required',
                'password' => 'required|confirmed',
                'terms_and_condition' => 'required'
            ]);

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'gender' => $request->gender,
                'password' => bcrypt($request->password),
            ]);

            if ($user) {
                UserCreated::dispatch($user);
            }
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }

    public function verifyEmail($id)
    {
        $verification = EmailVerification::findOrFail($id);

        if (Carbon::now()->gt($verification->expires_at)) {
            abort(404, 'Link telah kadaluarsa');
        }

        $verification->user()->update([
            'email_verified_at' => now()
        ]);

        $verification->delete();

        auth()->login($verification->user);

        return redirect()->route('home');
    }
}
