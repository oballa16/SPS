<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class OfficerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return abort(403);
        }
        if (Auth::user()->role == 2 and Auth::user()->suspended == 0) {
            return $next($request);
        } else if (Auth::user()->role == 2 and Auth::user()->suspended == 1) {
            return redirect()->back()->with('info', 'You are suspended from using the system');
        }


        return redirect()->back();
    }
}
