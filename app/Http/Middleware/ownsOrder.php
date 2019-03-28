<?php

namespace App\Http\Middleware;

use App\Order;
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

        $order = Order::find($request->order)->first();
        
        if($request->user()->id != $order->owner->id)
        {
            return response(view('shop.401'));
        }
        return $next($request);
    }
}
