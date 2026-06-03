<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ExternalAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check external session
        if (
            session()->has('external_user.company') &&
            session()->has('external_user.user_id') &&
            session()->has('external_user.company_url')
        ) {
            return $next($request);
        }

        // If API request
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'External user not authenticated'
            ], 401);
        }

        // Web redirect
        session()->flash('error', 'External login required.');

        return redirect()->route('login');
    }
}
