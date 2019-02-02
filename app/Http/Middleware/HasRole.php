<?php

namespace App\Http\Middleware;

use Closure;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(! in_array($role, $request->user()->roles->pluck('name')->toArray()))
        {
            return response(view('shop.401'));
        }
        return $next($request);
    }
}
