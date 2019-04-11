<?php

namespace App\Http\Middleware;

use Closure;

class IsSuperUser
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
        if(! $request->user()->superAdmin)
        {
            return response(view('shop.401'));
        }
        return $next($request);
    }
}
