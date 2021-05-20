<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;



class IsUsers
{
    public function handle($request, Closure $next)
    {
            if (Auth::check() && Auth::user()->role == 'user') {
                return $next($request);  
            }
            abort(404);
    }
}
