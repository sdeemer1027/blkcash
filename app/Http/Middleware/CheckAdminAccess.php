<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user ID is 1, 2, or 3
        if (Auth::check() && in_array(Auth::user()->id, [1, 2, 3])) {
            return $next($request);
        }

        // Redirect if the user doesn't have the required ID
        return redirect('/home')->with('error', 'Access denied.');
    }
}
