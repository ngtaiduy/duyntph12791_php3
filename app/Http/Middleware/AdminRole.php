<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!Auth::check()){
    //         return redirect(route('login'));
    //     }
    //     if (Auth::user()->role_id < 2){
    //         return redirect(route('403'));
    //     }
    //     return $next($request);
    // }

    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()){
            return redirect(route('login'));
        }
        if (Auth::user()->role_id > 1){
            return redirect(route('forbiddance-admin'));
        }
        return $next($request);
    }
}
