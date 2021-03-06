<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ChiefOrOfficer
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
        if (Auth::user()->role == 2 || Auth::user()->role == 3) {
            return $next($request);
        }
        return redirect()->back();
    }
}
