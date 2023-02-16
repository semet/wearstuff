<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('pages.account.index');
    }

    public function updateProfile(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'gender' => 'required'
            ]);

            auth()->user()->update([
                'name' => $request->name,
                'gender' => $request->gender,
            ]);

            return back()->with('profileUpdated', 'Update Profile berhasil');
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }
}
