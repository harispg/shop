<?php

namespace App\Http\Middleware;

use App\Order;
use App\User;
use Closure;

class ownsOrder
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
            if($request->user()->id != $request->order->id){
            return response(view('shop.401'));
            }
             return $next($request);
       
    }
}
