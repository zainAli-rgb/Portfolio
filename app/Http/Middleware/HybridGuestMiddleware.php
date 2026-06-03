<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HybridGuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // 🔹 Check internal auth OR external session
        if (session()->has('external_user')) {

            // Already logged in → redirect to dashboard
            return redirect()->route('index');
        }

        return $next($request);
    }
}
