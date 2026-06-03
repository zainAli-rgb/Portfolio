<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfLoggedIn
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->back(); // change to your route
        }

        return $next($request);
    }
}
