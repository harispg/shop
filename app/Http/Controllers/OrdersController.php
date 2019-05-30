<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use App\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('ownsOrder')->except(['usersOrders', 'update']);
    }
    public function show(Request $request, Order $order)
    {
        if($order->items->count() == 0){
            return view('shop.emptyCart');
        }
    	$items = $order->items;
    	return view('orders.shoppingCart', compact('items', 'order'));
    }

    public function update(Request $request)
    {
        $this->validate($request, 
            [
                "quantities.*" => 'integer|min:0',
            ]);

    	foreach ($request->quantities as $item => $quantity) {
    		$thisItem = OrderItem::find($item);
    		$thisItem->quantity = $quantity;
    		$thisItem->save();
    	}

    	return redirect()->back();
    }

    public function payment(Request $request, Order $order)
    {
        $order->order_status_id = 2;
        $order->save();
        auth()->user()->makeOrder();
        flash()->success('Well done', 'You have purchased this');
        return view('orders.orderCompleted');
    }

    public function usersOrders(Request $request, User $user)
    {
        return view('orders.usersOrders', compact('user'));
    }

    public function getOrder($order)
    {
        $order = Order::with('items')->findOrFail($order);
        return $order;
    }
}
