<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDetail
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
        if (!Auth::check()){
            return redirect(route('login'));
        }
        if (Auth::user()->role_id > 1  &&  Auth::user()->id != $request->id){
            return redirect(route('forbiddance-detail'));
        }
        return $next($request);
    }
}
