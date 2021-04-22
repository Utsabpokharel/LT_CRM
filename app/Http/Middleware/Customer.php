<?php

namespace App\Http\Middleware;

use Closure;

class Customer
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
        if (Auth::user()->role == '4'||Auth::user()->role == '3'||Auth::user()->role == '2'||Auth::user()->role == '1') {
            return $next($request);
        } else {
            return redirect()->back()->with('warning', 'Sorry you don\'t have access to view the requested resource');
        }
    }
}
