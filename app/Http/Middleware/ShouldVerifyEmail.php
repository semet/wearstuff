<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShouldVerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->guard('admin')->user()->email_verified_at == null) {
            return redirect()->route('admin.login.show')->with('warning', 'Please verify your email');
        }
        return $next($request);
    }
}
