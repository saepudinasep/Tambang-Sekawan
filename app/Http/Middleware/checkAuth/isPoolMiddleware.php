<?php

namespace App\Http\Middleware\checkAuth;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isPoolMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 4) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('login')->with('error', 'You are not authorized to access this page');
        }
    }
}
