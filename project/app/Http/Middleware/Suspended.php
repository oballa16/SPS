<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Suspended
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

        if (Auth::user()->suspended == 0) {
            return $next($request);
        } else {
            return redirect()->back()->with('info', 'You are suspended from using the system');
        }
    }
}
