<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!(Auth::user()->role == '1' || Auth::user()->role == '2' || Auth::user()->role == '3' || Auth::user()->role == '4')) {
            return redirect()->back()->with('warning', 'Sorry You are not authorized user.');
        }

        if ((Auth::user()->role == '1' || Auth::user()->role == '2' || Auth::user()->role == '3' || Auth::user()->role == '4')) {
            return $next($request);
        } else {
            return redirect()->back()->with('warning', 'Sorry You are not authorized user.');
        }
    }
}
