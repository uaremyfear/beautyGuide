<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use App\Exceptions\DontHaveAccessException;

class AllowIfSuperAdmin
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
        if (Auth::check())
        {
            if (Auth::user()->isSuperAdmin())
            {
                return $next($request);
            }
        }
       
        

        throw new DontHaveAccessException;
    }
}
