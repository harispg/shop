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
            $orderId=getStringBetween($request->path(), 'orders/', '/');
            $order = Order::find($orderId);
            if($request->user()->id != $order->owner->id){
            if ($request->expectsJson()) {
                return response()->json(['message'=>'You are not authorized to view this order']);
            }
            return response(view('shop.401'));
            }
             return $next($request);
    }
}
