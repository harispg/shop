<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'ownsOrder']);
    }
    public function show(Order $order)
    {

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
        dd($order);
    }
}
